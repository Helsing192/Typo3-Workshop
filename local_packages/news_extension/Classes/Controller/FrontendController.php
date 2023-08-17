<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Controller;

use Bikar\NewsExtension\Domain\Model\Category;
use Bikar\NewsExtension\Domain\Model\News;
use Bikar\NewsExtension\Domain\Repository\NewsRepository;
use Psr\Http\Message\ResponseInterface;
use Bikar\NewsExtension\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FrontendController extends ActionController
{
    public function __construct(
        protected readonly CategoryRepository $categoryRepository,
        protected readonly NewsRepository $newsRepository,
    ) {
    }

    public function indexAction(): ResponseInterface
    {
        $this->view
            ->assign('categories', $this->categoryRepository->findAll());

        return $this->htmlResponse();
    }

    public function newsAction(?Category $category = null): ResponseInterface
    {
        if ($category == null) {
            return $this->getForwardResponseToIndex();
        }

        $this->view
            ->assign('category', $category)
            ->assign('news', $this->newsRepository->findAllByCategory($category));

        return $this->htmlResponse();
    }

    public function newsDetailAction(?News $news = null, ?Category $category = null): ResponseInterface
    {
        if ($news === null) {
            return $this->getForwardResponseToIndex();
        }

        $this->view
            ->assign('news', $news)
            ->assign('category', $category);

        return $this->htmlResponse();
    }

    protected function getForwardResponseToIndex(): ForwardResponse
    {
        return (new ForwardResponse('index'))
            ->withControllerName(('Frontend'))
            ->withExtensionName('NewsExtension');
    }
}
