<div class="wrapper mt-2" style="color:#ffffff;background-color:black; border-bottom: 3px solid #FFFFFF;" class=" animate-box fadeInUp animated">
  <footer id="footer" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <!-- <img src="images/foot.jpg" class="img-fluid" alt=""> -->
           
            <p align="justify">
              We provide our channel partners the latest,
              fast, desirable and profitable service as per 
              their requirement. We are confident that 
              one day we will serve a network of largest 
              channel partners, for that we working...

           </p>

      
    </div>
    <!--  -->
     <div class="one_quarter" style="">
     <h6 class="title"  style="color:#FFFFFF;margin-bottom: 10px;margin-left:35px;">OUR SERVICES</h6>
        <ul class="nospace" style="font-size: 15px;margin-left:35px;">
        <li><a class="text-light" href="#">Rail Tikect</a></li>
        

      </ul>
    </div>
    <!--  -->
    <div class="one_quarter">
      <h6 class="title"  style="color:#FFFFFF;margin-bottom: 10px;margin-left:30px;">MENU</h6>
        <ul class="nospace" style="font-size: 15px;margin-left:30px;">
        <li><a class="text-light" href="index.php">Home</a></li>
        <!-- <li><a class="text-light" href="about-us.php">About Us</a></li>
        <li><a class="text-light" href="distributor.php">Channel</a></li>
        <li><a class="text-light" href="work-with-us.php">Work With Us</a></li>
        <li><a class="text-light" href="contact-us.php">Contact</a></li>
 -->
      </ul>


    </div>
    
    <div class="one_quarter">
      <h6 class="title"  style="color:#FFFFFF;margin-bottom: 10px;">CONNECT WITH US</h6>
      <ul class="nospace">
        <li><i class="fa fa-map-marker"></i>
          <span>
          Gorakhpur, Gorakhpur, U.P - 273001
          </span>
          <br><br>
        </li>
        <li><i class="fa fa-phone"></i> +91 1212121212, +91 1212121212<br><br>
        </li>
        
        <li><i class="fa fa-envelope-o"></i> help@gmail.com<br>
        <i class="fa fa-envelope-o"></i> help@gmail.com</li>
      </ul>

    <ul class="faico clear " style="margin-top: 10px;"> 
         <li><a href="https://www.facebook.com/ibndigital/community/" target="_blank" style="color:#3b5998;"><i class="fa fa-facebook"></i></a></li>
       
        <li><a href="https://twitter.com/IbnDigital?s=09" target="_blank" style="color:#06b0d6;"><i class="fa fa-twitter" ></i></a></li>
        <li><a href="https://youtube.com/channel/UCDPdkeNuOJd3hABxhl89mSQ" target="_blank"style="color:#c4302b;"><i class="fa fa-youtube"></i></a></li>
     </ul>
       
<p  style="margin-top: 10px;"> Visitor Counter
  <?php 

   include('include/db_config.php');
   $que="select counter from visitor";
  $getcount=mysqli_query($con,$que);
 $record=mysqli_fetch_array($getcount);
//while($record=mysqli_fetch_array($result))


    $count= $record['counter'];
     $image_dir = "digits/4";  //image directory
$style = ""; //enter text for text.Anything else for graphics 
$count++;
//text counter
if ($style == "text") 
{
echo $count;
}
//graphical counter
else 
{
$digit = strval($count);
for ($i = 0; $i < strlen($count); $i++) 
{
echo "<img src=$image_dir/$digit[$i].gif>";

}
}

$update_sql=mysqli_query($con,"update visitor set counter='$count'");

if ($update_sql>=1) 
    {
      
          
       }

   ?>

  </p>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>

<!-- ################################################################################################ -->
<div class="wrapper" style="background-color:#1a1a1a; color:#FFFFFF;">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; <?php echo date("Y");  ?> - All Rights Reserved - <a href="https://ibndigital.com"  style="color:#FFFFFF;">BSB DIVISION SNT</a> </p>
    
    <p class="fl_right">Designed by <a target="_blank" href="https://www.techsrijan.com/"  style="color:#FFFFFF;"style="color:#FFFFFF;" title="Techsrijan Consultancy Services Pvt Ltd">Techsrijan Consultacy Services Pvt Ltd.</a></p>
    <!-- ################################################################################################ -->
  </div>
  
</div>
<!-- ################################################################################################ -->

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS-->



<script src="js/validate.js"> </script>

<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
<script src="js/bootstrap.min.js"> </script>

</body>
</html>