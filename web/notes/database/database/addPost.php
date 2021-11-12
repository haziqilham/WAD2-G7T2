<?php
    require_once 'common.php';
    $status = false;
    $result = [];

    if( isset($_GET['username']) && isset($_GET['threadName']) && isset($_GET['content']) ) {
        $subject = $_GET['username'];
        $entry = $_GET['threadName'];
        $mood = $_GET['content'];

        $result["username"] = $username;

        $dao = new PostDAO();
        $status = $dao->add($username, $threadName, $content);
    } else {
        try {
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            
            $username = $data->username;
            $threadName = $data->threadName;
            $content = $data->content;
        
            $result["username"] = $username;
        
            $dao = new PostDAO();
            $status = $dao->add($username, $threadName, $content);
        
        } catch (Exception $e) {
            $status = false;
        }
    
    }

    if ($status)
        $result["status"] = "Post added successfully";
    else 
        $result["status"] = "Post was not added";

    $postJSON = json_encode($result);
    echo $postJSON;
?>


