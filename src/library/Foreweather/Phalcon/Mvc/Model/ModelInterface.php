<?php


namespace Foreweather\Phalcon\Mvc\Model;

interface ModelInterface
{
    /**
     * @param array $exclude
     *
     * @return string
     */
    public static function excluded(array $exclude = []): string;

    /**
     * @return bool
     */
    public function validation(): bool;
}
