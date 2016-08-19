<?php

namespace Hoanghiep\Controller;

use Illuminate\Support\ServiceProvider;

class HoangHiepControllerProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/hoanghiep.php' => config_path('hoanghiep.php'),
        ]);

        $this->publishes([
            __DIR__ . '/ControllerCommand.php' => app_path('/Console/Commands/ControllerCommand.php'),
        ]);

        $this->publishes([
            __DIR__ . '/hoanghiep' => base_path('/hoanghiep'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
//        $this->app->bind("BaseController", function($app) {
//            return new BaseController();
//        });
    }

}
