<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Controller;

use Psr\Http\Message\ResponseInterface;
use Bikar\NewsExtension\Domain\Model\Category;
use Bikar\NewsExtension\Domain\Model\News;
use Bikar\NewsExtension\Domain\Repository\CategoryRepository;
use Bikar\NewsExtension\Domain\Repository\NewsRepository;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BackendController extends ActionController
{
    protected int $pageUid = 0;

    public function __construct(
        protected readonly ModuleTemplateFactory  $moduleTemplateFactory,
        protected readonly ExtensionConfiguration $extensionConfiguration,
        protected readonly CategoryRepository     $categoryRepository,
        protected readonly NewsRepository         $newsRepository
    ) {
    }

    protected function initializeAction(): void
    {
        $this->pageUid = (int)($this->request->getQueryParams()['id'] ?? 0);
        parent::initializeAction();
    }

    public function indexAction(): ResponseInterface
    {
        $view = $this->initializeModuleTemplate();

        $view->assignMultiple([
            'categories' => $this->categoryRepository->findAll()
        ]);

        return $view->renderResponse('Index');
    }

    public function showCategoryAction(?Category $category = null): ResponseInterface
    {
        $view = $this->initializeModuleTemplate();

        if ($category == null) {
            $view->assignMultiple([
                'categories' => $this->categoryRepository->findAll()
            ]);
            return $view->renderResponse('Index');
        }

        $news = $this->newsRepository->findAllByCategory($category);

        $view->assignMultiple([
            'category' => $category,
            'news' => $news,
        ]);

        return $view->renderResponse('showCategory');
    }

    public function showNewsAction(News $news): ResponseInterface
    {
        $view = $this->initializeModuleTemplate();
        $view->assign('news', $news);
        return $view->renderResponse('ShowNews');
    }

    public function showAllNewsAction(): ResponseInterface
    {
        $view = $this->initializeModuleTemplate();
        $news = $this->newsRepository->findAll();
        $view->assign('news', $news);
        return $view->renderResponse('showAllNews');
    }

    protected function initializeModuleTemplate(): ModuleTemplate
    {
        $context = '';
        $menuItems = [
            'index' => [
                'controller' => 'Backend',
                'action' => 'index',
                'label' => $GLOBALS['LANG']->sL('LLL:EXT:news_extension/Resources/Private/Language/locallang.xlf:administration.menu.index'),
            ],
            'showAllNews' => [
                'controller' => 'Backend',
                'action' => 'showAllNews',
                'label' => $GLOBALS['LANG']->sL('LLL:EXT:news_extension/Resources/Private/Language/locallang.xlf:administration.menu.comments'),
            ],
        ];
        $view = $this->moduleTemplateFactory->create($this->request);
        $menu = $view->getDocHeaderComponent()
            ->getMenuRegistry()
            ->makeMenu()
            ->setIdentifier('NewsExtensionModuleMenu');

        foreach ($menuItems as $menuItemConfig) {
            $isActive = $this->request->getControllerActionName() === $menuItemConfig['action'];
            $menuItem = $menu->makeMenuItem()
                ->setTitle($menuItemConfig['label'])
                ->setActive($isActive)
                ->setHref($this->uriBuilder->reset()->uriFor(
                    $menuItemConfig['action'],
                    [],
                    $menuItemConfig['controller']
                ));
            $menu->addMenuItem($menuItem);

            if ($isActive) {
                $context = $menuItemConfig['label'];
            }
        }

        $view->getDocHeaderComponent()->getMenuRegistry()->addMenu($menu);
        $view->setTitle(
            'News',
            $context
        );

        $view->setFlashMessageQueue($this->getFlashMessageQueue());

        return $view;
    }
}
