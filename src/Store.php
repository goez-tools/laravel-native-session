<?php

namespace Goez\LaravelNativeSession;

use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

class Store implements SessionInterface
{
    private $started = false;

    /**
     * Starts the session storage.
     *
     * @return bool True if session started
     *
     * @throws \RuntimeException If session fails to start.
     */
    public function start()
    {
        $this->started = (session_status() === PHP_SESSION_ACTIVE);
    }

    /**
     * Returns the session ID.
     *
     * @return string The session ID
     */
    public function getId()
    {
        return session_id();
    }

    /**
     * Sets the session ID.
     *
     * @param string $id
     */
    public function setId($id)
    {
        // Do nothing
    }

    /**
     * Returns the session name.
     *
     * @return mixed The session name
     */
    public function getName()
    {
        return session_name();
    }

    /**
     * Sets the session name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        // Do nothing
    }

    /**
     * Invalidates the current session.
     *
     * Clears all session attributes and flashes and regenerates the
     * session and deletes the old session from persistence.
     *
     * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                      will leave the system settings unchanged, 0 sets the cookie
     *                      to expire with browser session. Time is in seconds, and is
     *                      not a Unix timestamp.
     *
     * @return bool True if session invalidated, false if error
     */
    public function invalidate($lifetime = null)
    {
        session_destroy();
    }

    /**
     * Migrates the current session to a new session id while maintaining all
     * session attributes.
     *
     * @param bool $destroy Whether to delete the old session or leave it to garbage collection
     * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                       will leave the system settings unchanged, 0 sets the cookie
     *                       to expire with browser session. Time is in seconds, and is
     *                       not a Unix timestamp.
     *
     * @return bool True if session migrated, false if error
     */
    public function migrate($destroy = false, $lifetime = null)
    {
        if ($destroy) {
            $this->invalidate();
        }
    }

    /**
     * Force the session to be saved and closed.
     *
     * This method is generally not required for real sessions as
     * the session will be automatically saved at the end of
     * code execution.
     */
    public function save()
    {
        // Do nothing
    }

    /**
     * Checks if an attribute is defined.
     *
     * @param string $name The attribute name
     *
     * @return bool true if the attribute is defined, false otherwise
     */
    public function has($name)
    {
        return array_key_exists($name, $_SESSION);
    }

    /**
     * Returns an attribute.
     *
     * @param string $name The attribute name
     * @param mixed $default The default value if not found
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return Arr::get($_SESSION, $name, $default);
    }

    /**
     * Sets an attribute.
     *
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        Arr::set($_SESSION, $name, $value);
    }

    /**
     * Returns attributes.
     *
     * @return array Attributes
     */
    public function all()
    {
        return $_SESSION;
    }

    /**
     * Sets attributes.
     *
     * @param array $attributes Attributes
     */
    public function replace(array $attributes)
    {
        $_SESSION = $attributes;
    }

    /**
     * Removes an attribute.
     *
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * Clears all attributes.
     */
    public function clear()
    {
        $_SESSION = [];
    }

    /**
     * Checks if the session was started.
     *
     * @return bool
     */
    public function isStarted()
    {
        return $this->started;
    }

    /**
     * Registers a SessionBagInterface with the session.
     *
     * @param SessionBagInterface $bag
     */
    public function registerBag(SessionBagInterface $bag)
    {
        // Do nothing
    }

    /**
     * Gets a bag instance by name.
     *
     * @param string $name
     *
     * @return SessionBagInterface
     */
    public function getBag($name)
    {
        return null;
    }

    /**
     * Gets session meta.
     *
     * @return MetadataBag
     */
    public function getMetadataBag()
    {
        return null;
    }
}