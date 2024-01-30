<?php
if (isset($_POST['date1'])) {
  $pp = $_POST['date1'];
  include('include/db_config.php');
  echo '<div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
              <thead>
              
                <tr>
                 <th>Emp ID</th>
                <th>Emp Name</th>
                <th>Dob</th>
                  <th>Age</th>
                  <th>Designation</th>
                  <th>Phone</th>
                  <th>Last PME Date</th>
                  <th>PME Due</th>
                  
                 
              </thead>
                </tr>
           
              <tbody> ';

  //$pp="2026-12-05";
  $sql = "update emp_info_rail set age = DATE_FORMAT(FROM_DAYS(DATEDIFF('$pp', dob_emp)), '%Y') + 0";
  mysqli_query($con, $sql);

  $sql2 = "update emp_info_rail set pmedue = DATE_FORMAT(FROM_DAYS(DATEDIFF('$pp', pme_date)), '%Y') + 0";
  mysqli_query($con, $sql2);



  $recordset = mysqli_query($con, "select * from emp_info_rail");
  while ($record = mysqli_fetch_object($recordset)) {

    if (
      ($record->age >= 40 and $record->age <= 50 and $record->pmedue > 3)
      or ($record->age >= 50 and $record->age <= 55 and $record->pmedue > 2)
      or ($record->age >= 55 and $record->age <= 60 and $record->pmedue >= 0)
    ) {


      echo "
                
                  <tr>
                                <td>", $record->empid, "</td>
                                <td>", $record->empname, "</td>
                                <td>", $record->dob_emp, "</td>

                                <td>", $record->age, "</td>
                                <td>", $record->empdesg, "</td>
                                <td>", $record->phone, "</td>
                                <td>", $record->pme_date, "</td>
                                <td>", $record->pmedue, "</td>
                                                 
                                </tr>
                 ";
    }
  }

  echo "  </tbody>
            </table>
            </div>";

} else {
  echo "Server Does Not Work";
} ?>