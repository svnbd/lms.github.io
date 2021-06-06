<?php 
//Database connection
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Font Awesome icon-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>LMS|Search</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <h2 class="text-center">LMS - Search Record</h2>
    
    <form action="DisplayBooks.php" method="GET"> 
        <br>
        <p class="text-center"> Enter ISBN of Books -For Search (897 to 910) </p>
   
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search Book Details" required>
        <br>
    </div>
    <input type="submit" class="btn btn-info" value="Search">
    <input type="reset"  class="btn btn-warning" value="Reset">
       
    </form>
    <br>
    </div>
</body>
</html>