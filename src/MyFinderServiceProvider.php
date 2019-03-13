<?php

/**
 * Description of MyFinder
 *
 * @author Andrey Sayak <andresayak@gmail.com>
 */

namespace andresayak\MyFinder;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Storage;
use League\Flysystem\Filesystem;

class MyFinderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap.
     */
    public function boot()
    {
        $this->app->bind('myfinder', function() {
            $config = config('myfinder');
            if (is_null($config)) {
                throw new \Exception(
                        "Couldn't load MyFinder configuration file. " .
                        "Please run `artisan vendor:publish --tag=myfinder` command first."
                );
            }
            return new MyFinder($config);
        });

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/config.php' => config_path('myfinder.php'),
            ], 'myfinder');

            return;
        }
        
        $config = config('myfinder');
        foreach($config['disks'] AS $name=>$disk){
            $this->app['config']['filesystems.disks.myfinder_'.$name] = $disk;
        }
        
        Route::prefix('api')
             ->middleware('api')
             ->group(__DIR__.'/routes.php');
    }
}