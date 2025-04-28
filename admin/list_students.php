<?php 

include("../db.php");

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $students = [];

    $sql = "SELECT * FROM students";

    $result = mysqli_query($connect, $sql);

    if($result->num_rows > 0 ) {

        foreach($result as $row) {
            $students[] = $row;
            echo '<script>console.log(' . json_encode($row) . ');</script>';
  }
}else{
    echo"no student found";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>class</th>
            <th>number</th>
            <th>email</th>
            <th>date-of-birth</th>
        </tr>

            <?php if(!empty($students))  :?>
                <?php foreach($students as $student) : ?>
                    <tr>
                    <td><?= $student['student_id'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['class'] ?></td>
                    <td><?= $student['contact_num'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['date_of_birth'] ?></td>
                    <td><a class="btn btn-primary" href="edit_student.php?guid=<?= $student['guid'] ?>">Edit</a></td>
                </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                <td colspan="6" style="text-align:center;">No books found.</td>
            </tr>
                
            <?php endif;  ?>

        </tr>
    </table>
</body>
</html>