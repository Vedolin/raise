<?php

/**
 *  _    _ _____   _______
 * | |  | |_   _| |__   __|
 * | |  | | | |  ___ | |
 * | |  | | | | / _ \| |
 * | |__| |_| || (_)|| |
 * \_____/|____\____/|_|.
 *
 * @author Universal Internet of Things
 * @license Apache 2 <https://opensource.org/licenses/Apache-2.0>
 * @copyright University of Brasília
 */

namespace App\Rules;

use Common\ModelReflection\ModelProperty;
use Validator\IRule;
use Validator\ModelValidatorException;

/**
 * Class LocationRule.
 *
 * A Mapping Rule used to set the Location of a Client
 *
 * @version 2.1.0
 *
 * @since 2.1.0
 */
class LocationRule implements IRule
{
    /**
     * Used in your @rule annotation (single value)
     * Can have aliases (hence the array)
     * Case insensitive
     *
     * @return array
     */
    function getNames()
    {
        return ['locationRule'];
    }

    /**
     * Define your rule and have your property pass it
     * Additional rule parameters are stored inside $params
     * Should throw an Exception on failure
     *
     * @param ModelProperty $property
     * @param array $params
     *
     * @throws \Throwable
     */
    function validate(ModelProperty $property, array $params = array())
    {
        $location = $property->getPropertyValue();

        if (strpos($location, ':') === false) {
            throw new ModelValidatorException('The provided Location isn\'t a valid Location string');
        }

        $location = explode(':', $location);

        if (!is_numeric($location[0]) || !is_numeric($location[1])) {
            throw new ModelValidatorException('The provided Location isn\'t a valid Location string');
        }
    }
}