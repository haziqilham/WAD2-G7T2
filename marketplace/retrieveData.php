<?php 

$dsn = "mysql:host=localhost; dbname=marketplace; port=3306";
$pdo = new PDO($dsn, "root", "");

$received_data = json_decode(file_get_contents("php://input"));

$data = array();


    $query = "SELECT * FROM market ORDER BY id ASC";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
 

    while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }


echo json_encode($data);

?>
