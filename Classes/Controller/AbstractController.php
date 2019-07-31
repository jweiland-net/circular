<?php
declare(strict_types = 1);
namespace JWeiland\Circular\Controller;

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

use JWeiland\Circular\Configuration\ExtConf;
use JWeiland\Circular\Domain\Repository\CircularRepository;
use JWeiland\Circular\Domain\Repository\DepartmentRepository;
use JWeiland\Circular\Domain\Repository\SysDmailRepository;
use JWeiland\Circular\Domain\Repository\TelephoneRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Abstract controller with useful methods for extended controller classes
 */
class AbstractController extends ActionController
{
    /**
     * @var CircularRepository
     */
    protected $circularRepository;

    /**
     * @var TelephoneRepository
     */
    protected $telephoneRepository;

    /**
     * @var SysDmailRepository
     */
    protected $sysDmailRepository;

    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * @var ExtConf
     */
    protected $extConf;

    /**
     * @param CircularRepository $circularRepository
     */
    public function injectCircularRepository(CircularRepository $circularRepository)
    {
        $this->circularRepository = $circularRepository;
    }

    /**
     * @param TelephoneRepository $telephoneRepository
     */
    public function injectTelephoneRepository(TelephoneRepository $telephoneRepository)
    {
        $this->telephoneRepository = $telephoneRepository;
    }

    /**
     * @param SysDmailRepository $sysDmailRepository
     */
    public function injectSysDmailRepository(SysDmailRepository $sysDmailRepository)
    {
        $this->sysDmailRepository = $sysDmailRepository;
    }

    /**
     * @param DepartmentRepository $departmentRepository
     */
    public function injectDepartmentRepository(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @param ExtConf $extConf
     */
    public function injectExtConf(ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * Build serialized query info
     *
     * @param string $table
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $telephones
     * @return string serialized query info for sysDmail
     */
    public function buildQueryInfo($table, QueryResultInterface $telephones): string
    {
        $listOfUids = [];
        /** @var \JWeiland\Circular\Domain\Model\Telephone $telephone */
        foreach ($telephones as $telephone) {
            $listOfUids[] = $telephone->getUid();
        }
        $queryInfo = [
            'id_lists' => [
                $table => $listOfUids
            ]
        ];

        return \serialize($queryInfo);
    }

    /**
     * Get categories for select box in search form
     *
     * @return array
     */
    public function getCategories(): array
    {
        $categories = [];
        $entries = ['circular', 'aboutDisposal', 'vacancy'];
        foreach ($entries as $entry) {
            $category = new \stdClass();
            $category->key = $entry;
            $category->value = LocalizationUtility::translate(
                'tx_circular_domain_model_circular.category.' . $entry,
                'circular'
            );
            $categories[] = $category;
        }

        return $categories;
    }
}
