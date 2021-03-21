<?php

declare(strict_types=1);

namespace Screfy\Module;

use Nette\Application\UI\Control;
use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Security\User;
use stdClass;

/**
 * @method bool isLinkCurrent(string $destination = null, ...$args)
 * @method bool isModuleCurrent(string $module)
 */
abstract class BaseTemplate extends Template
{
    public Presenter $presenter;

    public Control $control;

    public User $user;

    public string $baseUrl;

    public string $basePath;

    /** @var stdClass[] */
    public array $flashes = [];
}
