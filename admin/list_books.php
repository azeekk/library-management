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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<table class="table table-bordered">

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
                    <td><?= $book['book_id'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['publisher_name'] ?></td>
                    <td><?= $book['published_year'] ?></td>
                    <td><?= $book['book_price'] ?></td>
                    <td><a class="btn btn-primary" href="edit_book.php?guid=<?= $book['guid'] ?>">Edit</a></td>
                   
                </tr>
        <?php endforeach;?>
                 
                <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center;">No books found.</td>
            </tr>
        <?php endif;?>
 
    </table>
    
</body>
</html>