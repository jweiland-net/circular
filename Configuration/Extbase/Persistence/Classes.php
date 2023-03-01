<?php

return [
   \JWeiland\Circular\Domain\Model\SysDmail::class => [
       'tableName' => 'sys_dmail',
       'properties' => [
           'mailContent' => [
               'fieldName' => 'mailContent',
           ],
       ],
   ],
    \JWeiland\Circular\Domain\Model\Telephone::class => [
        'tableName' => 'tx_telephonedirectory_domain_model_employee',
    ],
];
