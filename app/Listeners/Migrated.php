<?php declare(strict_types = 1);

namespace App\Listeners;

use Database\Seeders\Seeder;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Database\Events\MigrationEnded as Event;
use App\Support\Database\Migration;

class Migrated
{
    private ConsoleOutput $output;

    public function __construct(ConsoleOutput $output)
    {
        $this->output = $output;
    }

    public function handle(Event $event)
    {
        if ($event->method !== 'up') {
            return;
        }

        /** @var Migration $migration */
        $migration = $event->migration;
        $name = $this->getMigrationName($migration);
        if ($migration->hasSeeders() === false) {
            $this->note("<info>Nothing to seed: </info>{$name}");
            return;
        }

        $this->seedMigration($migration, $name);
    }

    private function seedMigration(Migration $migration, string $name)
    {
        $this->note("<comment>Seeding:</comment> {$name}");

        $startTime = microtime(true);

        $migration->getSeeders()->each(function (Seeder $abstract) {
            $name = Str::of($abstract)->explode('/')->last();
            $seeder = app($abstract);
            $this->note("<info>Running seeder</info>: {$name}");
            $seeder->run();
        });

        $runTime = round(microtime(true) - $startTime, 2);

        $this->note("<info>Seeded:</info>  {$name} ({$runTime} seconds)");
    }

    private function note($message)
    {
        if ($this->output) {
            $this->output->writeln($message);
        }
    }

    private function getMigrationName($path): string
    {
        return str_replace('.php', '', get_class($path));
    }
}
