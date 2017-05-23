<?php

namespace App\Factories;

/**
 * Class SettingsFactory.
 */
class SettingsFactory extends BaseFactory
{
    /**
     * Get an Element.
     *
     * If the element exists return in,
     * If not return a false boolean.
     *
     * @param string $element
     *
     * @return mixed|bool
     */
    public static function get(String $element)
    {
        return array_key_exists($element, self::getInstance()->elements)
            ? self::getInstance()->elements[$element] : false;
    }

    /**
     * Add an Element.
     *
     * Return true if added with success, false if element already exists
     *
     * @param string $element
     * @param mixed  $content
     *
     * @return bool
     */
    public static function add(String $element, $content)
    {
        $className = ('App\Models\Settings\\' . ucfirst($element) . 'Settings');

        if (!array_key_exists($element, self::getInstance()->elements) && class_exists($className)) {
            self::getInstance()->elements[$element] = (new $className())->fill($content);

            return true;
        }

        return false;
    }

    /**
     * Remove an Element.
     *
     * Return true if removed with success, false if element doesn't exists
     *
     * @param string $element
     *
     * @return bool
     */
    public static function remove(String $element)
    {
        if (array_key_exists($element, self::getInstance()->elements)) {
            unset(self::getInstance()->elements[$element]);

            return true;
        }

        return false;
    }
}
