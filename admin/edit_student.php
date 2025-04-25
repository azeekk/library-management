<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_and_edit_student.css">
    <title>Document</title>
</head>
<body>
    
<h1>Edit Student </h1>
    <form class="form" action="create_and_edit_student.php" method="post">
    <label for="title">student name</label>
    <input class="name"  type="text" name="name"  >

    <label for="class">class</label>
    <input class="class" type="text" name="class" >

    <label for="contact_number">contact number</label>
    <input class="contact_number" type="number" name="contact_number">

    <label for="email">email</label>
    <input class="email" type="email" name="email">

    <label for="birth_date"> date of birth</label>
    <input class="birth_date" type="date" name="birth_date">
    
    <input class="button" type="submit">

    </form>

</body>
</html>