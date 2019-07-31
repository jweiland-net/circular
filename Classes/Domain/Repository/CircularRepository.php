<?php
declare(strict_types = 1);
namespace JWeiland\Circular\Domain\Repository;

/*
 * This file is part of the circular project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to list and find circulars
 */
class CircularRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'dateOfCircular' => QueryInterface::ORDER_DESCENDING
    ];

    /**
     * This method is needed by command controller to find
     * visible, hidden and deleted circulars
     *
     * @return array
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

    /**
     * Get TYPO3s Connection Pool
     *
     * @return ConnectionPool
     */
    protected function getConnectionPool()
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
