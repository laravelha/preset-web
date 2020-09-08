<?php

namespace Laravelha\Web\Presets;

use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset;
use Symfony\Component\Process\Process;

class Tailwind extends Preset
{
    const STUBSPATH = __DIR__ . '/../stubs/tailwind';

    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install(): void
    {
        static::updateReadme();
        static::updatePhpUnit();
        static::updateLang();
        static::updateLayoutViews();
        static::updateWelcomePage();
        static::updateAppServiceProvider();
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
    protected static function updateLayoutViews(): void
    {
        File::deleteDirectory(resource_path('views/layouts'));
        File::copyDirectory(self::STUBSPATH.'/resources/views/layouts', resource_path('views/layouts'));
    }

    /**
     * Update app config file
     *
     * @return void
     */
    protected static function updateWelcomePage(): void
    {
        File::delete(resource_path('views/welcome.blade.php'));
        File::copy(self::STUBSPATH.'/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    /**
     * Update the default welcome page file.
     *
     * @return void
     */
    protected static function updateAppServiceProvider(): void
    {
        File::delete(app_path('Providers/AppServiceProvider.php'));
        File::copy(self::STUBSPATH.'/app/Providers/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));
    }
}
