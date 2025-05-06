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
<body class="p-5">
    <h1>Issue Book</h1>
    <div class="form-group">
    <label for="book">Select book</label>

        <select name="books" id="books">

           <option value=""></option>
        </select>
    </div>
    <div class="form-gruop">
    <label for="student">Select Student</label>
        <select name="students" id="students">
            <option value=""></option>
        </select>
    </div>

    <button type="submit">issue book</button>

</body>
</html>