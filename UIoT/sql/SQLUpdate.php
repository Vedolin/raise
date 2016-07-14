<?php

namespace UIoT\sql;

/**
 * Class SQLUpdate
 * @package UIoT\sql
 */
final class SQLUpdate extends SQLInstruction
{
    /**
     * Generates an UPDATE SQLInstruction | @see SQLInstruction.php
     */
    protected function generateInstruction()
    {
        $this->instruction = SQLWords::getUpdate() .
            SQLWords::getBlank() .
            $this->getEntity() .
            SQLWords::getBlank() .
            SQLWords::getSet() .
            SQLWords::getBlank() .
            $this->configureColumns() .
            SQLWords::getBlank() .
            SQLWords::getWhere() .
            SQLWords::getBlank() .
            $this->criteria->toSql();
    }

    /**
     * Configure Columns and Return It
     *
     * @return string
     */
    protected function configureColumns()
    {
        foreach ($this->properties as $column => $value) {
            $this->properties[$column] = $column . SQLWords::getBlank() . SQLWords::getEqualsOp() .
            SQLWords::getBlank() . is_numeric($value) ? $value : SQLWords::getQuotes() . $value . SQLWords::getQuotes();
        }

        return implode(SQLWords::getComma() . SQLWords::getBlank(), $this->properties);
    }

    /**
     * Configure Columns Values and Return It
     *
     * @return string
     */
    protected function configureValues()
    {
        return '';
    }
}
