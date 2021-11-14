<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "wad_g7";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    // if ($conn->connect_error) {
    //    die("Connection failed: " . $conn->connect_error);
    //  } else {
    //    echo "Connection is succesful!";
    //  }
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page-1) * $limit;
    $result1 = $conn->query("SELECT count(id) AS id FROM threads ");
    $threadCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $threadCount[0]['id'];
    $pages = ceil($total / $limit);
    $previous = $page - 1;
    $next = $page + 1;
?>

