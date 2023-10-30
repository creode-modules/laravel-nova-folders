<?php

namespace Creode\LaravelNovaFolders\Commands;

use Illuminate\Console\Command;

class LaravelNovaFoldersCommand extends Command
{
    public $signature = 'laravel-nova-folders';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
