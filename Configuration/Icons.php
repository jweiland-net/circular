<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'ext-circular-category' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:circular/Resources/Public/Icons/category.svg',
    ],
    'ext-circular-circular' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:circular/Resources/Public/Icons/circular.svg',
    ],
    'ext-circular-department' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:circular/Resources/Public/Icons/department.svg',
    ],
];
