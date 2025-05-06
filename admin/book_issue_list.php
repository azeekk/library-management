<?php
include("../db.php");


if($_SERVER['REQUEST_METHOD'] == "GET") {

$books = [];

$sql = "SELECT *  FROM  books";

$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
        echo '<script>console.log(' . json_encode($row) . ');</script>';
    }
} else {
    echo "No books found.";
}

$connect->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<div class="vh-100 vw-100 d-flex flex-column">

<div class="d-flex h-20 justify-content-start">
<a href="#sidebar" class="d-block mt-2 pl-2"  data-bs-toggle="offcanvas" role="button" aria-controls="sidebar"><i class="bi bi-list" style="font-size:3rem;"   ></i></a>
</div>

<div class=" d-flex h-80 w-100 justify-content-center" >

<table class="table table-bordered w-75 ">

<tr>
    <th scope="col">index</th>
    <th scope="col">title</th>
    <th scope="col">author</th>
    <th scope="col">publisher</th>
    <th scope="col">published year</th>
    <th scope="col">price</th>
</tr>



<?php if(!empty($books)) :?>
    <?php foreach($books as $book) :?>
        <tr scope="row">
                    <td><?= $book['id'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['publisher_name'] ?></td>
                    <td><?= $book['published_year'] ?></td>
                    <td><?= $book['price'] ?></td>
                    <td><a class="btn btn-primary" href="edit_book.php?book_uuid=<?= $book['guid'] ?>">Edit</a></td>
                   
                </tr>
        <?php endforeach;?>
                 
                <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center;">No books found.</td>
            </tr>
        <?php endif;?>
 
    </table>
    </div>

    <!-- offcanvas -->

<?php include("./components/offcanvas.php") ?>

     <!-- offcanvas end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>