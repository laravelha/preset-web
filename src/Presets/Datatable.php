<?php

namespace Laravelha\Web\Presets;

use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Facades\File;

class Datatable extends Preset
{

    const STUBSPATH = __DIR__ . '/../stubs/datatable';

    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateSass();
        static::updateBootstrapping();
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
        return [
            'datatables.net-bs' => '^1.10.20',
            ] + $packages;
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass(): void
    {
        file_put_contents(resource_path('sass/app.scss'), file_get_contents(static::STUBSPATH . '/resources/sass/app.stub'), FILE_APPEND);
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping(): void
    {
        file_put_contents(resource_path('js/bootstrap.js'), file_get_contents(static::STUBSPATH . '/resources/js/bootstrap.stub'), FILE_APPEND);
    }
}
