<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="create_and_edit_book.css">
    <title>Document</title>
</head>
<body>

<form class="form" action="edit_book.php" method="post">
<h1>Edit Book</h1>
<label for="title">title</label>
<input class="title"  type="text" name="title"  >

    <label for="author">author</label>
    <input class="author" type="text" name="author" >

    <label for="publisher_name">publisher name</label>
    <input class="publisher_name" type="text" name="publisher_name">

    <label for="published_year">published year</label>
    <input class="published_year" type="number" name="published_year">

    <label for="photo">Cover Photo</label>
    <input class="form-control-file" type="file" accept="image/*" name="photo">


    <label for="price">price</label>
    <input class="price" type="number" name="price">
    
    <input class="button" type="submit">
</form>
    
</body>
</html>