<?php  
 session_start();
//  if($_SESSION['CODE']==$_POST["captcha"]){
 if(true){
   
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "indian_rail_project5";  
 $message = ""; 
//  $username = "ra34yshprjAvPTcs";  
//  $password = "Ag3@!ssRVbxm@98sJEclp";  
//  $database = "ind@rai#4cyyashzaARcHj@244";  
//  $message = ""; 
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

                $query = "SELECT * FROM je_info_rail WHERE binary empid = :username AND binary phone = :password";  
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
                     $_SESSION["userretailerje"] = $_POST["username"];  
                     header("location:je-rail/index.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Usernmae or Password!!</label>'; 
                     header("location:index-je.php?message=Wrong Usernmae or Password!!"); 
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
  header("location:index-je.php?message=Please Enter Correct Captch Code!!"); 
 } 
 ?>  


