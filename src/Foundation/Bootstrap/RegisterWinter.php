<?php namespace Laralips\Storm\Foundation\Bootstrap;

use Laralips\Storm\Foundation\Application;

class RegisterWinter
{
    /**
     * Specific features for Winter.
     *
     * @param \Laralips\Storm\Foundation\Application $app
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        /*
         * Workaround for CLI and URL based in subdirectory
         */
        if ($app->runningInConsole()) {
            $app['url']->forceRootUrl($app['config']->get('app.url'));
        }

        /*
         * Register singletons
         */
        $app->singleton('string', function () {
            return new \Laralips\Storm\Support\Str;
        });
        $app->singleton('svg', function () {
            return new \Laralips\Storm\Support\Svg;
        });

        /*
         * Change paths based on config
         */
        if ($pluginsPath = $app['config']->get('cms.pluginsPathLocal')) {
            $app->setPluginsPath($pluginsPath);
        }

        if ($themesPath = $app['config']->get('cms.themesPathLocal')) {
            $app->setThemesPath($themesPath);
        }

        if ($tempPath = $app['config']->get('app.tempPath')) {
            $app->setTempPath($tempPath);
        }
    }
}
