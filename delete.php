<?php 
include('server.php');
if(isset($_GET["id"])){
    $query = "DELETE FROM `contact` WHERE ID=".$_GET["id"];
    if($db->query($query) == true){
        header('location: index.php');
    }
}
?>