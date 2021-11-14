<?php
    $connect = mysqli_connect("localhost", "root", "root", "wad_g7");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      } else {
        //echo "Connection is successful!";
    }
    
    //var_dump($_POST);
    if(isset($_POST['get_option']))
    {
        $module = $_POST['get_option'];
        $sql = mysqli_query($connect, "UPDATE replies set likes = likes + 1 where reply_id = '$module';");
        $result = mysqli_query($connect, "SELECT * from replies where reply_id = '$module';");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC );
        echo "".$row['likes'];"";    
    }
?>