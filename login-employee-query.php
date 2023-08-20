<?php  
 session_start();
//  if($_SESSION['CODE']==$_POST["captcha"]){
 if(true){
   
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

                $query = "SELECT * FROM emp_info_rail WHERE binary empid = :username AND binary phone = :password";  
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
                     $_SESSION["userretailer"] = $_POST["username"];  
                     header("location:emp-rail/index.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Usernmae or Password!!</label>'; 
                     header("location:index-emp.php?message=Wrong Usernmae or Password!!"); 
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
  header("location:index-emp.php?message=Please Enter Correct Captch Code!!"); 
 } 
 ?>  


