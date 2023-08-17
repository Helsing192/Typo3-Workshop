<?php

declare(strict_types=1);

namespace Bikar\NewsBackend\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class News extends AbstractEntity
{
    protected string $title = '';
    protected string $content = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
