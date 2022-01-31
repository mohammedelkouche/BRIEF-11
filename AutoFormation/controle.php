<?php

// exemple GET
$admins = array("oussama", "hassan","sayed") ;
$username = $_GET['username'] ;
if(in_array($username,$admins )){
    echo "welcome " .$username. " to control panel for admin" ;
}else{
    echo "sorry this youser name  is not exist in our client area" ;
}

// exemple POST
// $admins = array("oussama", "hassan","sayed") ;
// $username = $_POST['username'] ;
// if(in_array($username,$admins )){
//     echo "welcome" .$username. " to control panel for admin" ;
// }else{
//     echo "sorry this youser name  is not exist in our client area"
// }

// echo "your user name is ".$_GET['username']."<br>";
// echo "your password is ".$_GET['password']."<br>";
// echo "your user name is ".$_POST['username']."<br>";
// echo "your password is ".$_POST['password']."<br>";

?>