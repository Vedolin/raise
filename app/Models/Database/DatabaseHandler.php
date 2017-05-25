<?php

namespace App\Models\Database;

/**
 * Class DatabaseHandler.
 */
abstract class DatabaseHandler
{
    /**
     * Connect to the Database.
     *
     * @param array|object $connection
     *
     * @return mixed
     */
    abstract public function connect($connection);

    /**
     * Destroy the Connection.
     *
     * @return mixed
     */
    abstract public function destroy();

    /**
     * Insert Data on Database.
     *
     * @param string $table
     * @param $data
     * @param null $parameters
     *
     * @return mixed
     */
    abstract public function insert(string $table, $data, $parameters = null);

    /**
     * Select Data on Database.
     *
     * @param string $table
     * @param null $parameters
     *
     * @return mixed
     */
    abstract public function select(string $table, $parameters = null);

    /**
     * Count number of Elements of a specific Query
     *
     * @param string $table
     * @param null $parameters
     * @return mixed
     */
    abstract public function count(string $table, $parameters = null);

    /**
     * Update an Element of the Database
     *
     * @param string $table
     * @param $elementIdentifier
     * @return mixed
     */
    abstract public function update(string $table, $elementIdentifier);
}
