<?php namespace Laralips\Storm\Foundation\Bootstrap;

use Exception;
use Laralips\Storm\Config\Repository;
use Laralips\Storm\Config\FileLoader;
use Laralips\Storm\Foundation\Application;
use Illuminate\Filesystem\Filesystem;

class LoadConfiguration
{
    /**
     * Bootstrap the given application.
     */
    public function bootstrap(Application $app): void
    {
        $fileLoader = new FileLoader(new Filesystem, $app['path.config']);

        $app->detectEnvironment(function () {
            return $this->getEnvironmentFromHost();
        });

        $app->instance('config', $config = new Repository($fileLoader, $app['env']));

        date_default_timezone_set($config['app.timezone']);

        mb_internal_encoding('UTF-8');

        // Fix for XDebug aborting threads > 100 nested
        ini_set('xdebug.max_nesting_level', '1000');
    }

    /**
     * Returns the environment based on hostname.
     */
    protected function getEnvironmentFromHost(): string
    {
        $config = $this->getEnvironmentConfiguration();

        $hostname = $_SERVER['HTTP_HOST'] ?? null;

        if ($hostname && isset($config['hosts'][$hostname])) {
            return $config['hosts'][$hostname];
        }

        return env('APP_ENV', array_get($config, 'default', 'production'));
    }

    /**
     * Load the environment configuration.
     */
    protected function getEnvironmentConfiguration(): array
    {
        $config = [];

        $environment = env('APP_ENV');

        if ($environment && file_exists($configPath = base_path() . '/config/' . $environment . '/environment.php')) {
            try {
                $config = require $configPath;
            }
            catch (Exception $ex) {
                //
            }
        }
        elseif (file_exists($configPath = base_path() . '/config/environment.php')) {
            try {
                $config = require $configPath;
            }
            catch (Exception $ex) {
                //
            }
        }

        return $config;
    }
}
