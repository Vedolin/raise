<?php

/**
 * UIoT Service Layer
 * @version alpha
 *                          88
 *                          ""              ,d
 *                                          88
 *              88       88 88  ,adPPYba, MM88MMM
 *              88       88 88 a8"     "8a  88
 *              88       88 88 8b       d8  88
 *              "8a,   ,a88 88 "8a,   ,a8"  88,
 *               `"YbbdP'Y8 88  `"YbbdP"'   "Y888
 *
 * @author Universal Internet of Things
 * @license MIT <https://opensource.org/licenses/MIT>
 * @copyright University of Brasília
 */

namespace UIoT\Interfaces;

/**
 * Interface InteractionInterface
 *
 * A Interaction is literally an Interaction that a `client`
 * does in RAISE.
 *
 * @package UIoT\Interfaces
 */
interface InteractionInterface
{
    /**
     * Does the Interaction Business Logic
     * and stores in an internal Variable;
     *
     * Necessary the business logic and logical operations
     * happens in this method.
     */
    public function __construct();

    /**
     * Used to return the result of the business logic
     * Necessary is a MessageInterface the result.
     * Since the Interactions returns the Message Results
     *
     * @return string
     */
    public function __toString();
}
