<?php  


$listingName = $_GET['listname'];
$listprice = $_GET['price'];
$description = $_GET['description'];


//connect to database

$dsn = "mysql:host=localhost; dbname=wad_t7; port=3306";
$pdo = new PDO($dsn, "root", "root");

$sql = "insert into market (listname, price, description) values (:listname, :price, :description)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':listname', $listingName, PDO::PARAM_STR);
$stmt->bindParam(':price', $listprice, PDO::PARAM_STR);
$stmt->bindParam(':description', $description, PDO::PARAM_STR);
// $stmt->bindParam(':imgdata', $image, PDO::PARAM_LOB);

$stmt->execute();
echo "data inserted successfully";


$stmt =null;
$pdo = null;

header("Location: ./marketplace.html");

?>
