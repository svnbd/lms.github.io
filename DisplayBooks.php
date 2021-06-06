
<!DOCTYPE HTML>
<html>

<title>Library Management System</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="css/displayBooks.css">

<body>
<div class="displayBooks">
  <h3 class="text-center bg-info rounded px-3">Record of members</h3>
<br>

<?php
include("db_connection.php");

    $search = $_GET["search"];

    $query = "select isbn,title,author,edition,publication from book_info where isbn like '%$search%'"; //search with a book name in the table book_info
    
    $result = mysqli_query($db,$query);
    $rb     = mysqli_num_rows($result);
    if($rb > 0)

    {
?>

    <table class="table table-bordered">

    <tr>
    <th>ID</th>
    <th> ISBN </th>
    <th> Title </th>
    <th> Author </th>
    <th> Edition </th>
    <th> Publication </th>
    <th> Action </th>
    </tr>

    <?php 
    $i=1;
    while($row = mysqli_fetch_assoc($result))
    
    {
    ?>
    <tr>
    <td><?php echo $i++; ?> </td>
    <td><?php echo $row["isbn"];?> </td>
    <td><?php echo $row["title"];?> </td>
    <td><?php echo $row["author"];?> </td>
    <td><?php echo $row["edition"];?> </td>
    <td><?php echo $row["publication"];?> </td>
    <td>
      <a href="member_edit.php?edit_books=<?php echo $row['isbn']; ?>">Edit</a> 
    </td>
    </tr>
    <?php
    }
    }
    else
    echo "<center>No books found in the library by the name $search </center>" ;
    ?>
</table>
<a href="http://localhost/LMS/SearchBooks.php">Back</a>
</div>
</body>
</html>
