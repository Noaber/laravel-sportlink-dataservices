<?php

namespace Noaber\Sportlink\ClubData;

use Illuminate\Support\ServiceProvider;

class SportLinkClubDataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // load routes
        $this->loadRoutes();

        // load languages
        $this->loadLanguages();

        // load views
        //$this->loadViews();

        // register publishables
        $this->registerPublishables();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sportlink-club-data.php', 'sportlink-club-data');

        // $this->app->register(\Noaber\LunarApi\LunarEventServiceProvider::class);
    }

    /**
     * load routes
     * @return void
     */
    private function loadRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }

    /**
     * load languages
     * @return void
     */
    private function loadLanguages(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'sportlink-club-data');
    }

    /**
     * load views
     * @return void
     */
    private function loadViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sportlink-club-data');
    }

    /**
     * register publishables
     */
    private function registerPublishables(): void
    {
        $this->publishes([
            __DIR__.'/../config/sportlink-club-data.php' => config_path('sportlink-club-data.php'),
        ], 'sportlink-club-data-config');

        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/sportlink-club-data'),
        ], 'sportlink-club-data-lang');
    }
}
