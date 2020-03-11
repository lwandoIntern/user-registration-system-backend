<?php
/**
 * created by Nceba
 * 
 * any insert/update/delete of data must happen only in this class
 * and nowhere else
 */
class DBOperation
{
    // 
    private $con;
    // 
    function __construct()
    {
        require_once dirname(__FILE__) . '/DBConnect.php';

        $db = new DBConnect();

        $this->con = $db->connect();
    }

    /**
     * inserts data to db
     * @return true if successful, otherwise return false
     */
    function createUser($username, $unhashed_password, $email)
    {
        $password = md5($unhashed_password);

        $stmt = $this->con->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);

        return ($stmt->execute()) ? true : false;
    }
}