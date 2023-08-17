<?php

declare(strict_types=1);

namespace Bikar\NewsExtension\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * A category
 */
class Category extends AbstractEntity
{
    public string $title = '';
    public string|null $subtitle;
    public string $description = '';
    /**
     * The news of this category
     * @var ObjectStorage<News>
     */
    #[Lazy()]
    #[Cascade(['value' => 'remove'])]
    public ObjectStorage $news;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getNews(): ObjectStorage
    {
        return $this->news;
    }
}
