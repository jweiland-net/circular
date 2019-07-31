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

use JWeiland\Circular\Domain\Repository\CircularRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Controller to move file record to its new location.
 * SF: I remember that we had a special files-extension earlier.
 */
class FilesCommandController extends Command
{
    /**
     * @var CircularRepository
     */
    protected $circularRepository;

    /**
     * @var array
     */
    protected $nonExistingFiles = [];

    /**
     * @param CircularRepository $circularRepository
     */
    public function injectCircularRepository(CircularRepository $circularRepository)
    {
        $this->circularRepository = $circularRepository;
    }

    /**
     * Move all circular files from uploads/tx_files to uploads/tx_circular
     * ./cli_dispatch.phpsh extbase files:migrate
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Command to migrate circular files to their new location');
        if ($this->environmentCheck($output)) {
            $circulars = $this->circularRepository->getCirculars();
            foreach ($circulars as $circular) {
                if (\trim($circular['files']) !== '') {
                    $files = GeneralUtility::trimExplode(',', $circular['files'], true);
                    foreach ($files as $file) {
                        $sourceFile = PATH_site . 'uploads/tx_files/' . $file;
                        $targetFile = PATH_site . 'uploads/tx_circular/' . $file;
                        $this->moveFile($sourceFile, $targetFile, $output);
                    }
                }
            }
            $output->writeln('');
            $output->writeln('List of non existing files:');
            foreach ($this->nonExistingFiles as $file) {
                $output->writeln('- ' . $file);
            }
            $output->writeln('');
            $output->writeln('Migration has been finished');
        }
    }

    /**
     * Checks if environment is OK
     *
     * @param OutputInterface $output
     * @return bool
     */
    protected function environmentCheck(OutputInterface $output): bool
    {
        if (\is_dir(PATH_site . 'uploads/tx_files') && \is_dir(PATH_site . 'uploads/tx_circular')) {
            $output->writeln('Environment seems to be OK.');
            $output->writeln('. => File was moved to its new location.');
            $output->writeln('A => Target file already exists.');
            $output->writeln('S => Sourcefile does not exists. Seems to be already migrated.');
            $output->writeln('Starting migration:');

            return true;
        }
        $output->writeln(
            'ERROR: Environment is not OK. Either uploads/tx_files or uploads/tx_circular is not a directory'
        );

        return false;
    }

    /**
     * Move file to a new location
     *
     * @param string $sourceFile
     * @param string $targetFile
     * @param OutputInterface $output
     */
    protected function moveFile(string $sourceFile, string $targetFile, OutputInterface $output)
    {
        if (\is_file($sourceFile)) {
            if (\is_file($targetFile)) {
                $output->writeln('A');
            } else {
                \rename($sourceFile, $targetFile);
                $output->writeln('.');
            }
        } else {
            $output->writeln('S');
            $this->nonExistingFiles[] = $sourceFile;
        }
    }
}
