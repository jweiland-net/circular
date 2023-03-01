<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Repository;

use JWeiland\Telephonedirectory\Domain\Model\Employee;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to show a list of telephones
 */
class TelephoneRepository extends Repository
{
    /**
     * Get recipients from given PID where email is NOT empty.
     * The ResultSet is grouped by email
     *
     * @return QueryResultInterface|Employee[]
     */
    public function getRecipientsFromPid(int $pid): QueryResultInterface
    {
        /** @var Query $query */
        $query = $this->createQuery();

        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_telephonedirectory_domain_model_employee');
        $queryBuilder
            ->select('*')
            ->from('tx_telephonedirectory_domain_model_employee')
            ->where(
                $queryBuilder->expr()->neq(
                    'email',
                    $queryBuilder->createNamedParameter('')
                ),
                $queryBuilder->expr()->eq(
                    'pid',
                    $queryBuilder->createNamedParameter($pid, \PDO::PARAM_INT)
                )
            )
            ->groupBy('email');

        return $query->statement($queryBuilder)->execute();
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
