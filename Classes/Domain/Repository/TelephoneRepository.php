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
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to show a list of telephones
 */
class TelephoneRepository extends Repository
{
    /**
     * Get recipients from given pid
     * get only records where email-address is set
     * and there is exactly ONE entry for ONE email
     *
     * @param int $pid
     * @return QueryResultInterface
     */
    public function getRecipientsFromPid(int $pid): QueryResultInterface
    {
        /** @var Query $query */
        $query = $this->createQuery();

        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_telephonedirectory_domain_model_employee');
        $queryBuilder
            ->selectLiteral('*, COUNT(*) AS amount')
            ->from('tx_telephonedirectory_domain_model_employee')
            ->where(
                $queryBuilder->expr()->neq(
                    'email',
                    $queryBuilder->createNamedParameter('', \PDO::PARAM_STR)
                ),
                $queryBuilder->expr()->eq(
                    'pid',
                    $queryBuilder->createNamedParameter($pid, \PDO::PARAM_INT)
                )
            )
            ->groupBy('email')
            ->add('having', 'amount = 1');

        return $query->statement($queryBuilder)->execute();
    }

    /**
     * Get TYPO3s Connection Pool
     *
     * @return ConnectionPool
     */
    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
