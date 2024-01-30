<?php require('header.php');?>
<script language="javascript" >
  function submitForm(){
  
  form1.action = "excel.php";
      form1.submit();
  
  }


$(document).ready(function(){
        $("#fetchval").on('change',function()
                         {
            var branch = $(this).val();
      var sem = $(fetchval2).val();
    var per = $(fetchval3).val();
    
            $.ajax(
            {
                url:'search-student-tpo-branch-db.php',
                type:'POST',
                data:{
        branch:branch, 
        sem:sem, 
        per:per
        },

                beforeSend:function()
                {
                    $("#dataTable ").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#dataTable ").html(data);
                },
            });
        });
    });

<!--------------end------------->
$(document).ready(function(){
        $("#fetchval2").on('change',function()
                         {
           /* var keyword2 = $(this).val();
          
            $.ajax(
            {
                url:'search-student-tpo-sem-db.php',
                type:'POST',
                data:'request2='+keyword2,*/
           var branch = $(fetchval).val();
      var sem = $(this).val();
    var per = $(fetchval3).val();
    
            $.ajax(
            {
                url:'search-student-tpo-branch-db.php',
                type:'POST',
                data:{
        branch:branch, 
        sem:sem, 
        per:per
        },
               
                beforeSend:function()
                {
                    $("#dataTable").html('Working...');
                    
                },
                success:function(data2)
                {
                    $("#dataTable").html(data2);
                },
            });
        });
    });

<!--------------end------------->
  $(document).ready(function(){
        $("#fetchval3").on('change',function()
                         {
          /*  var keyword3 = $(this).val();
            
            $.ajax(
            {
                url:'search-student-tpo-db.php',
                type:'POST',
                data:'request3='+keyword3,*/
        var branch = $(fetchval).val();
      var sem =  $(fetchval2).val();
    var per = $(this).val();
    
            $.ajax(
            {
                url:'search-student-tpo-branch-db.php',
                type:'POST',
                data:{
        branch:branch, 
        sem:sem, 
        per:per
        },
               
                beforeSend:function()
                {
                    $("#dataTable").html('Working...');
                    
                },
                success:function(data3)
                {
                    $("#dataTable").html(data3);
                },
            });
        });
    });
  <!---end ------------->
</script>

    <div class="content-wrapper">
    <div class="container-fluid" >
      <!-- Breadcrumbs-->
     <!--   <div class="alert alert-success">
 <strong>  Admin Panel</strong> &mdash; <a href="view-enroll-student.php">View Enroll Students</a>
</div> -->

      <!-- Example DataTables Card-->
      <div class="card mb-3" >
        <div class="card-heading" style="background-color:#af0202;color:#FFFFFF;">
       <center> <i class="fa fa-graduation-cap" style="font-size:26px; color:#ffffff;"></i><font style="font-size:24px;">  <strong> Refresher DUE DETAILS</strong></font></center>
           </div>
        <div class="card-body">
        <div class="row">
       
        </div><!--row--->
          <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
              <thead>
             <span style="float:right; color:#FF0000;">&nbsp;<button type="button"
 class="btn btn-sm btn-danger" name="bt" id="btn" onClick="submitForm();">Download in Excel Format</button></form></span>
                <tr>
                 <th>Emp ID</th>
                <th>Emp Name</th>
                <th>Dob</th>
                  <th>Age</th>
                  <th>Designation</th>
                  <th>Phone</th>
                  <th>Last Refresher Date</th>
                  <th>PME Due</th>
                  
                 
                </tr>
              </thead>
           
              <tbody > 
           
               <?php  
 
   include('include/db_config.php');


//   $sql="update emp_info_rail set age = DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob_emp)), '%Y') + 0";
//  mysqli_query($con,$sql);

  $sql2="update emp_info_rail set rmedue = DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), rme_date)), '%Y') + 0";
 mysqli_query($con,$sql2);



   $recordset = mysqli_query($con,"select * from emp_info_rail");
                  while($record = mysqli_fetch_object($recordset))
                  {

                        if(($record->rmedue>3) )                       
   
                        {


                  echo"
                
                  <tr>
                                <td>",$record->empid,"</td>
                                <td>",$record->empname,"</td>
                                <td>",$record->dob_emp,"</td>

                                <td>",$record->rme_date,"</td>
                                <td>",$record->empdesg,"</td>
                                <td>",$record->phone,"</td>
                                <td>",$record->rme_date,"</td>
                                <td>",$record->rmedue,"</td>
                                                 

                 ";?>
                                   

     
          
         </tr>
        <?php }} ?>
               
              </tbody>
            </table> 
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
     
  
  
           <!----------------------------------->
    
    
    
    

 <!----------------------------------->

<script>
  

function showdetails2(button)    {
  var id = button.id;
$.ajax({
  url:"verify-student-db.php",
  method:"GET",
  data:{"id":id},
  success: function(response){
 //console.log(response);
   
window.location.reload();

 
  }
  });

 }



  function showdetails3(button)    {
  var id = button.id;
$.ajax({
  url:"nonverify-student-db.php",
  method:"GET",
  data:{"id":id},
  success: function(response){
 //console.log(response);
   
window.location.reload();

 
  }
  });

 }

</script>

<?php 


require('footer.php');?>