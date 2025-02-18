<?php namespace Laralips\Storm\Support\Facades;

use Laralips\Storm\Support\Facade;

/**
 * @method static array parse(string $contents)
 * @method static array parseFile(string $fileName)
 * @method static string render(array $vars = [], array $options = [])
 *
 * @see \Laralips\Storm\Parse\Yaml
 */
class Yaml extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'parse.yaml';
    }
}
