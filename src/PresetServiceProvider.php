<?php

namespace Laravelha\Web;

use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class PresetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        UiCommand::macro('ha-web', function (Command $command) {

            $options = $command->option('option');

            if($command->option('auth')) {
                $command->call('ui', ['type' => 'bootstrap', '--auth' => true, '--quiet' => true]);
            }

            Presets\Bootstrap::install($command->option('auth'));

            if($this->withDatatables($options)) {
                Presets\Datatable::install();
            }

            $command->info('Laravelha scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

    /**
     * @param array $options
     * @return bool
     */
    private function withDatatables(array $options)
    {
        return in_array('datatables', $options);
    }
}
