<?php




if (isset($_POST['createUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    createUser($username,$password,$firstname,$lastname);
}
if (isset($_POST['loginUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo userLogin($username,$password);
}



function createUser($username,$password,$firstname,$lastname)
{
    $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "INSERT INTO `user`(`username`, `password`, `firstname`, `lastname`) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."')";

    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}

function userLogin($username,$password)
{
    $mysqli = new mysqli("localhost", "root", "", "inventory_db");

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt insert query execution
    $sql = "SELECT COUNT(*) AS sample FROM `user` WHERE username = '".$username."' AND password = '".$password."' ";

    $result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);


    // Close connection
    $mysqli->close();

    return $row['sample'];
}
 ?>
