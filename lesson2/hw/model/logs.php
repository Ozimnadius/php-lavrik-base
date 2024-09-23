<?php
declare(strict_types=1);

/**
 * Adds a log entry to the 'logs' directory.
 *
 * This function creates a new log entry with the current date, time, IP address, and request URI.
 * The referer is also included if it is available. The log entry is then appended to the 'logs' directory in a file named with the current date.
 *
 * @return bool True if the log entry was successfully added, false otherwise.
 */
function addLog(): bool
{
    $logName = date("Y-m-d");
    $data = [
        "time" => date("H:i:s"),
        'ip' => $_SERVER['REMOTE_ADDR'],
        'uri' => $_SERVER['REQUEST_URI'],
        'referer' => $_SERVER['HTTP_REFERER'] ?? ''
    ];
    $log = json_encode($data) . "\n";
    return (bool)file_put_contents("logs/$logName.txt", $log, FILE_APPEND);
}

/**
 * Retrieves a list of log files in the 'logs' directory.
 *
 * This function scans the 'logs' directory and returns an array of file names that are valid log files.
 * A log file is considered valid if it is a text file and its name ends with '.txt'.
 *
 * @return array An array of valid log file names.
 */
function getFiles(): array
{
    $files = scandir('logs');
    return array_filter($files, function ($f) {
        return is_file("logs/$f") && checkFileName($f);
    });
}

/**
 * Retrieves log entries from a specified log file.
 *
 * @param string $file The name of the log file to retrieve entries from.
 *
 * @return array An array of log entries. Each entry is an associative array with keys: 'time', 'ip', 'uri', 'referer'.
 *               If the file does not exist or is empty, an empty array is returned.
 */
function getLogs(string $file): array
{
    if (!hasLogFile($file)) {
        return [];
    }

    $files = file("logs/$file");
    $logs = array_map(function ($line) {
        return json_decode(rtrim($line), true);
    }, $files);
    return $logs;
}


/**
 * Checks if the given file name is a valid log file name.
 *
 * This function checks if the given file name is a valid log file name by verifying if it matches the pattern of a date followed by '.txt'.
 *
 * @param string $name The name of the file to check.
 *
 * @return bool True if the file name is a valid log file name, false otherwise.
 */
function checkFileName(string $name): bool
{
    return !!preg_match('/^\d{4}\-\d{2}\-\d{2}\.txt$/', $name);
}


/**
 * Checks if the given file name is a valid log file in the 'logs' directory.
 *
 * This function verifies if the given file name is a valid log file name by checking if it matches the pattern of a date followed by '.txt'.
 * Additionally, it ensures that the file exists in the 'logs' directory.
 *
 * @param string $file The name of the file to check.
 *
 * @return bool True if the file name is a valid log file name and the file exists in the 'logs' directory, false otherwise.
 */
function hasLogFile(string $file): bool
{
    return checkFileName($file) && file_exists("logs/$file");
}

/**
 * Validates a URL to ensure it contains only allowed characters.
 *
 * This function checks if the given URL contains only allowed characters according to the specified pattern.
 * The pattern allows alphanumeric characters, hyphens, underscores, slashes, question marks, periods, equal signs, and ampersands.
 *
 * @param string $url The URL to validate.
 *
 * @return bool True if the URL is valid and contains only allowed characters, false otherwise.
 */
function isValidUrl(string $url): bool
{
    return !!preg_match('/^[aA-zZ0-9-_\/\?\.=&]*$/', $url);
}