<?php
  $host = "127.0.0.1";
  $database_name = "todolist";
  $database_user = "root";
  $database_password = "";

  $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password
  );

  $sql = "SELECT * FROM todos";
  $query = $database->prepare( $sql );
  $query->execute();
  $todos = $query->fetchAll();
  $id = $_POST["id"];
  $completed = $_POST["complement"];
  if  ($completed == 0 )  {
     $sql = "UPDATE todos SET complement = 1 WHERE id = :id";
} else{
    $sql = "UPDATE todos SET complement = 0 WHERE id = :id";
}
$query = $database->prepare( $sql );
$query->execute(["id" => $id]);

header("Location: exercise.php");
  exit;
