<?php  


$listingName = $_GET['listname'];
$listprice = $_GET['price'];
$description = $_GET['description'];

// if(isset($_POST['upload'])){
 
//     $name = $_FILES['image']['name'];
//     $target_dir = "upload/";
//     $target_file = $target_dir . basename($_FILES["image"]["name"]);

//     // Select file type
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//     $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
//     $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
// }


//connect to database

$dsn = "mysql:host=localhost; dbname=wad_t7; port=3306";
$pdo = new PDO($dsn, "root", "");

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
