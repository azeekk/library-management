<?php
include("../db.php");
if(isset($_GET['guid'])){
    $guid = $_GET['guid'];

    $sql = "SELECT * FROM books WHERE guid = '$guid'";
    $result = mysqli_query($connect,$sql);
    

    echo'<script> console.log('. json_encode($result ).')</script>';

    if($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $author = $row['author'];
        $publisher_name = $row['publisher_name'];
        $published_year = $row['published_year'];
        $price = $row['book_price'];
        $photo = $row['cover_page_photo'];
    } else {
        echo"Book not found";
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $guid = $_POST["guid"];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $published_year = $_POST['published_year'];
    $price = $_POST['book_price'];

    if(isset($_FILES['photo'])&&$_FILES['photo']['error']==0){

        $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . basename($photo_name);
        move_uploaded_file($photo_tmp, $photo_path);

        $sql  = "UPDATE books SET title = '$title',
        author = '$author',
         publisher_name='$publisher_name', 
         published_year='$published_year',
         cover_page_photo = '$photo_name',
         book_price='$price' WHERE guid = '$guid'";
    }else{
        $sql  = "UPDATE books SET title = '$title',
        author = '$author',
         publisher_name='$publisher_name',
         published_year='$published_year',
        book_price='$price' WHERE guid = '$guid'";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Register Book</title>
</head>
<body  class="h-100 d-flex justify-content-center align-items-center flex-column" >
    <h1>edit Book</h1>

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
    <input class="form-control" type="number" name="published_year" value="<?php echo htmlspecialchars($published_year)?>">
    </div>

    <div class=" form-group d-flex flex-column ">
    <label for="photo">Cover Photo</label>
    <input class="form-control" type="file" accept="image/*" name="photo">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="price">price</label>
    <input class="form-control" type="number" name="price" value="<?php echo htmlspecialchars($price)?>">
    </div>
 
    <input type="hidden" name="guid" value="<?php echo htmlspecialchars($guid); ?>">
    
    <div class="form-group d-flex flex-column">
    <input class="btn btn-primary"  type="submit" >
    </div>
    </form>


</body>
</html>





