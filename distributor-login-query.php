<?php  
 session_start();
 if($_SESSION['CODE']==$_POST["captcha"]){
   
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "indian_rail_project";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["captcha"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  

                $query = "SELECT * FROM ibn_signup_distributor WHERE binary ibn_id = :username AND binary password = :password";  
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
                     $_SESSION["userdistributor"] = $_POST["username"];  
                     header("location:ibn-distributor/index.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Usernmae or Password!!</label>'; 
                     header("location:distributor-login.php?message=Wrong Usernmae or Password!!"); 
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 } 

 }

 else{
  header("location:distributor-login.php?message=Please Enter Correct Captch Code!!"); 
 } 
 ?>  


