<?php 

$conn = mysqli_connect('localhost','marek','123','books');

if(!$conn){
    echo 'Connection error: '.mysqli_connect_error();
}

?>