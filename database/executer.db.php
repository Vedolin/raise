<?php

class DatabaseExecuter
{
    public function execute($query, $connection)
    {
        //var_dump($query);
        //echo"<br>";
        $final_result = "";
        $result = $connection->query($query);

        if(!self::is_select($query)) {
            if(!$result)
                return false;
            return true;
        }

        if ($result->rowCount() > 0)
           $final_result = $result->fetchAll(PDO::FETCH_ASSOC);

        $connection = null; //destroying PDO object
        return $final_result;
    }

    private function is_select($query)
    {
        if(substr($query,0,6) != SQL::SELECT)
            return false;
        return true;
    }
}