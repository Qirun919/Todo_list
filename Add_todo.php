<?php
   
   // put the backend code for processing data

   // Connect to Database
  // 1. database info
  $host = "127.0.0.1";
  //   $host = "mysql";
    $database_name = "todolist"; // connecting to which database
    $database_user = "root";
    $database_password = ""; // empty string
  
    // 2. connect PHP with the MySQL database
    // PDO (PHP Database Object)
    $database = new PDO(
      "mysql:host=$host;dbname=$database_name", // host and db name
      $database_user, // username
      $database_password // password
    );
     
      // data from the input in index.php
    $todo_lable = $_POST["todo_lable"];

    // check if the todo_name is empty or not
    if ( empty($todo_lable) ) {
        echo "Please fill up the todo lable";
    } else {
        // 3. add the todo name to todos table
        // 3.1 SQL command (recipe)
        $sql = "INSERT INTO todos (`lable`) VALUES (:lable)";
        // 3.2 prepare your SQL query (prepare your material)
        $query = $database->prepare( $sql );
        // 3.3 execute the SQL query (cook it)
        $query->execute([
            "lable" => $todo_lable
        ]);

        // 4. redirect the user back to the index.php
        header("Location: index.php");
        exit;
    }

    
?>
