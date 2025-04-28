<?php  

include("../db.php");

if(isset($_GET['guid'])){

 $guid = $_GET['guid'];

$sql = "SELECT * FROM students WHERE guid = '$guid' ";
$result = mysqli_query($connect, $sql);



if($row = mysqli_fetch_assoc($result) ){
    $name = $row["name"];
    $email = $row["email"];
    $contact_number = $row["contact_num"];
    $class = $row["class"];
    $birth_date = $row["date_of_birth"]; 
    echo'<script>console.log(' . json_encode($row) . '); </script>';
}else{
    echo"Student Not Found";
    exit();
}

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $guid = $_POST ['guid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_num'];
    $class = $_POST['class'];
    $birth_date = $_POST['date_of_birth'];


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
    
        $sql = "UPDATE students SET name = '$name',
         class = '$class',
         contact_num = '$contact_number',
         email = '$email',
         date_of_birth = '$birth_date' ";


        $result = mysqli_query($connect, $sql);
        if(!$result){
            echo "error : " . mysqli_error( $connect); 
        }else{
            header("Location: list_books.php");
            echo "Student has been Updated";
        }
        
        }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_and_edit_student.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
<h1>Edit Student </h1>
    <form class="h-70 w-50 card p-3 d-flex justify-content-center align-items-center flex-column" action="edit_student.php" method="post">
     
    <div class="form-group">
    <label for="title"> Name</label>
    <input class="form-control"  type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" >
    </div>
    
    <div class="form-group">  
    <label for="class">Class</label>
    <input class="form-control" type="text" name="class" value="<?php echo htmlspecialchars($class)?>">
    </div>

    <div class="form-group">
    <label for="contact_number">Contact Number</label>
    <input class="form-control" type="number" name="contact_number" value="<?php echo htmlspecialchars($contact_number)?>">
    </div>


    <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($email)?>">
    </div>

    <div class="form-group">
    <label for="birth_date"> date of birth</label>
    <input class="form-control" type="date" name="birth_date" value="<?php echo htmlspecialchars($birth_date)?>">
    </div>

    <input class="btn btn-primary" type="submit">

    </form>

</body>
</html>