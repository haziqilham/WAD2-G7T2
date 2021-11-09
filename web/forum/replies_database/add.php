<?php

require_once 'common.php';

$status = false;
//var_dump($_POST);

if( isset($_POST['username']) && isset($_POST['threadName']) && isset($_POST['content']) ) {
    $subject = $_POST['username'];
    $entry = $_POST['threadName'];
    $mood = $_POST['content'];

    $dao = new PostDAO();
    $status = $dao->add($username, $threadName, $content);
}

?>
<html>
<body>
    <?php
        if( $status ) {
            echo "<h1>Insertion was successful</h1>";
            echo "Click <a href='display.php'>here</a> to return to Main Page";
        }
        else {
            echo "<h1>Insertion was NOT successful</h1>";
        }
    ?>
</body>
</html>