<?php

include("../db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $published_year = $_POST['published_year'];
    $price = $_POST['price'];

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){

        $photo_name = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . basename($photo_name);

        if(move_uploaded_file($photo_temp, $photo_path)){
            echo "File uploaded successfully.<br>";

            $sql = "insert into books(title,author,publisher_name,published_year,cover_page_photo,book_price)VALUES('$title','$author','$publisher_name','$published_year','$photo_name','$price')";
        
        echo '<script>console.log(' . json_encode($sql) . ');</script>';
        var_dump($sql);

        $result = mysqli_query($connect,$sql);
    
        if (!$result){
            echo "error : " . mysqli_error($connect);    
                                       
        }else{
            
           if (mysqli_affected_rows($connect) > 0) {
            header("Location:list_books.php");
            echo "Book successfully registered!";
           
        } else {    
            echo " Query ran but no rows were added.";
        }
           
        }

        }else{
            echo "no photo were added";
        }

    }else{
        echo "No file uploaded or there was an upload error.";
    }

}
         


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_and_edit_book.css">
    <title>Document</title>
</head>
<body>
    <h1>Register Book</h1>

    <form class="form" action="create_and_edit_book.php" method="post" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input class="title"  type="text" name="title"  >

    <label for="author">author</label>
    <input class="author" type="text" name="author" >

    <label for="publisher_name">publisher name</label>
    <input class="publisher_name" type="text" name="publisher_name">

    <label for="published_year">published year</label>
    <input class="published_year" type="number" name="published_year">

    <label for="photo">Cover Photo</label>
    <input class="cover_page_photo" type="file" accept="image/*" name="photo">


    <label for="price">price</label>
    <input class="price" type="number" name="price">
    
    <input class="button" type="submit">
    </form>


</body>
</html>