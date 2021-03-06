<?php namespace GuilhermeGuitte\BehatLaravel;

use Illuminate\Support\ServiceProvider;

class BehatLaravelServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the commands.
     *
     * @return void
     */
    public function register()
    {
        $this->app['command.behat.install'] = $this->app->share(function($app)
        {
            return new BehatLaravelCommand();
        });

        $this->commands('command.behat.install');

        $this->app['command.behat.run'] = $this->app->share(function($app)
        {
            return new RunBehatLaravelCommand();
        });

        $this->commands('command.behat.run');

        $this->app['command.behat.feature'] = $this->app->share(function($app)
        {
            return new FeatureBehatLaravelCommand();
        });

        $this->commands('command.behat.feature');

        $this->app['command.behat.generate_doc'] = $this->app->share(function($app)
        {
            return new DocumentationCommand();
        });

        $this->commands('command.behat.generate_doc');
    }

}
