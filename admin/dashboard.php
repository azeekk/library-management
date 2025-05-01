<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="vh-100 d-flex flex-column">      
   <a href="#sidebar" class="d-block mt-2 pl-2"  data-bs-toggle="offcanvas" role="button" aria-controls="sidebar"><i class="bi bi-list" style="font-size:3rem;"   ></i></a>
 

    <div class="h-100 d-flex align-items-center justify-content-center">
        <h1 class="heading1">Library Management</h1>
       
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