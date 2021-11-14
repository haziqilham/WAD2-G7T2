<?php
    $connect = mysqli_connect("localhost", "root", "root", "notes");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      } else {
        echo "Connection is successful!";
    }
    
    if(isset($_POST['get_option']))
    {
        $module = $_POST['get_option'];
        var_dump($module);
        $sql = mysqli_query($connect, "SELECT * FROM modules where sid = '$module';");
        var_dump($sql);
        echo "<option value='Select Module'></option>";
        while($row = mysqli_fetch_array($sql)){
            echo "<option value='".$row['cid']."'>".$row['cname']."</option>";
        }
        
    }
?>

