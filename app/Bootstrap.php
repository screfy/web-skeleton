<?php

declare(strict_types=1);

namespace Screfy;

use Nette\Configurator;
use Nette\StaticClass;

class Bootstrap
{
    use StaticClass;

    public static function boot(): Configurator
    {
        $configurator = new Configurator();
        $configurator->enableTracy(__DIR__ . '/../log');
        $configurator->setTimeZone('Europe/Bratislava');
        $configurator->setTempDirectory(__DIR__ . '/../temp');
        if ($configurator->isDebugMode()) {
            $configurator
                ->createRobotLoader()
                ->addDirectory(__DIR__)
                ->register();
            $configurator->addConfig(__DIR__ . '/../config/params/local.neon');
        } else {
            $configurator->addConfig(__DIR__ . '/../config/params/production.neon');
        }
        $configurator->addConfig(__DIR__ . '/../config/config.neon');
        return $configurator;
    }
}
