<?php  


$listingName = $_GET['listname'];
$listprice = $_GET['price'];
$description = $_GET['description'];


//connect to database

$dsn = "mysql:host=localhost; dbname=marketplace; port=3306";
$pdo = new PDO($dsn, "root", "");

$sql = "insert into market (listname, price, description) values (:listname, :price, :description)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':listname', $listingName, PDO::PARAM_STR);
$stmt->bindParam(':price', $listprice, PDO::PARAM_STR);
$stmt->bindParam(':description', $description, PDO::PARAM_STR);

$stmt->execute();
echo "data inserted successfully";


$stmt =null;
$pdo = null;

header("Location: ./marketplace.html");

?>
