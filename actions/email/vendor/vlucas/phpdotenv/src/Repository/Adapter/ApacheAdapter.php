<?php

declare(strict_types=1);

namespace Dotenv\Repository\Adapter;

use PhpOption\None;
use PhpOption\Option;
use PhpOption\Some;
use function function_exists;
use function is_string;

final class ApacheAdapter implements AdapterInterface
{
    /**
     * Create a new apache adapter instance.
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return Option
     */
    public static function create()
    {
        if (self::isSupported()) {
            /** @var Option */
            return Some::create(new self());
        }

        return None::create();
    }

    /**
     * Determines if the adapter is supported.
     *
     * This happens if PHP is running as an Apache module.
     *
     * @return bool
     */
    private static function isSupported()
    {
        return function_exists('apache_getenv') && function_exists('apache_setenv');
    }

    /**
     * Read an environment variable, if it exists.
     *
     * @param string $name
     *
     * @return Option
     */
    public function read(string $name)
    {
        /** @var Option */
        return Option::fromValue(apache_getenv($name))->filter(static function ($value) {
            return is_string($value) && $value !== '';
        });
    }

    /**
     * Write to an environment variable, if possible.
     *
     * @param string $name
     * @param string $value
     *
     * @return bool
     */
    public function write(string $name, string $value)
    {
        return apache_setenv($name, $value);
    }

    /**
     * Delete an environment variable, if possible.
     *
     * @param string $name
     *
     * @return bool
     */
    public function delete(string $name)
    {
        return apache_setenv($name, '');
    }
}
