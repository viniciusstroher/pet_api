<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;

use Illuminate\Support\Facades\DB;

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
        //
        error_reporting( E_ALL ^ ( E_NOTICE | E_WARNING | E_DEPRECATED ) );
        if (Config::get('database.default') === 'sqlite') {
            $path = Config::get('database.connections.sqlite.database');
            if (!file_exists($path) && is_dir(dirname($path))) {
                touch($path);
            }
        }

        if (Config::get('database.default') === 'mysql') {
            //var_dump( Config::get('database'),Db::connection());exit;
            //create db mysql

            $newDatabase = strtolower(Config::get('database.connections.mysql.database'));
            DB::statement("CREATE DATABASE {$newDatabase}");
        }
    }
}
