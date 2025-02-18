<?php namespace Laralips\Storm\Support\Facades;

use Laralips\Storm\Support\Facade;

/**
 * @method static string extract(string $path, bool $minify = true)
 *
 * @see \Laralips\Storm\Support\Svg
 */
class Svg extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'svg';
    }
}
