<?php

namespace DeliciousBrains\WPMDB\Container\Dotenv\Repository\Adapter;

use DeliciousBrains\WPMDB\Container\PhpOption\None;
use DeliciousBrains\WPMDB\Container\PhpOption\Some;
class ServerConstAdapter implements \DeliciousBrains\WPMDB\Container\Dotenv\Repository\Adapter\AvailabilityInterface, \DeliciousBrains\WPMDB\Container\Dotenv\Repository\Adapter\ReaderInterface, \DeliciousBrains\WPMDB\Container\Dotenv\Repository\Adapter\WriterInterface
{
    /**
     * Determines if the adapter is supported.
     *
     * @return bool
     */
    public function isSupported()
    {
        return \true;
    }
    /**
     * Get an environment variable, if it exists.
     *
     * @param string $name
     *
     * @return \PhpOption\Option<string|null>
     */
    public function get($name)
    {
        if (\array_key_exists($name, $_SERVER)) {
            return \DeliciousBrains\WPMDB\Container\PhpOption\Some::create($_SERVER[$name]);
        }
        return \DeliciousBrains\WPMDB\Container\PhpOption\None::create();
    }
    /**
     * Set an environment variable.
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return void
     */
    public function set($name, $value = null)
    {
        $_SERVER[$name] = $value;
    }
    /**
     * Clear an environment variable.
     *
     * @param string $name
     *
     * @return void
     */
    public function clear($name)
    {
        unset($_SERVER[$name]);
    }
}
