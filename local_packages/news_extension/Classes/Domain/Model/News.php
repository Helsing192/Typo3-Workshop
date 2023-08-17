<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class News extends AbstractEntity
{
    protected string $title = '';
    protected string $content = '';
    protected ?Category $category = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
