<?php

namespace SolutionForest\FilamentPanphp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SolutionForest\FilamentPanphp\FilamentPanphp
 */
class FilamentPanphp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SolutionForest\FilamentPanphp\FilamentPanphp::class;
    }
}
