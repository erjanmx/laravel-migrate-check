<?php

namespace Erjanmx\MigrateCheck\Commands;

use Illuminate\Database\Console\Migrations\BaseCommand;

class MigrateCheckCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:check {--database= : The database connection to use.}
                {--path= : The path of migrations files to be executed.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows pending migrations. Command exits with non zero code if there are migrations to run';

    /**
     * The migrator instance.
     *
     * @var \Illuminate\Database\Migrations\Migrator
     */
    protected $migrator;

    /**
     * Create a command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->migrator = app('migrator');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->migrator->setConnection($this->option('database'));

        $files = $this->migrator->getMigrationFiles($this->getMigrationPaths());

        $pendingMigrations = array_diff(
            array_keys($files),
            $this->getRanMigrations()
        );

        if ($pendingMigrations) {
            $this->table(['Pending migrations'], array_map(function ($migration) {
                return [ $migration ];
            }, $pendingMigrations));

            return 1;
        }

        $this->info('No pending migrations.');

        return 0;
    }

    /**
     * Gets ran migrations with repository check
     * 
     * @return array
     */
    public function getRanMigrations()
    {
        if (! $this->migrator->repositoryExists()) {
            return [];
        }

        return $this->migrator->getRepository()->getRan(); 
    }
}
