<?php

namespace Noaber\Sportlink\ClubData;

use Illuminate\Support\ServiceProvider;

class SportLinkClubDataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // register publishables
        $this->registerPublishables();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sportlink-club-data.php', 'sportlink-club-data');
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
