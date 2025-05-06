<?php
include("../db.php");


if(isset($_GET['book_uuid'])){
    $guid = $_GET['book_uuid'];

    $sql = "SELECT * FROM books WHERE guid = '$guid'";
    $result = mysqli_query($connect,$sql);
    

    echo'<script> console.log('. json_encode($result ).')</script>';

    if($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $author = $row['author'];
        $publisher_name = $row['publisher_name'];
        $published_year = $row['published_year'];
        $price = $row['price'];
        $photo = $row['image'];  
        echo'<script> console.log('. json_encode($row ).')</script>';
    } else {
        echo"Book not found";
        exit();
    }
}
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $guid = $_POST["book_uuid"];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $published_year = $_POST['published_year'];
    $price = $_POST['price'];

    if(isset($_FILES['photo'])&&$_FILES['photo']['error']==0){

        $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . basename($photo_name);
        move_uploaded_file($photo_tmp, $photo_path);

        $sql  = "UPDATE books SET title = '$title',
        author = '$author',
         publisher_name='$publisher_name', 
         published_year='$published_year',
         image = '$photo_name',
         price='$price' WHERE guid = '$guid'";
    }else{
        $sql  = "UPDATE books SET title = '$title',
        author = '$author',
         publisher_name='$publisher_name',
         published_year='$published_year',
        price='$price' WHERE guid = '$guid'";
    }

    $result = mysqli_query($connect, $sql);

    if($result){
        header("Location: create_and_edit_book.php");
        exit();
    }else{
        echo "Error updating book: " . mysqli_error($connect);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Register Book</title>
</head>
<body  class="h-100 d-flex justify-content-center align-items-center flex-column" >
    <div class="d-flex vh-100 vw-100 flex-column p-2 ">
<div class="d-flex h-20 justify-content-start">
<a href="#sidebar" class="d-block mt-2 pl-2"  data-bs-toggle="offcanvas" role="button" aria-controls="sidebar"><i class="bi bi-list" style="font-size:3rem;"   ></i></a>
</div>
<div class="h-80 d-flex align-items-center justify-content-center flex-column">
    <h1>Edit Book</h1>

    <?php if (!empty($error_message)): ?>
    <div class="alert alert-danger w-50" role="alert">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>


    <form class="h-70 w-50 card p-3 d-flex justify-content-center align-items-center flex-column" action="edit_book.php" method="post" enctype="multipart/form-data">
        <div class="form-group d-flex flex-column">
    <label for="title">Title</label>
    <input class="form-control"  type="text" name="title" value="<?php echo htmlspecialchars($title) ?>"  >
    </div>

    <div class="form-group d-flex flex-column">
    <label for="author">author</label>
    <input class="form-control" type="text" name="author"  value="<?php echo htmlspecialchars($author) ?>">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="publisher_name">publisher name</label>
    <input class="form-control" type="text" name="publisher_name" value="<?php echo htmlspecialchars($publisher_name) ?>">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="published_year">published year</label>
    <input class="form-control" type="number" name="published_year" value="<?php echo htmlspecialchars($published_year ?? '');?>">
    </div>

    <div class=" form-group d-flex flex-column ">
    <label for="photo">Cover Photo</label>
    <input class="form-control" type="file" accept="image/*" name="image">
    </div>

    <div class="form-group d-flex flex-column"> 
    <label for="price">price</label>
    <input class="form-control" type="number" name="price" value="<?php echo htmlspecialchars($price ?? '')?>">
    </div>
 
    <input type="hidden" name="book_uuid" value="<?php echo htmlspecialchars($guid); ?>">
    
    <div class="form-group d-flex flex-column">
    <input class="btn btn-primary"  type="submit" >
    </div>
    </form> 
    </div>
    </div>

     <!-- offcanvas -->

     <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">

<div class="offcanvas-header">
    <div class="offcanvas-body">

    <div class="options">
<h1 class="heading">Dashboard</h1>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="create_and_edit_book.php">create book</a>
</div>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="create_and_edit_student.php">create student</a>
</div>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="list_books.php">list books</a>
</div>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="list_students.php">list students</a>
</div>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="book_issue_form.php"> issue book</a>
</div>
<div class="p-2 border-top border-bottom">  
    <a class="text-decoration-none text-dark" href="book_issue_list"> list issued books</a>
</div>
<div class="p-2 border-top border-bottom"> 
    <a class="text-decoration-none text-dark" href="book_return_status">return status</a>
</div>
<div class="p-2 border-top border-bottom" style="margin-top:300px;"> 
<a class="text-decoration-none text-dark " href="logout.php" >Logout</a>
</div>
</div>

    </div>
</div>

</div>

<!-- offcanvasend -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>





