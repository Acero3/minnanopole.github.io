<?php
require'../classes/user.php';

$user = new User();

$username = $_POST['username'];
$password = $_POST['password'];

$user->login($username, $password);

?>