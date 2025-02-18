<?php namespace Laralips\Storm\Support\Facades;

use Laralips\Storm\Support\Facade;

/**
 * @method static bool check()
 * @method static array all(string $format = null)
 * @method static array get(string $key, string $format = null)
 * @method static array|\Laralips\Storm\Flash\FlashBag error(string $message = null)
 * @method static array|\Laralips\Storm\Flash\FlashBag success(string $message = null)
 * @method static array|\Laralips\Storm\Flash\FlashBag warning(string $message = null)
 * @method static array|\Laralips\Storm\Flash\FlashBag info(string $message = null)
 * @method static \Laralips\Storm\Flash\FlashBag add(string $key, string $message)
 * @method static void store()
 * @method static void forget(string $key = null)
 * @method static void purge();
 *
 * @see \Laralips\Storm\Flash\FlashBag
 */
class Flash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
