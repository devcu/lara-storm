<?php namespace Laralips\Storm\Foundation\Providers;

use Illuminate\Support\AggregateServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Providers\ComposerServiceProvider;

use Laralips\Storm\Database\MigrationServiceProvider;

class ConsoleSupportServiceProvider extends AggregateServiceProvider implements DeferrableProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
