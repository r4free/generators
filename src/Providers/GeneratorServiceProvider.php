<?php

namespace Generators\Providers;

use Generators\Commands\APIControllerCommand;
use Generators\Commands\APIEntityCommand;
use Generators\Commands\APIModelCommand;
use Generators\Commands\APIResourceCommand;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../../generators/src/generators.php' => config_path('generators.php'),
            __DIR__ . '/../../../generators/src/Models/BaseModel.php' => app_path(config("generators.generator.paths.models",'Entities').'/BaseModel.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(APIResourceCommand::class);
        $this->commands(APIModelCommand::class);
        $this->commands(APIControllerCommand::class);
        $this->commands(APIEntityCommand::class);

    }
}
