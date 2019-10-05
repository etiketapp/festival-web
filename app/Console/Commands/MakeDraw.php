<?php

namespace App\Console\Commands;

use App\Models\Draw;
use App\Models\DrawUserWinner;
use App\Models\User;
use App\Notifications\DrawWinnerUserNotification;
use App\Notifications\WelcomeNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MakeDraw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:draw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command making draw';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::query()->get();

        $now = Carbon::now();

        $model = Draw::query()->where('draw_time', $now);
        $model = new DrawUserWinner();
        $winnerUser = rand(1, $model->count());
        $user = User::query()->find($winnerUser);
        $model->draw()->associate($model);
        $model->user()->associate($user);
        $model->save();

        foreach ($users as $user) {
            $user->notify(new DrawWinnerUserNotification($model, $user));
        }
    }
}
