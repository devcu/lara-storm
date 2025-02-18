<?php namespace Laralips\Storm\Foundation\Bootstrap;

use Laralips\Storm\Support\ClassLoader;
use Laralips\Storm\Filesystem\Filesystem;
use Laralips\Storm\Foundation\Application;

class RegisterClassLoader
{
    /**
     * Register the Winter class loader service.
     */
    public function bootstrap(Application $app): void
    {
        $loader = new ClassLoader(
            new Filesystem,
            $app->basePath(),
            $app->getCachedClassesPath()
        );

        $app->instance(ClassLoader::class, $loader);

        $loader->register();

        $app->after(function () use ($loader) {
            $loader->build();
        });
    }
}
