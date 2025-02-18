<?php namespace Laralips\Storm\Support\Facades;

use Laralips\Storm\Support\Facade;

/**
 * @method static string parse(string $contents, array $vars = [])
 *
 * @see \Laralips\Storm\Parse\Twig
 */
class Twig extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'parse.twig';
    }
}
