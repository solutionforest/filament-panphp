<?php

namespace SolutionForest\FilamentPanphp\Commands;

use Illuminate\Console\Command;

class FilamentPanphpCommand extends Command
{
    public $signature = 'filament-panphp';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
