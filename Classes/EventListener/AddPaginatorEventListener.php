<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\EventListener;

use JWeiland\Circular\Event\PostProcessFluidVariablesEvent;
use JWeiland\Circular\Pagination\CircularPagination;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

/**
 * Register paginator to paginate through the company records in frontend
 */
class AddPaginatorEventListener extends AbstractControllerEventListener
{
    protected int $itemsPerPage = 15;

    protected array $allowedControllerActions = [
        'Circular' => [
            'list',
        ],
    ];

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $paginator = new QueryResultPaginator(
                $event->getFluidVariables()['circulars'],
                $this->getCurrentPage($event),
                $this->getItemsPerPage($event),
            );

            $event->addFluidVariable('actionName', $event->getActionName());
            $event->addFluidVariable('paginator', $paginator);
            $event->addFluidVariable('circulars', $paginator->getPaginatedItems());
            $event->addFluidVariable('pagination', new CircularPagination($paginator));
        }
    }

    protected function getCurrentPage(PostProcessFluidVariablesEvent $event): int
    {
        $currentPage = 1;
        if ($event->getRequest()->hasArgument('currentPage')) {
            $currentPage = $event->getRequest()->getArgument('currentPage');
        }
        return (int)$currentPage;
    }

    protected function getItemsPerPage(PostProcessFluidVariablesEvent $event): int
    {
        return (int)($event->getSettings()['pageBrowser']['itemsPerPage'] ?? $this->itemsPerPage);
    }
}
