<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "tcs-pviti-embed";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE binary username = :username AND binary password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:index.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Usernmae or Password!!</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  


<!DOCTYPE html>
<html lang="en">

<head>
<title>IBN DIGITAL SERVICES -MAHARAJGANJ-- DISTRIBUTOR LOGIN</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/login.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="logo/logo_colour.png" id="icon" alt="User Icon" />
      <h1>GTIITI - ADMIN LOGIN</h1>
       <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text"  class="fadeIn second" name="username" placeholder="username">
      <input type="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
          
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
  
      <a class="underlineHover" href="https://gtiiti.org/">Go to the Site</a>
    </div>

  </div>
</div>
</body>
</html>