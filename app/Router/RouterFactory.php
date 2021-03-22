<?php

declare(strict_types=1);

namespace Screfy\Router;

use Nette\Application\Routers\RouteList;
use Nette\StaticClass;

final class RouterFactory
{
    use StaticClass;

    public static function create(): RouteList
    {
        $router = new RouteList();
        $router
            ->withModule('Front')
            ->addRoute('<presenter>[/<action>]', 'Homepage:default')
            ->end();
        return $router;
    }
}
