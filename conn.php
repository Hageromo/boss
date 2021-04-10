<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Login page</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
    <div title="frm">
            <form method="post">
                <label>UserName</label>
                <input type="text" name="uname">
                <label>Password</label>
                <input type="password" name="pass">
                <input type="submit" name="submit">

            </form>
    </div>
</body>
</html>


<?php

$conn = mysqli_connect("localhost","root","", "php");

if(isset($_POST["submit"])){
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $sql = mysqli_query($conn, "SELECT count(*) as total from users where user_name = '".$uname."' and password = '".$pass."'")
    or die(mysqli_error($conn));

    $rw = mysqli_fetch_array($sql);

    if($rw['total'] > 0){
        echo "<script>alert('username and password are corrent')</script>";
    }else{
        echo "<script>alert('username and password are incorrent')</script>";
    }
}