<?php 

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){                                       
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

if(empty($username) || empty($email) || empty($password)){
    echo "all fields are required";
    exit;
}else{

    $sql = "insert into admin(name,email,password )VALUES('$username','$email','$password')";

    $result = mysqli_query($connect,$sql);


    if (!$result){
        echo "error : " . mysqli_error( $connect);                                           
    }else{
        echo "you have registered succesfully";
    }
}
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

    <form class="form" action="register.php" method="post">
    <input class="name" type="text" name="name" placeholder="Name">
    <input class="email" type="email" name="email" placeholder="Email">
    <input class="password" type="password" name="password" placeholder="Password">      
    <input class="button" type="submit">
    <a href="login.php">sign in</a>
     
    </form>
</body>
</html>