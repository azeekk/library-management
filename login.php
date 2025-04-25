<?php 

include("db.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        echo"All fields are required";
        exit;
    }else{

        $sql = "select * from admin where email = '$email'";
        $result = mysqli_query($connect, $sql);

if($result->num_rows>0){

$row = mysqli_fetch_assoc($result);
if($row["password"] == $password) {

$_SESSION['admin_id'] = $row['admin_id'];

header('location: admin/dashboard.php');
exit();

}else{
    header("Location: login.php");
    exit();
}

}else{
echo "invalid email or error with the query";
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
    <title>Login</title>
</head>                                         
<body>
    <form class="form" action="login.php" method="post">
        <label name="email">Enter Email</label>
        <input class="email" type="email" name="email" placeholder="Email">
        <label name="password">Enter password</label>
        <input  class="password" type="password" name="password" placeholder="password">
        <input class="button" type="submit" > <a href="register.php">create account</a>
    </form>
</body>
</html>