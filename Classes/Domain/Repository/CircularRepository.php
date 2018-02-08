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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class CircularRepository
 *
 * @package JWeiland\Circular\Domain\Repository
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
     * this method is needed by command controller to find
     * visible, hidden and deleted circulars
     *
     * @return array
     */
    public function getCirculars()
    {
        $query = $this->createQuery();
        $query->statement('SELECT uid, files FROM tx_circular_domain_model_circular');

        return $query->execute(true);
    }
}
