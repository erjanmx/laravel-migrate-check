<?php

namespace Erjanmx\MigrateCheck\Test;

use Illuminate\Support\Facades\Artisan;

class MigrateCheckCommandTest extends TestCase
{
    public function testExitCodeWithPendingMigration()
    {
        $this->assertEquals(1, Artisan::call('migrate:check'));
    }

    public function testExitCodeWithNoPendingMigration()
    {
        Artisan::call('migrate');

        $this->assertEquals(0, Artisan::call('migrate:check'));
    }
}
