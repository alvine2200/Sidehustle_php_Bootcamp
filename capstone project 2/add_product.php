<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center ">
            <div class="col-sm-8 col-md-offset-4">
                <div class="card-header">
                    <h3 class="text-center">Enter Your Products</h3>
                </div>
                <div class="card-body mt-5">
                    <form class="form-horizontal" action="add_product.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" required>
                      </div>
                      <div class="mb-3">
                        <label for="name">Product image</label>
                        <input type="file" class="form-control" name="image" required>
                      </div>
                      <div class="mb-3">
                        <label for="name">Product Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter the price" required>
                      </div>

                      <button type="submit" name="add_product" class="btn btn-primary" >add_product</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <?php
    require_once "connection.php";
   // $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

    $name="";
    $price="";
    $image="";

    $error=array();

      if(isset($_POST['add_product']))
    {
        
        $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "Only letters and white space allowed";
            }
        $price = test_input($_POST["price"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = "Only letters and white space allowed";
            }
        $image =$_FILES["image"];
            if(isset($image)){
                $file_name=$_FILES["image"]["name"];
                $file_size=$_FILES["image"]["size"];
                $file_tmp=$_FILES["image"]["tmp_name"];
                $file_type=$_FILES["image"]["type"];
                $file_ext=strtolower(end(explode('.',$_FILES['image']["name"])));

                $extensions=array("jpeg","jpg","png","gif","svg");

                if(in_array($file_ext,$extensions)){
                    $error[]="Extension not allowed";
                }
            }
             
         if($error > 0)
         {
            $conn= new mysqli('localhost','root','','sidehustle_ecommerce') or die("Connect failed: %s\n". $conn);
            $query = "INSERT INTO products ('name','image','price') VALUES('$name','$image','$price')";

            if (mysqli_query($conn, $query)) {
                echo "New Product has been added successfully !";
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            mysqli_close($conn);

        }
    
    }    

    //validates data input
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>