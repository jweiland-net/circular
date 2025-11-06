<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to list and find circulars
 *
 * @method QueryResultInterface findBySend(int $send);
 */
class CircularRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'dateOfCircular' => QueryInterface::ORDER_DESCENDING,
    ];
}
