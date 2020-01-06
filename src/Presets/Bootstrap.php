<?php

namespace Laravelha\Web\Presets;

use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Facades\File;

class Bootstrap extends Preset
{
    const STUBSPATH = __DIR__ . '/../stubs/bootstrap';

    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install($withAuth = false): void
    {
        static::updatePackages();
        static::updateAssets();
        static::updateReadme();
        static::updatePhpUnit();
        static::updateLang();
        static::setAppConfig();
        static::updateLayoutViews($withAuth);
        static::updateWelcomePage($withAuth);

        if ($withAuth) {
            static::createAuthViews();
        }

        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages): array
    {
        return array_merge([
            'cross-env' => '^5.1',
            'bootstrap' => '^4.0.0',
            'bootstrap-datepicker' => '^1.9.0',
            'jquery' => '^3.2.1',
            'jquery-mask-plugin' => '^1.14',
            'popper.js' => '^1.12',
            'select2' => '^4.0.12'
        ], $packages);
    }

    /**
     * Update the assets
     *
     * @return void
     */
    protected static function updateAssets(): void
    {
        File::copyDirectory(static::STUBSPATH.'/resources/js', resource_path('js'));
        File::copyDirectory(static::STUBSPATH.'/resources/sass', resource_path('sass'));
        File::copyDirectory(static::STUBSPATH.'/resources/css', resource_path('css'));
    }

    /**
     * Update readme file
     *
     * @return void
     */
    protected static function updateReadme() : void
    {
        File::delete(base_path('README.md'));
        File::copy(static::STUBSPATH.'/README.md', base_path('README.md'));
    }

    /**
     * update PHP Unit
     *
     * @return void
     */
    protected static function updatePhpUnit(): void
    {
        File::delete(base_path('phpunit.xml'));
        File::copy(self::STUBSPATH.'/phpunit.stub', base_path('phpunit.xml'));
    }

    /**
     * Update lang files
     *
     * @return void
     */
    protected static function updateLang() : void
    {
        File::copyDirectory(static::STUBSPATH.'/resources/lang', resource_path('lang'));
    }

    /**
     * Update app config file
     *
     * @return void
     */
    protected static function setAppConfig(): void
    {
        File::delete(config_path('app.php'));
        File::copy(static::STUBSPATH.'/config/app.php', config_path('app.php'));
    }

    /**
     * Update the default layout files
     *
     * @return void
     */
    protected static function updateLayoutViews($withAuth = false) : void
    {
        $authFolder = $withAuth ? '/auth' : '';

        File::copyDirectory(static::STUBSPATH."{$authFolder}/resources/views/layouts", resource_path('views/layouts'));
    }

    /**
     * Update the default welcome page file.
     *
     * @return void
     */
    protected static function updateWelcomePage($withAuth = false): void
    {
        File::append(base_path('routes/web.php'), file_get_contents(static::STUBSPATH.'/routes/web.php'));
        File::copy(static::STUBSPATH.'/resources/views/index.blade.php', resource_path('views/index.blade.php'));
        File::copy(static::STUBSPATH.'/app/Http/Controllers/IndexController.php', app_path('Http/Controllers/IndexController.php'));

        $authFolder = $withAuth ? '/auth' : '';

        File::copy(static::STUBSPATH.'/config/breadcrumbs.php', config_path('breadcrumbs.php'));
        File::copy(static::STUBSPATH."{$authFolder}/routes/breadcrumbs.php", base_path('routes/breadcrumbs.php'));

        File::delete(resource_path('views/welcome.blade.php'));
    }

    /**
     * Create auth controller
     *
     * @return void
     */
    protected static function createAuthViews(): void
    {
        File::copy(static::STUBSPATH.'/auth/resources/views/home.blade.php', resource_path('views/home.blade.php'));
        File::copyDirectory(static::STUBSPATH.'/auth/resources/views/auth', resource_path('views/auth'));
    }
}
