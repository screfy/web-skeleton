<?php

declare(strict_types=1);

namespace Screfy\Module\Front\Error;

use Nette\Application\BadRequestException;
use Nette\Application\Helpers;
use Nette\Application\IPresenter;
use Nette\Application\Request;
use Nette\Application\Response;
use Nette\Application\Responses\CallbackResponse;
use Nette\Application\Responses\ForwardResponse;
use Nette\Http\IRequest;
use Nette\Http\IResponse;
use Nette\SmartObject;
use Tracy\ILogger;

class ErrorPresenter implements IPresenter
{
    use SmartObject;

    /** @var ILogger */
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function run(Request $request): Response
    {
        $exception = $request->getParameter('exception');
        if ($exception instanceof BadRequestException) {
            [$module, , $sep] = Helpers::splitName($request->getPresenterName());
            return new ForwardResponse($request->setPresenterName($module . $sep . 'Error4xx'));
        }
        $this->logger->log($exception, ILogger::EXCEPTION);
        return new CallbackResponse(function (IRequest $httpRequest, IResponse $httpResponse): void {
            if (preg_match('#^text/html(?:;|$)#', (string)$httpResponse->getHeader('Content-Type'))) {
                require __DIR__ . '/../@templates/Error/500.phtml';
            }
        });
    }
}
