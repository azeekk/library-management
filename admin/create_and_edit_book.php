<?php

include("../db.php");

$error_message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $guid = uniqid('book_', true);
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $published_year = $_POST['published_year'];
    $price = $_POST['price'];
    

if(empty(($title))){
        $error_message = 'title required';
    }elseif(empty(($author))){
        $error_message = 'author required';
    }elseif(empty(($publisher_name))){
        $error_message = 'publisher name required';
    }elseif(empty(($published_year))){
        $error_message = 'pulished year required';
    }elseif(empty(($price))){
        $error_message = 'price required';
    }else{

       

        if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){

            $photo_name = $_FILES['photo']['name'];
            $photo_temp = $_FILES['photo']['tmp_name'];
            $photo_path = "uploads/" . basename($photo_name);
            $error_message = "";
        

          
    
            if(move_uploaded_file($photo_temp, $photo_path)){
                echo "File uploaded successfully.<br>";

                

    
                $sql = "insert into books(id,guid,title,author,publisher_name,published_year,image,price)VALUES('$id','$guid','$title','$author','$publisher_name','$published_year','$photo_path','$price')";
            
            echo '<script>console.log(' . json_encode($sql) . ');</script>';
            var_dump($sql);
    
            $result = mysqli_query($connect,$sql);
        
            if (!$result){
                echo "error : " . mysqli_error($connect);    
                $error_message = "photo not uploaded";
                                           
            }else{
                
               if (mysqli_affected_rows(mysql: $connect) > 0) {
                header("Location:http://localhost:5173/library-management/react-ui/");
                echo '<script>console.log(' . json_encode($sql) . ');</script>';
                echo "Book successfully registered!";
               
            } else {    
                echo " Query ran but no rows were added.";
            }
               
            }
    
            }else{
                echo "no photo were added";
            }
    
        }else{
            
            $error_message = "No file uploaded or there was an upload error.";

        }


    }

   

}
          


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register Book</title>
</head>
<body  class="h-100 d-flex justify-content-center align-items-center flex-column" >
<div class="d-flex vh-100 vw-100 flex-column p-2 ">
<div class="d-flex h-20 justify-content-start">
<a href="#sidebar" class="d-block mt-2 pl-2"  data-bs-toggle="offcanvas" role="button" aria-controls="sidebar"><i class="bi bi-list" style="font-size:3rem;"   ></i></a>
</div>



<div class="h-80 d-flex align-items-center justify-content-center flex-column">
<h1>Register Book</h1>

<?php if (!empty($error_message)): ?>
<div class="alert alert-danger w-50" role="alert">
    <?php echo $error_message; ?>
</div>
<?php endif; ?>

    <form class="h-70 w-50 card p-3 d-flex justify-content-center align-items-center flex-column" action="create_and_edit_book.php" method="post" enctype="multipart/form-data">
        <div class="form-group d-flex flex-column">

    <input type="hidden" name="id" value="id">   

    <label for="title">Title</label>
    <input class="form-control"  type="text" name="title"  >
    </div>

    <div class="form-group d-flex flex-column">
    <label for="author">author</label>
    <input class="form-control" type="text" name="author" >
    </div>

    <div class="form-group d-flex flex-column">
    <label for="publisher_name">publisher name</label>
    <input class="form-control" type="text" name="publisher_name">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="published_year">published year</label>
    <input class="form-control" type="number" name="published_year">
    </div>

    <div class=" form-group d-flex flex-column ">
    <label for="photo">Cover Photo</label>
    <input class="form-control" type="file" accept="image/*" name="photo">
    </div>

    <div class="form-group d-flex flex-column">
    <label for="price">price</label>
    <input class="form-control" type="number" name="price">
    </div>
    
    <div class="form-group d-flex flex-column">
    <input class="btn btn-primary"  type="submit">
    </div>
    </form>
    </div>
    </div>

    <!-- offcanvas -->
        <?php include("./components/offcanvas.php"); ?>
    <!-- offcanvasend -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>