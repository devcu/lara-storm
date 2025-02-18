<?php

namespace Laralips\Storm\Tests;

use ReflectionClass;
use Orchestra\Testbench\Foundation\PackageManifest;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use PHPUnit\Framework\Assert;
use Laralips\Storm\Foundation\Application;

class TestCase extends TestbenchTestCase
{
    /**
     * Resolve application implementation.
     *
     * @return \Laralips\Storm\Foundation\Application
     */
    protected function resolveApplication()
    {
        return tap(new Application($this->getBasePath()), function ($app) {
            $app->bind(
                \Laralips\Storm\Foundation\Bootstrap\LoadConfiguration::class,
                \Orchestra\Testbench\Bootstrap\LoadConfiguration::class
            );

            PackageManifest::swap($app, $this);
        });
    }

    protected static function callProtectedMethod($object, $name, $params = [])
    {
        $className = get_class($object);
        $class = new ReflectionClass($className);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $params);
    }

    /**
     * Stub for `assertFileNotExists` to allow compatibility with both PHPUnit 8 and 9.
     *
     * @param string $filename
     * @param string $message
     * @return void
     */
    public static function assertFileNotExists(string $filename, string $message = ''): void
    {
        if (method_exists(Assert::class, 'assertFileDoesNotExist')) {
            Assert::assertFileDoesNotExist($filename, $message);
            return;
        }

        Assert::assertFileNotExists($filename, $message);
    }

    /**
     * Resolve application Console Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            \Laralips\Storm\Foundation\Console\Kernel::class
        );
    }

    /**
     * Resolve application HTTP Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton(
            \Illuminate\Contracts\Http\Kernel::class,
            \Laralips\Storm\Foundation\Http\Kernel::class
        );
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            /*
            * Laravel providers
            */
            \Illuminate\Broadcasting\BroadcastServiceProvider::class,
            \Illuminate\Bus\BusServiceProvider::class,
            \Illuminate\Cache\CacheServiceProvider::class,
            \Illuminate\Cookie\CookieServiceProvider::class,
            \Illuminate\Encryption\EncryptionServiceProvider::class,
            \Illuminate\Foundation\Providers\FoundationServiceProvider::class,
            \Illuminate\Hashing\HashServiceProvider::class,
            \Illuminate\Pagination\PaginationServiceProvider::class,
            \Illuminate\Pipeline\PipelineServiceProvider::class,
            \Illuminate\Queue\QueueServiceProvider::class,
            \Illuminate\Session\SessionServiceProvider::class,
            \Illuminate\View\ViewServiceProvider::class,
            \Laravel\Tinker\TinkerServiceProvider::class,

            /*
            * Winter Storm providers
            */
            \Laralips\Storm\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Laralips\Storm\Database\DatabaseServiceProvider::class,
            \Laralips\Storm\Halcyon\HalcyonServiceProvider::class,
            \Laralips\Storm\Filesystem\FilesystemServiceProvider::class,
            \Laralips\Storm\Parse\ParseServiceProvider::class,
            \Laralips\Storm\Html\HtmlServiceProvider::class,
            \Laralips\Storm\Html\UrlServiceProvider::class,
            \Laralips\Storm\Network\NetworkServiceProvider::class,
            \Laralips\Storm\Flash\FlashServiceProvider::class,
            \Laralips\Storm\Mail\MailServiceProvider::class,
            \Laralips\Storm\Argon\ArgonServiceProvider::class,
            \Laralips\Storm\Redis\RedisServiceProvider::class,
            \Laralips\Storm\Validation\ValidationServiceProvider::class,
        ];
    }
}
