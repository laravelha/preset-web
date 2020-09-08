<?php

namespace Laravelha\Web;

use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Symfony\Component\Process\Process;

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

            if(! $this->withTailwind($options)) {
                $this->bootstrap($command, $options);
            } else {
                $this->tailwind($command);
            }

            $command->info('Laravelha scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

    /**
     * @param Command $command
     * @param array $options
     */
    private function bootstrap(Command $command, array $options)
    {
        if($command->option('auth')) {
            $command->call('ui', ['type' => 'bootstrap', '--auth' => true, '--quiet' => true]);
        }

        Presets\Bootstrap::install($command->option('auth'));

        if($this->withDatatables($options)) {
            Presets\Datatable::install();
        }
    }

    /**
     * @param Command $command
     */
    private function tailwind(Command $command)
    {
        (new Process(['composer', 'require', 'laravel-frontend-presets/tailwindcss^4.2.0 --dev'], base_path()))
            ->setTimeout(null)
            ->run();


        $command->call('ui', ['type' => 'tailwindcss', '--auth' => $command->option('auth'), '--quiet' => true]);

        Presets\Tailwind::install();
    }

    /**
     * @param array $options
     * @return bool
     */
    private function withDatatables(array $options)
    {
        return in_array('datatables', $options);
    }

    /**
     * @param array $options
     * @return bool
     */
    private function withTailwind(array $options)
    {
        return in_array('tailwindcss', $options);
    }
}
