<?php

$id = $_GET['id'];

$mysqli = new mysqli("localhost", "root", "", "inventory_db");

if($mysqli === false){
    die("ERROR: Could not connect. "
                . $mysqli->connect_error);
}

$sql = "SELECT * FROM `product` where id = '".$id."' ";
if($res = $mysqli->query($sql)){
    if($res->num_rows > 0){
        while($row = $res->fetch_array()){
                echo "<input type='text' value='".$row['name']."'"  . "/>" . "<br>";
                echo "<input type='text' value='".$row['quantity']."'"  . "/>" . "<br>";
                echo "<input type='text' value='".$row['category']."'"  . "/>" . "<br>";
        }
        $res->free();
    } else{
        echo "No matching records are found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. "
                                    . $mysqli->error;
}

$mysqli->close();
?>
