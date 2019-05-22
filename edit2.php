<?php

require 'confige/database.php';
$connection = $dbh;
if (isset($_POST['submit'])) {
  try {
    $id = $_GET['id'];
    $text = $_POST['text'];
    $title = $_POST['title'];
    $sql = "UPDATE tweet SET title='$title', `text` = '$text' WHERE id='$id'";

    // Prepare statement
    $stmt = $connection->prepare($sql);

    // execute the query
    $stmt->execute();
    echo "Done";
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
      die("ASdadasd");
  }
}
if (isset($_GET['id'])) {
  try {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tweet WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $error->getMessage();
      die();
  }
} else {
    echo "Something went wrong!";
    die();
}
?>

<h2>Edit a user</h2>

<form  action="" method="post">
    <label> Title : </label>
    <input type="text" name="title" value="<?= $user['title']; ?>" />
    <label> Text : </label>
    <input type="text" name="text" value="<?= $user['text']; ?>" />
    <input type="submit" name="submit" value="Submit">
</form>
<a href="table2.php">Back to home</a>