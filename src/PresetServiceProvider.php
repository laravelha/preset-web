<?php

namespace Laravelha\Web;

use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class PresetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        PresetCommand::macro('ha-web', function (Command $command) {

            $options = $command->option('option');

            if($this->withAuth($options))
                $command->call('ui', ['type' => 'bootstrap', '--auth' => true, '--quiet' => true]);

            Presets\Bootstrap::install($this->withAuth($options));
            Presets\Datatable::install();

            $command->info('Laravelha scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

    /**
     * @param array $options
     * @return bool
     */
    private function withAuth(array $options)
    {
        return in_array('auth', $options);
    }
}
