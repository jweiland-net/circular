<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
   \JWeiland\Circular\Domain\Model\SysDmail::class => [
       'tableName' => 'sys_dmail',
       'columns' => [
           'mailcontent' => [
               'config' => [
                   'type' => 'passthrough'
               ]
           ],
           'query_info' => [
               'config' => [
                   'type' => 'passthrough'
               ]
           ]
       ]
   ],
    \JWeiland\Circular\Domain\Model\Telephone::class => [
        'tableName' => 'tx_telephonedirectory_domain_model_employee'
    ]
];
