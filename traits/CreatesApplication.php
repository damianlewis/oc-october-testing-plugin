<?php

namespace Tests;

use Config;
use Illuminate\Contracts\Console\Kernel;

/**
 * Trait CreatesApplication
 *
 * In OctoberCMS the app is created within the PluginTestCase class but Laravel uses a trait located in the Tests
 * folder, so this trait file is needed for OctoberCMS to use Laravel Dusk.
 *
 * @package Tests
 */
trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../../../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();

        /*
         * Modify the plugin path away from the test context
         */
        $app->setPluginsPath(realpath(base_path().Config::get('cms.pluginsPath')));

        return $app;
    }
}
