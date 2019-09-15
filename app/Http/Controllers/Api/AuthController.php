<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ForgotRequest;
use App\Http\Requests\Api\GsmRequest;
use App\Http\Requests\Api\GsmVerifyRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\VerifyRequest;
use App\Models\Contract;
use App\Models\GsmVerify;
use App\Models\PasswordReset;
use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $auth;

    /**
     * AuthController constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * @return mixed
     */
    public function index()
    {
        $contracts = Contract::all();
        $data = [
            'contracts'     => $contracts,
        ];
        return response()->success($data);
    }

    /**
     * @param RegisterRequest $request
     * @return mixed
     */
    public function register(Request $request)
    {
        $user = new User($request->input());
        $user->password = $request->input('password');
        $user->save();

        $user = User::query()->find($user->id);

        $provider   = $request->input('provider') ?? null;
        $token      = $request->input('token') ?? null;
        if ($provider && $token) {
            try {
                /** @var \Laravel\Socialite\AbstractUser $socialUser */
                if ($provider == 'facebook') {
                    $socialUser = Socialite::driver($provider)
                        ->scopes(['email', 'user_gender', 'user_birthday'])
                        ->fields(['name', 'email', 'birthday', 'verified']);
                } else {
                    throw new \Exception();
                }

                // Attach social profile
                $social = new Social([
                    'provider'      => $provider,
                    'provider_id'   => $socialUser->getId(),
                    'access_token'  => $token,
                ]);
                $social->user()->associate($user);
                $social->save();


            } catch (\Exception $e) {
                // Ignore error
            }
        }//if ($provider && $token)

        return response()->success(['token' => auth('api')->login($user), 'user' => $user]);
    }

    public function social(Request $request, $provider)
    {
        $token = $request->input('token');
        try {
            /** @var \Laravel\Socialite\AbstractUser $socialUser */
            if ($provider == 'facebook') {
                $socialUser = Socialite::driver($provider)
                    ->scopes(['email', 'user_gender', 'user_birthday'])
                    ->fields(['name', 'email', 'birthday', 'verified'])
                    ->userFromToken($token);
            } elseif ($provider == 'google') {
                /** @var GoogleProvider $socialite */
                $socialUser = Socialite::driver($provider)
                    ->userFromToken($token);

            } elseif ($provider == 'googleid') {
                /** @var GoogleIdProvider $socialite */
                $socialUser = Socialite::driver($provider)
                    ->userFromToken($token);
                $provider = 'google';
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            return response()->error('auth.social.invalid');
        }

        // If users email address already registered
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $social = new Social([
                'provider'     => $provider,
                'provider_id'  => $socialUser->getId(),
                'access_token' => $token,
            ]);
            $social->user()->associate($user);
            $social->save();

            return response()->success(auth('api')->login($user));
        }

        // If already logged in before
        $social = Social::whereProvider($provider)->whereProviderId($socialUser->getId())->first();
        if ($social) {
            // Update Token
            $social->access_token = $token;
            $social->save();

            return response()->success(auth('api')->login($user));
        }

        // Check Required fields
        $email      = $socialUser->getEmail();
        $name       = $socialUser->getName();
        $gsm        = null;
        $gender     = null;
        $birthDate  = null;


        if (!$email || !$name) {
            return response()->json([
                'code'    => 'auth.social.missing',
                'message' => trans('errors.auth.social.missing'),
                'user'    => [
                    'token' => $token,
                    'email' => $email,
                    'gsm'   => $gsm,
                    'name'  => $name,
                ],
            ], 400);
        }

        if (!$user) {
            $user = new User([
                'full_name'     => $name,
                'email'         => $email,
                'gender'        => $gender,
                'birth_date'    => $birthDate,
            ]);
            $user->save();
        }

        $social = new Social([
            'provider'     => $provider,
            'provider_id'  => $socialUser->getId(),
            'access_token' => $token,
        ]);
        $social->user()->associate($user);
        $social->save();

        $jwtToken = auth('api')->login($user);

        $data["token"] = $jwtToken;
        $data["user"] = $user;

        return response()->success($data);
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->error('auth.invalid');
        }

        /** @var User $user */
        $user = Auth::guard('api')->user()->load('image');
        if (!$user) {
            return response()->error('auth.invalid');
        }

        return response()->success(['token' => $token, 'user' => $user]);
    }

    public function forgot(ForgotRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return response()->error('auth.forgot.invalid');
        }

        PasswordReset::create([
            'email'   => $user->email,
            'user_id' => $user->id,
        ]);

        return response()->message('auth.forgot');
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        auth('api')->logout();

        return response()->message('auth.logout');
    }
}
