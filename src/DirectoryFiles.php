<?php

namespace Ofcold\Component\Config;

use SplFileInfo;
use Symfony\Component\Finder\Finder;

class DirectoryFiles
{
	/**
	 * Get all of the directory files for the application.
	 *
	 * @param  string  $app
	 * @param  string  $ext
	 *
	 * @return array
	 */
	public static function make(string $path, string $ext = '.php'): array
	{
		$files = [];

		$path = realpath($path);

		foreach (Finder::create()->files()->name('*'. $ext)->in($path) as $file) {
			$directory = static::getNestedDirectory($file, $path);

			$files[$directory.basename($file->getRealPath(), $ext)] = $file->getRealPath();
		}

		ksort($files, SORT_NATURAL);

		return $files;
	}

	/**
	 * Get the directory file nesting path.
	 *
	 * @param  \SplFileInfo  $file
	 * @param  string  $path
	 *
	 * @return string
	 */
	protected static function getNestedDirectory(SplFileInfo $file, string $path): string
	{
		$directory = $file->getPath();

		if ($nested = trim(str_replace($path, '', $directory), DIRECTORY_SEPARATOR)) {
			$nested = str_replace(DIRECTORY_SEPARATOR, '.', $nested).'.';
		}

		return $nested;
	}
}
