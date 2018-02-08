<?php
namespace JWeiland\Circular\Domain\Repository;

/*
 * This file is part of the TYPO3 CMS project.
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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class TelephoneRepository
 *
 * @package JWeiland\Circular\Domain\Repository
 */
class TelephoneRepository extends Repository
{
    /**
     * get recipients from given pid
     * get only records where email-address is set
     * and there is exactly ONE entry for ONE email
     *
     * @param integer $pid
     * @return QueryResultInterface
     */
    public function getRecipientsFromPid($pid)
    {
        $query = $this->createQuery();

        return $query->statement(
            '
			SELECT *, COUNT(*) AS amount
			FROM tx_telephonedirectory_domain_model_employee
			WHERE email <> ?
			AND pid = ?' . BackendUtility::BEenableFields(
                'tx_telephonedirectory_domain_model_employee'
            ) . BackendUtility::deleteClause('tx_telephonedirectory_domain_model_employee') . '
			GROUP BY email
			HAVING amount = 1
		',
            array(
                '',
                $pid
            )
        )->execute();
    }
}
