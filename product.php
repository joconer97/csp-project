<?php




if (isset($_POST['createProduct'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    createProduct($name,$quantity,$category);
}
if (isset($_POST['getProduct'])) {
    getProduct();
}

if(isset($_POST['deleteProduct'])){
  $id = $_POST['id'];

  deleteProduct($id);
}

if(isset($_POST['updateProduct'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $category = $_POST['category'];

  updateProduct($name,$quantity,$category,$id);
}

function deleteProduct($id)
{
    $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "DELETE FROM `product` WHERE id = '".$id."'";

    if($mysqli->query($sql) === true){
        echo "Delete successfully";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
function updateProduct($name,$quantity,$category,$id)
{
    $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "UPDATE `product` SET `name`= '".$name."',`quantity`= '".$quantity."' ,`category`= '".$category."' WHERE id = '".$id."' ";

    if($mysqli->query($sql) === true){
        echo "Update successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}

function createProduct($name,$quantity,$category)
{
    $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "INSERT INTO `product`(`name`, `quantity`, `category`) VALUES ('".$name."','".$quantity."','".$category."')";

    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}

function getProduct()
{
   $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "SELECT * FROM `product`";

    $result = $mysqli->query($sql);
    $row =   mysqli_fetch_array($result);


    $dbdata = array();


    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }


    echo json_encode($dbdata);

    $mysqli->close();
}
 ?>
