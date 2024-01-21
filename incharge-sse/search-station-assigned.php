<?php 
include('include/db_config.php');
    $branch=$_POST['branch'];
  
 
//print_r($_POST);
if(!empty($_POST['branch']))
{
	

	echo ' <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
              <thead>
           
                <tr>
               <th>S.No.</th>
             
             <th>Section Name</th>
             <th>Station Name</th>
       
             <th>Form</th>  
          
           <th>Delete Assigned Station</th>
                </tr>
              </thead>
           
              <tbody > ';
           
                
 

  $n=1;
   $recordset = mysqli_query($con,"select * from assign_info_rail where empid='$branch'");
                  while($record = mysqli_fetch_object($recordset))
                  {
                  echo"
                        
                  <tr>
                                                 <td>",$n,"</td>
                              
                                <td>",$record->section_name,"</td>
                                <td>",$record->station_name,"</td>
                                     
                 ";?>
                           <td>
                  <?php echo '<button type="button" onclick=ViewCommonForm("'.$record->section_name.'","'.$record->section_id.'","'.$record->station_name.'","'.$record->station_id.'","'.$record->empid.'") class="btn btn-sm btn-success">Form</button>'; ?>
                </td>         
<td><a href='delete_assign_station.php?id=<?php echo $record->id; ?>'><button class='btn btn-outline-danger'>Delete</button></a></td>
                               
                 
                          
                  
  
  


<?php
 
$n++;}// if branch

}
else{
    
	echo ' <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
              <thead>
          
                <tr>
                  <th>S.No.</th>
             <th>Emp ID</th>
           <th>JE Name</th>
             <th>Section Name</th>
             <th>Station Name</th>
           <th>Designtaion</th>             
           <th>Phone</th> 
                           
           <th>Form</th> 
           <th>Delete Assigned Station</th>
                </tr>
              </thead>
           
              <tbody > ';
           
                
 
  $n=1;
  
   $recordset = mysqli_query($con,"select * from assign_info_rail");
                  while($record = mysqli_fetch_object($recordset))
                  {
                  echo"
                        
                  <tr>
                
                                                 <td>",$n,"</td>
                                <td>",$record->empid,"</td>
                                <td>",$record->empname,"</td>
                                <td>",$record->section_name,"</td>
                                <td>",$record->station_name,"</td>
                                <td>",$record->empdesg,"</td>
                                <td>",$record->phone,"</td>               
                 ";?>
                      
                      <td>
                  <?php echo '<button type="button" onclick=ViewCommonForm("'.$record->section_name.'","'.$record->section_id.'","'.$record->station_name.'","'.$record->station_id.'","'.$record->empid.'") class="btn btn-sm btn-success">Form</button>'; ?>
                </td> 
<td><a href='delete_assign_station.php?id=<?php echo $record->id; ?>'><button class='btn btn-outline-danger'>Delete</button></a></td>

                               
                      
                  
  
  


<?php
$n++; 
}// 
	
	}//else branch



?>
				