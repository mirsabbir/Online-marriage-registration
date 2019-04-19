<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Nid;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        Validator::extend('nid_varify',function($attr, $val, $params, $validator){
            $card = Nid::where('no',$val)->first();
            if($card){
                if($card->name!=$params[0]) return 0;
                if($card->fathers_name!=$params[1]) return 0;
                if($card->mothers_name!=$params[2]) return 0;
                if(Carbon::createFromFormat('Y-m-d',$card->dob)!=$params[3]) return 0;
            }
            return false;
        });
    }
}
