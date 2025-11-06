<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Controller;

use JWeiland\Circular\Domain\Model\Circular;
use JWeiland\Circular\Domain\Repository\CircularRepository;
use JWeiland\Circular\Event\PostProcessFluidVariablesEvent;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Main controller to list and show circulars
 */
class CircularController extends ActionController
{
    public function __construct(
        protected CircularRepository $circularRepository,
    ) {}

    public function listAction(): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'circulars' => $this->circularRepository->findBySend(0),
        ]);

        return $this->htmlResponse();
    }

    public function showAction(Circular $circular): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'circular' => $circular,
        ]);

        return $this->htmlResponse();
    }

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables,
            ),
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
