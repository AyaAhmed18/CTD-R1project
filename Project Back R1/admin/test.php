<?php
include_once("../includes/checkLog.php");
include_once("../includes/conn.php");//connection to the database
//include_once("../includes/showName.php");

try{
  $sql =" SELECT * FROM `categories` " ;
  $stmtcat=$conn->prepare($sql);
  $stmtcat ->execute();

//  echo "Data deleted successfully";
}catch(PDOException $e){
  echo "failed to select category:" .$e->getMessage();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){


    $date = $_POST["Date"];
    $date2 =  date("Y-m-d", strtotime($date));
    $title = $_POST["title"];
    $content = $_POST["content"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $active = $_POST["active"];
    if($active == "on"){
      $state = 1;
    }else if ($active== ""){
      $state =0;
    }
    $cat_id = $_POST["category"];

    // Get reference to uploaded image
    $image_file = $_FILES["image"]; //image is the form input file element name

    // Exit if no file uploaded
    if (!isset($image_file)) {
        die('No file uploaded.');
    }

    // Exit if image file is zero bytes
    if (filesize($image_file["tmp_name"]) <= 0) {
        die('Uploaded file has no contents.');
    }

    // Exit if is not a valid image file
    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
        die('Uploaded file is not an image.');
    }

    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
    $image_extension = image_type_to_extension($image_type, true);

    // Create a unique image name
    $image_name = bin2hex(random_bytes(16)) . $image_extension;

    // Move the temp image file to the images directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],

        // New image location
        __DIR__ . "images/" . $image_name
    );

    try{
        $sql = 'INSERT INTO `meeting`( `date`, `title`, `content`, `location`, `price`, `active`, `image`, `cat_id`) VALUES (?,?,?,?,?,?,?,?)';
        $stmt=$conn->prepare($sql);
        $stmt->execute([$date2,$title, $content,$location, $price, $state, $image_name,$cat_id]);
      }catch(PDOException $e){
          echo "Failed Insert Data: " . $e->getMessage();
      }

}

?>
