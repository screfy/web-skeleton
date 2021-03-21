<?php

declare(strict_types=1);

namespace Screfy\Module\Front;

use Nette\Application\Helpers;
use Nette\Application\UI\Presenter;

abstract class BaseFrontPresenter extends Presenter
{
    public function formatLayoutTemplateFiles(): array
    {
        $layout = $this->layout ?: 'layout';
        return [__DIR__ . "/@templates/@layouts/$layout.latte"];
    }

    public function formatTemplateFiles(): array
    {
        return [__DIR__ . '/@templates/' . Helpers::splitName($this->name)[1] . '/' . $this->view . '.latte'];
    }
}
