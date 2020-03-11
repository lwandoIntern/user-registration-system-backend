<?php

/**
 * this file should be the only file interacting with the outside of this project. 
 * that way it is easier to debug the project.
 */
require_once '../includes/DBOperations.php';
$response = array();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $db = new DBOperation();
        if($db->createUser($_POST['username'], $_POST['password'], $_POST['email']))
        {
            $response['error'] = false;
            $response['message'] = "User registered successfully";
        }else{
            $response['error'] = true;
            $response['message'] = "Some error occured, please try again";
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Required fields are missing";
    }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);