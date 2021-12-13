<html>
    <body>
        <form action = "index.php" method = "post">
        Name: <input type = "text" name="name" required><br>
        E-mail: <input type = "text" name="email" required><br>
        <input type = "submit" value = "Submit">
    </body>
</html>
<?php
    //Connecting to the Database
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Users"; 
    $make_connection = mysqli_connect($servername,$username,$password,$database);
    if(!$make_connection)
    {
        die("Couldn't make connection: ".mysqli_connect_error());
    }
    else
    {
        //echo "Connection made<br>";
    }
    
    if (empty($_POST["name"])) 
    {
      $nameErr = "Name is required";
    } 

    else 
    {
      $name = validate($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
      {
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    }
    else 
    {
        $email_id = validate($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) 
        {
          $emailErr = "Invalid email format";
        }
    }
    
    //echo "$name $email_id";
    //$email_id = test_input($_POST["email"]);
    //$sqlquery = "INSERT INTO `users` (`id`, `name`, `email_id`, `status`) VALUES (NULL, '$name', '$email_id', '1');";
    //$sql = "SELECT * FROM `users` WHERE (`email_id` = 'abc@harvard.edu');";
    //$result = mysqli_query($make_connection,$sqlquery);
    /* $res2 = mysqli_query($make_connection,$sql);
    $row = mysqli_fetch_assoc($res2); */
    //$result2 = mysqli_query($make_connection,$sql);
    /* if($result)
    {
        echo "record created successfully!<br>";
        echo var_dump($result);
    }
    else
    {
        echo "Record failed for insertion";
    } */
    echo $email_id;
    $sql = "SELECT * FROM `users` WHERE (`email_id` = '$email_id');";
    $res = mysqli_query($make_connection,$sql);
    $row = mysqli_fetch_assoc($res);
    //echo "hello";
    //echo $row['email_id']." " ;
    
    if($email_id == $row['email_id'] && $email_id !="" )
    {
        echo "Already Exists. ";
    }
    

    //echo $_POST["name"]."<br>";
    //echo $_POST["email"];
    /* require_once('first.php');
    print_r($xml); */
?>