<?php 
//Database connection
include 'db_connection.php';
//$success_submit = $error_submit = '';
?>
<?php 

if(isset($_POST['update'])){
  $member_edit = $_GET['edit_books'];

  $isbn        = $_POST['isbn'];
  $title       = $_POST['title'];
  $author      = $_POST['author'];
  $edition     = $_POST['edition'];
  $publication = $_POST['publication'];


  $update = "update book_info set isbn ='$isbn',title='$title',author='$author',
  edition ='$edition',publication='$publication' where isbn='$member_edit'"; //if already exists email
  
  $run = mysqli_query($db, $update); // execute query
    
  // if($run){
  //   header("location:member_edit.php?success=Updated successfully");
  //   }else{
  //   header("location:member_edit?error=Not Updated Successfully");
  //   }
  if($run){
    echo "<script>window.open('member_edit.php?success=Successfully Updated Data','_self')</script>";
   
}else{
    echo "<script>window.open('member_edit?error=Unable to update data.Please try again','_self')</script>";
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

    <title>Udate</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">

<!--Alert color start-->
<?php if(isset($_GET['error'])){?>
     <p class="error"><?php echo $_GET['error']; ?> </p>
 <?php } ?>
 <?php if(isset($_GET['success'])){?>
     <p class="success"><?php echo $_GET['success']; ?> </p>
 <?php } ?>

<!--Alert color end-->


        <?php 
        if(isset($_GET['edit_books'])){
              $member_edit = $_GET['edit_books'];
              $update  = "select * from book_info where isbn = '$member_edit'";
              $run    = mysqli_query($db, $update);
              while($row = mysqli_fetch_assoc($run))
              {
        ?>
    <form class="form" method="POST" action="">
   
      <div class="form-group">
        <label class="float-left">Enter ISBN :</label>
        <input type="text" name="isbn" class="form-control" maxlength="25" placeholder="Enter ISBN" 
        value="<?php echo $row['isbn']; ?>">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Title :</label>
        <input type="text" name="title" class="form-control" maxlength="25" placeholder="Enter Title" 
        value="<?php echo $row['title']; ?>">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Author :</label>
        <input type="text" name="author" class="form-control" maxlength="25" placeholder="Enter Author" 
        value="<?php echo $row['author']; ?>">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Edition :</label>
        <input type="text" name="edition" class="form-control" maxlength="25" placeholder="Enter Edition" 
        value="<?php echo $row['edition']; ?>">
      </div>

      <div class="form-group">
        <label class="float-left">Enter Publication :</label>
        <input type="text" name="publication" class="form-control" maxlength="25" placeholder="Enter Publication" 
        value="<?php echo $row['publication']; ?>" >
      </div>
      <input type="submit" name="update" class="btn btn-info" value="Update">
    </form>
    <?php }}?>
   
</div>
</body>
</html>


