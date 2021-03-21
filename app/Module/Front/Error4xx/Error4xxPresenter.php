<?php

declare(strict_types=1);

namespace Screfy\Module\Front\Error4xx;

use Nette\Application\BadRequestException;
use Nette\Application\Request;
use Screfy\Module\Front\BaseFrontPresenter;

/** @property Error4xxTemplate $template */
class Error4xxPresenter extends BaseFrontPresenter
{
    public function startup(): void
    {
        parent::startup();
        if (!$this->getRequest()->isMethod(Request::FORWARD)) {
            $this->error();
        }
    }

    public function renderDefault(BadRequestException $exception): void
    {
        $this->template->httpCode = $exception->getHttpCode();
    }
}
