<?php require('header.php');?>
<script language="javascript" >
  function submitForm(){
  
  form1.action = "excel.php";
      form1.submit();
  
  }



$(document).ready(function(){
        $("#date1").on('change',function()
                         {
            var date1 = $(this).val();
      
            $.ajax(
            {
                url:'pme-due-future-query.php',
                type:'POST',
                data:{
        
        date1:date1,
        },

                beforeSend:function()
                {
                    $("#dataTable123").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#dataTable123").html(data);

                      $("#dataTable").dataTable();
        
                },
            });
        });
    });

//<!--------------end------------->

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
       <center> <i class="fa fa-graduation-cap" style="font-size:26px; color:#ffffff;"></i><font style="font-size:24px;">  <strong> PME DUE DETAILS</strong></font></center>
           </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-8 m-auto">
        <form>
        <div class="form-row" style="margin: 30px;">
          <div class="col-md-4 m-auto">
            <label><b>Select Date</b></label>
          </div>

          <div class="col-md-8 m-auto">
            <input type="date" name="date1" id="date1" class="form-control">
          </div>
      </div>
        </div>
      </form>

        </div><!--row--->
          <div class="table-responsive" id="dataTable123">
    
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
     
  
  
           <!----------------------------------->
    
    
    
    



<?php 


require('footer.php');?>