<?php
namespace Zweistein2\Seat\PlanetaryIndustry;

use Seat\Services\AbstractSeatPlugin;

class PlanetaryIndustryServiceProvider extends AbstractSeatPlugin {
    public function boot(): void {
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'planetaryIndustry');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'planetaryIndustry');
    }

    public function register(): void {
        // Add new tabs to sidebar
        $this->mergeConfigFrom(__DIR__ . '/Config/planetaryIndustry.sidebar.php', 'package.sidebar');
        $this->mergeConfigFrom(__DIR__ . '/Config/planetaryIndustry.locale.php', 'planetaryIndustry.locale');

        // Register permissions
        $this->registerPermissions(__DIR__ . '/Config/planetaryIndustry.permissions.php', 'planetaryIndustry');
    }

    public function getName(): string {
        return 'SeAT Planetary Industry';
    }

    public function getPackageRepositoryUrl(): string {
        return 'https://github.com/zweistein2/seat-planetary-industry';
    }

    public function getPackagistPackageName(): string {
        return 'seat-planetary-industry';
    }

    public function getPackagistVendorName(): string {
        return 'Zweistein2';
    }
}