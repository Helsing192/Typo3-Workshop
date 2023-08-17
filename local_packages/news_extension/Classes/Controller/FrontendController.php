<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Controller;

use Bikar\NewsExtension\Domain\Model\News;
use Bikar\NewsExtension\Domain\Repository\NewsRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FrontendController extends ActionController
{
    public function __construct(
        protected readonly NewsRepository $newsRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $this->view
            ->assign('news', $this->newsRepository->findAll());

        return $this->htmlResponse();
    }

    public function showAction(?News $news = null): ResponseInterface
    {
        if ($news === null) {
            return (new ForwardResponse('list'))
                ->withControllerName(('Frontend'))
                ->withExtensionName('NewsExtension');
        }

        $this->view
            ->assign('news', $news);

        return $this->htmlResponse();
    }
}
