<?php 
session_start();  

if( isset($_POST['username']) && isset($_POST['password']))
{
  $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "indian_rail_project"; 
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      // if(isset($_POST["login"]))  
      // {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                // $message = '<label>All fields are required</label>'; 
                $result_array = array('status' => 3,'message' => 'All fields are required');
                    header('Content-Type: application/json');
                    echo json_encode($result_array);
                    exit; 
           }  
           else  
           {  
  $query = "SELECT * FROM ibn_signup_retailer WHERE ibn_id = :usname AND password = :passrd";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'usname'     =>     $_POST["username"],  
                          'passrd'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
        include('include/db_config.php');
        $id=$_POST["username"];
          $que = "SELECT * FROM ibn_signup_retailer  WHERE binary ibn_id = '$id'";  

            $result = mysqli_query($con,$que);
          $row = mysqli_fetch_assoc($result);
          
          
           
             $_SESSION["userretailer "] = $_POST["username"];  
                       //header("location:ibn-retailer/index.php");

                       // echo "success";
                    $result_array = array('status' => 1, 'check' => $_SESSION["userretailer "]);
                    header('Content-Type: application/json');
                    echo json_encode($result_array);
                   // exit;

                }  
                else  
                {  
                   echo $message = '<label>Wrong Username or Password!!</label>'; 
                   $result_array = array('status' => 0,'message' => 'Wrong Username or Password!!');
                    header('Content-Type: application/json');
                    echo json_encode($result_array);
                    exit; 
                }  
           }  
      }  
 //}  
 catch(PDOException $error)  
 {  
     echo $message = $error->getMessage();  
 }  


}// isset 
else {
    echo "The server failed to send the message. Please try again later.";
  }
 ?>  