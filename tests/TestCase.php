<?php

namespace Maristas\UiKit\Tests;

use Maristas\UiKit\UiKitServiceProvider;
use Orchestra\Testbench\TestCase as Base;

abstract class TestCase extends Base
{
    protected function defineEnvironment($app): void
    {
        // El grupo de middleware web cifra cookies y necesita una clave; en CI no hay .env que la traiga.
        $app['config']->set('app.key', 'base64:'.base64_encode(str_repeat('k', 32)));
    }

    protected function getPackageProviders($app): array
    {
        return [UiKitServiceProvider::class];
    }
}
