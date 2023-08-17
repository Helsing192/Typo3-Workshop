<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Domain\Repository;

use Bikar\NewsExtension\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class NewsRepository extends Repository
{
    public function findAllByCategory(Category $category): QueryResultInterface
    {
        $query = $this->createQuery();

        return $query
            ->matching($query->equals('category', $category))
            ->execute();
    }
}
