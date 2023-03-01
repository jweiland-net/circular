<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
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

    /**
     * This method is needed by command controller to find
     * visible, hidden and deleted circulars
     */
    public function getCirculars(): array
    {
        /** @var Query $query */
        $query = $this->createQuery();

        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_circular_domain_model_circular');
        $queryBuilder
            ->select('uid', 'files')
            ->from('tx_circular_domain_model_circular');

        return $query->statement($queryBuilder)->execute(true);
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
