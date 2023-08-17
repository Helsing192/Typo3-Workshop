<?php

declare(strict_types=1);

namespace Bikar\NewsBackend\Controller;

use Psr\Http\Message\ResponseInterface;
use Bikar\NewsBackend\Domain\Model\News;
use Bikar\NewsBackend\Domain\Repository\NewsRepository;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BackendController extends ActionController
{
    public function __construct(
        protected readonly ModuleTemplateFactory  $moduleTemplateFactory,
        protected readonly ExtensionConfiguration $extensionConfiguration,
        protected readonly NewsRepository         $newsRepository
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $view = $this->moduleTemplateFactory->create($this->request);
        $news = $this->newsRepository->findAll();
        $view->assign('news', $news);
        return $view->renderResponse('List');
    }

    public function showAction(News $news): ResponseInterface
    {
        $view = $this->moduleTemplateFactory->create($this->request);
        $view->assign('news', $news);
        return $view->renderResponse('Show');
    }
}
