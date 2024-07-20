<?php

namespace ErfanKatebSaber\tools;

use Illuminate\Support\ServiceProvider;

class ToolsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../src/tools.php' => config_path('tools.php'),
        ],'laravel-assets');
    }


}
