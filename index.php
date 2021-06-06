<?php 
//Database connection
include 'db_connection.php';
//$success_submit = $error_submit = '';
if(isset($_POST['click'])){
  $isbn        = $_POST['isbn'];
  $title       = $_POST['title'];
  $author      = $_POST['author'];
  $edition     = $_POST['edition'];
  $publication = $_POST['publication'];


  $query = "select * from book_info where isbn ='$isbn'";
  $run = mysqli_query($db, $query); 
  $row = mysqli_num_rows($run); 
  if ($row > 0) { 
    header("location:index.php?error=This $isbn is taken by another");
  } 
  elseif($isbn ==''){
    //$success_submit = "Thanks for submitted";
    header("location:index.php?error=ISBN is required");
    //exit();
  }elseif($title == ''){
    //$error_submit   = "Not submitted.Try again.";
    header("location:index.php?error=Title is required");
    //exit();
  }elseif($author ==''){
    //$error_submit   = "Not submitted.Try again.";
    header("location:index.php?error=Author name is required");
    //exit();
  }elseif($edition ==''){
    //$error_submit   = "Not submitted.Try again.";
    header("location:index.php?error=Edittion required");
    //exit();
  }elseif($publication ==''){
    //$error_submit   = "Not submitted.Try again.";
    header("location:index.php?error=Publication required");
    //exit();
  }else{
    $query  = "insert into book_info (isbn,title,author,edition,publication) 
    values ('$isbn','$title','$author','$edition','$publication')";
    $run    = mysqli_query($db, $query);
    if($run){
    header("location:index.php?success=Book information is inserted successfully ");
    }else{
    header("location:index.php?error=Not Submitted Data.Please try again");
    }
}
}

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

    <title>Library Management System</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h3 class="text-center bg-info rounded px-3">Library Management System</h3>
    <img src="image/isbn-Lms.png">

  <?php if(isset($_GET['error'])){?>
     <p class="error"><?php echo $_GET['error']; ?> </p>
 <?php } ?>
 <?php if(isset($_GET['success'])){?>
     <p class="success"><?php echo $_GET['success']; ?> </p>
 <?php } ?>
    <form class="form" method="POST" action="">
      <div class="form-group">
        <label class="float-left">Enter ISBN :</label>
        <input type="text" name="isbn" class="form-control" maxlength="25" placeholder="Enter ISBN">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Title :</label>
        <input type="text" name="title" class="form-control" maxlength="25" placeholder="Enter Title">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Author :</label>
        <input type="text" name="author" class="form-control" maxlength="25" placeholder="Enter Author">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Edition :</label>
        <input type="text" name="edition" class="form-control" maxlength="25" placeholder="Enter Edition">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Publication :</label>
        <input type="text" name="publication" class="form-control" maxlength="25" placeholder="Enter Publication">
      </div>
      <input type="submit" name="click" class="btn btn-info" value="Submit">
      <input type="reset"  class="btn btn-warning" value="Reset">
      <hr>
      <a href="SearchBooks.php"> To search for the Book information click here </a>
    </form>
</div>
</body>
</html>

