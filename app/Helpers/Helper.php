<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class Helper
{

    /**
     * @param array $array
     * @return null|string
     */
    public static function isActiveRoute(array $array)
    {
        try{

            $getFacadeRoot  = Route::getFacadeRoot()->current()->uri();
            $explode        = explode('/',$getFacadeRoot);
            $controllerName = $explode[1] ?? 'home';

            if(in_array($controllerName, $array)){
                return 'm-menu__item--active m-menu__item--open';
            }else{
                return null;
            }

        }catch (\Exception $exception){
            return null;
        }

    }//

    public static function isActiveRouteNav(array $array)
    {

        try{
            $getFacadeRoot  = Route::getFacadeRoot()->current()->uri();
            $explode        = explode('/',$getFacadeRoot);
            $functionName = $explode[2] ?? 'profile';

            if(in_array($functionName, $array)){
                return 'm-nav__item--active';
            }else{
                return null;
            }

        }catch (\Exception $exception){
            return null;
        }
    }

    public static function isActiveRouteHover(array $array)
    {
        try{

            $getFacadeRoot  = Route::getFacadeRoot()->current()->uri();
            $explode        = explode('/',$getFacadeRoot);
            $controllerName = $explode[1] ?? 'home';
            $functionName   = $explode[2] ?? 'index';

            if(in_array($controllerName, $array)){
                return 'm-menu__item--active';
            }else{
                return null;
            }

            /*
           foreach ($array as $value){
               $explode2        = explode('.', $value);
               $contrName  =  $explode2[0];
               $process         =  $explode2[1];

               if($controllerName == $contrName){
                    if($process == '*'){
                        return 'm-menu__item--active';
                    }elseif($functionName == $process){
                        return 'm-menu__item--active';
                    }
               }
           }
            */


        }catch (\Exception $exception){
            return null;
        }

    }
}


