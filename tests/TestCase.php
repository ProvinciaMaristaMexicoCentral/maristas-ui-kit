<?php

namespace Maristas\UiKit\Tests;

use Maristas\UiKit\UiKitServiceProvider;
use Orchestra\Testbench\TestCase as Base;

abstract class TestCase extends Base
{
    protected function getPackageProviders($app): array
    {
        return [UiKitServiceProvider::class];
    }
}
