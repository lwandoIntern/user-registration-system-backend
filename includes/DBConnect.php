<?php

/**
 * created by Nceba
 * 
 * any connection to db must be done using this class and no other class.
 */
class DBConnect{
    private $connection_link;

    function __construct()
    {
        
    }

    function connect()
    {
        include_once dirname(__FILE__) . '/Constans.php';
        $this->connection_link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(mysqli_connect_errno())
            echo "Failed to connect with database " . mysqli_connect_error();

        return $this->connection_link;
    }
}