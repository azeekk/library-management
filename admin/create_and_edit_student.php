<?php

include("../db.php");

$error_message = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $class = $_POST["class"];
    $birth_date = $_POST["birth_date"];
    $guid = uniqid('book_', true);


if(empty($id)){
    $error_message = "id required";
}
elseif(empty($name)){
   
   $error_message = "name required";
    
}elseif(empty($email)){
    $error_message = "email required";
    
}elseif (empty($contact_number)) {
    $error_message = "contact number required";
    
}elseif (empty($class)){
    $error_message = "class required";
    
}elseif(empty($birth_date)) {
    $error_message = "birth date required";
        
}else{

    $sql = "insert into students(name,class,contact_num,email,date_of_birth,guid)VALUES('$name','$class','$contact_number','$email','$birth_date','$guid')";
    $result = mysqli_query($connect, $sql);
    if(!$result){
        echo "error : " . mysqli_error( $connect); 
    }else{
        header("Location: list_students.php");
        echo "Student has been registered";
    }
    
    }


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body class="h-100 d-flex justify-content-center align-items-center flex-column">
    
<h1>Register Student </h1>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-danger w-50" role="alert">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>


    <form class="h-70 w-50 card p-3 d-flex justify-content-center align-items-center flex-column" action="create_and_edit_student.php" method="post">
    <div class="form-group d-flex flex-column">
    <label for="title">student name</label>
    <input class="form-control"  type="text" name="name"  >
    </div>

    <div class="form-group d-flex flex-column">
    <label for="class">class</label>
    <input class="form-control" type="text" name="class" >
    </div>

    <div class="form-group d-flex flex-column">
    <label for="contact_number">contact number</label>
    <input class="form-control" type="number" name="contact_number">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="email">email</label>
    <input class="form-control" type="email" name="email">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="birth_date"> date of birth</label>
    <input class="form-control" type="date" name="birth_date">
    </div>
    
    <input class="btn btn-primary" type="submit">

    </form>

 


</body> 
</html>

