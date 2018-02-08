<?php
namespace JWeiland\Circular\Controller;

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

use JWeiland\Circular\Domain\Repository\CircularRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

/**
 * Class FilesCommandController
 *
 * @package JWeiland\Circular\Controller
 */
class FilesCommandController extends CommandController
{
    /**
     * circularRepository
     *
     * @var CircularRepository
     */
    protected $circularRepository;
    /**
     * a collection of sourcefiles which does not exists anymore
     *
     * @var array
     */
    protected $nonExistingFiles = [];

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
     * Move all circular files from uploads/tx_files to uploads/tx_circular
     * ./cli_dispatch.phpsh extbase files:migrate
     *
     * @return void
     */
    public function migrateCommand()
    {
        $this->outputLine('Command to migrate circular files to their new location');
        if ($this->environmentCheck()) {
            $circulars = $this->circularRepository->getCirculars();
            $i = 0;
            foreach ($circulars as $circular) {
                if (\trim($circular['files']) !== '') {
                    $files = GeneralUtility::trimExplode(',', $circular['files'], true);
                    foreach ($files as $file) {
                        $sourceFile = PATH_site . 'uploads/tx_files/' . $file;
                        $targetFile = PATH_site . 'uploads/tx_circular/' . $file;
                        $this->moveFile($sourceFile, $targetFile);
                        $i++;
                        if ($i === self::MAXIMUM_LINE_LENGTH) {
                            $this->output(\PHP_EOL);
                            $i = 0;
                        }
                    }
                }
            }
            $this->outputLine();
            $this->outputLine('List of non existing files:');
            foreach ($this->nonExistingFiles as $file) {
                $this->outputLine('- ' . $file);
            }
            $this->outputLine();
            $this->outputLine('Migration has been finished');
        }
    }

    /**
     * Checks if environment is OK
     *
     * @return bool
     */
    protected function environmentCheck()
    {
        if (\is_dir(PATH_site . 'uploads/tx_files') && \is_dir(PATH_site . 'uploads/tx_circular')) {
            $this->outputLine('Environment seems to be OK.');
            $this->outputLine('. => File was moved to its new location.');
            $this->outputLine('A => Target file already exists.');
            $this->outputLine('S => Sourcefile does not exists. Seems to be already migrated.');
            $this->outputLine('Starting migration:');

            return true;
        }
        $this->outputLine(
            'ERROR: Environment is not OK. Either uploads/tx_files or uploads/tx_circular is not a directory'
        );

        return false;
    }

    /**
     * move file to a new location
     *
     * @param string $sourceFile
     * @param string $targetFile
     */
    protected function moveFile($sourceFile, $targetFile)
    {
        if (\is_file($sourceFile)) {
            if (\is_file($targetFile)) {
                $this->output('A');
            } else {
                \rename($sourceFile, $targetFile);
                $this->output('.');
            }
        } else {
            $this->output('S');
            $this->nonExistingFiles[] = $sourceFile;
        }
    }
}
