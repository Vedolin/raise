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

namespace App\Managers;

use App\Database\Couchbase as CouchbaseHandler;
use App\Models\Interfaces\Database as DatabaseHandler;
use App\Models\Response\Message;

/**
 * Class Database.
 *
 * A Manager is a Mediator, it does specific processes and operations
 * to make everything available and functional for the rest of the components.
 *
 * The DatabaseManager manages the Database Handler selection,
 * the connectivity of it and the availability of the Handler
 *
 * @see DatabaseHandler
 * @see CouchbaseHandler
 * @see https://en.wikipedia.org/wiki/Mediator_pattern Mediator Design Pattern
 *
 * @version 2.0.0
 *
 * @since 2.0.0
 */
class Database
{
    /**
     * The instance of the Desired Database Handler.
     *
     * @see CouchbaseHandler
     * @see DatabaseHandler
     *
     * @var DatabaseHandler the Instance of the Database Handler
     */
    private static $databaseHandler;

    /**
     * Connection Configuration.
     *
     * The configuration schema of the Database
     *
     * @see DatabaseSettings
     *
     * @var array|object
     */
    private static $configuration;

    /**
     * Get the Database Handler.
     *
     * Creates the Connection if doesn't exists and instantiates the Handler
     * if also doesn't exists.
     *
     * @return CouchbaseHandler|DatabaseHandler the Database Handler
     */
    public static function getHandler()
    {
        global $response;

        if (self::$databaseHandler == null) {
            self::$databaseHandler = self::setHandler();

            if (self::$databaseHandler == null) {
                $response(response()::setResponse(500, new Message(), [
                    'message' => 'Failed to Connect upon Database',
                    'details' => 'The Database Handler doesn\'t exists',
                ]));
            }

            self::$databaseHandler->connect(self::$configuration);
        }

        return self::$databaseHandler;
    }

    /**
     * Set the Database Handler.
     *
     * check if the desired Database Handler exists
     * store it and create it.
     *
     * Also retrieves the configuration schema
     *
     * @return bool|DatabaseHandler the Handler if exists, false if not
     */
    protected static function setHandler()
    {
        $handler = ('App\Database\\' . str_replace(' ', '',
                ucwords(str_replace('-', ' ', setting('raise.databaseType')))));

        if (class_exists($handler)) {
            self::$configuration = setting('database');

            return new $handler();
        }

        return false;
    }
}
