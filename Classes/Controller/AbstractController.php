<?php
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
 * @package circular
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class AbstractController extends ActionController
{
    /**
     * circularRepository
     *
     * @var CircularRepository
     */
    protected $circularRepository;
    /**
     * telephoneDirectory Repository
     *
     * @var TelephoneRepository
     */
    protected $telephoneRepository;

    /**
     * sys_dmail Repository
     *
     * @var SysDmailRepository
     */
    protected $sysDmailRepository;

    /**
     * department Repository
     *
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * ExtConf
     *
     * @var ExtConf
     */
    protected $extConf;

    /**
     * inject circularRepository
     *
     * @param CircularRepository $circularRepository
     * @return void
     */
    public function injectCircularRepository(CircularRepository $circularRepository)
    {
        $this->circularRepository = $circularRepository;
    }

    /**
     * inject telephoneRepository
     *
     * @param TelephoneRepository $telephoneRepository
     * @return void
     */
    public function injectTelephoneRepository(TelephoneRepository $telephoneRepository)
    {
        $this->telephoneRepository = $telephoneRepository;
    }

    /**
     * inject sysDmailRepository
     *
     * @param SysDmailRepository $sysDmailRepository
     * @return void
     */
    public function injectSysDmailRepository(SysDmailRepository $sysDmailRepository)
    {
        $this->sysDmailRepository = $sysDmailRepository;
    }

    /**
     * inject departmentRepository
     *
     * @param DepartmentRepository $departmentRepository
     * @return void
     */
    public function injectDepartmentRepository(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * inject extConf
     *
     * @param ExtConf $extConf
     * @return void
     */
    public function injectExtConf(ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * build serialized query info
     *
     * @param string $table
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $telephones
     * @return string serialized query info fir sysDmail
     */
    public function buildQueryInfo($table, QueryResultInterface $telephones)
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
     * get categories for select box in search form
     *
     * @return array
     */
    public function getCategories()
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
