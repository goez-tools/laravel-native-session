<?php

namespace Goez\LaravelNativeSession;


class NativeSessionHandler implements \SessionHandlerInterface
{
    /**
     * Reference to our session data
     * @var array
     */
    private $data;

    /**
     * {@inheritDoc}
     */
    public function open($savePath, $sessionName)
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function close()
    {
        session_write_close();
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function read($sessionId)
    {
        return serialize($this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function write($sessionId, $data)
    {
        $this->data = unserialize($data);
    }

    /**
     * {@inheritDoc}
     */
    public function destroy($sessionId)
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function gc($lifetime)
    {
        return true;
    }
}