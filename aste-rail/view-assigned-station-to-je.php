<?php require('header.php'); ?>
<script language="javascript">
  function submitForm() {

    form1.action = "#";
    form1.submit();

  }


  $(document).ready(function () {
    $("#fetchval").on('change', function () {
      var empArr = $(this).val();

      empArr = empArr.split('___');
      let branch ='';
      if(empArr.length >1){
      branch = empArr[0];
      let emp_name = empArr[1];
      let emp_desg = empArr[2];
      let emp_phone = empArr[3];

      $("#jeName").val(emp_name);
      $("#jeId").val(branch);
      $("#jedesigntation").val(emp_desg);
      $("#jePhone").val(emp_phone);
      $("#info-row").removeClass('d-none');
     
      }else{
        $("#jeName").val('');
      $("#jeId").val('');
      $("#jedesigntation").val('');
      $("#jePhone").val('');
       $("#info-row").addClass('d-none');
      }



      $.ajax(
        {
          url: 'search-station-assigned.php',
          type: 'POST',
          data: {
            branch: branch
          },

          beforeSend: function () {
            $("#dataTable ").html('Working...');

          },
          success: function (data) {
            $("#dataTable ").html(data);
          },
        });
    });
  });
</script>
<script>
  function _(id) {
    return document.getElementById(id);
  }


  /*UPDATE AJAX*/
  function submitForm1() {
    _("mybtn").disabled = true;
    _("status").innerHTML = 'please wait ...';
    var formdata = new FormData();
    formdata.append("subid", _("subid").value);
    formdata.append("subcode", _("subcode").value);
    formdata.append("subname", _("subname").value);
    formdata.append("dept", _("dept").value);
    formdata.append("semester", _("semester").value);
    formdata.append("maxmarks", _("maxmarks").value);
    formdata.append("subtype", _("subtype").value);
    formdata.append("max_class", _("max_class").value);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "update-subject-db.php");
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4 && ajax.status == 200) {
        if (ajax.responseText == "success") {
          _("my_form").innerHTML = '<h2>Thanks ' + _("n").value + ', your message has been sent.</h2>';
        } else {
          _("status").innerHTML = ajax.responseText;
          _("mybtn").disabled = false;

          /*$('#view').modal('hide');*/
        }
      }
    }
    ajax.send(formdata);
  }/*********************/

  function ViewCommonForm(sectionName,sectionId,stationName,stationId,empId){

$.ajax({
    type:"POST",
    url:"../commonForm/query/common-action.php",
    data:{
        common_action:"setSessionForFormDetails_JE",
        sectionId:sectionId,
        stationId:stationId,
        sectionName:sectionName,
        stationName:stationName,
        from:"SSE",
        viewType:"JE",
        empId:empId
    },
    beforeSend:()=>{
        $("#loader_show").removeClass('d-none');
    },
    success:(response)=>{
        $("#loader_show").addClass('d-none');
        let respo = JSON.parse(response);
        console.log("respo=", respo);
        if (respo['status']) {
            window.location.href = "../commonForm/view-form.php";
        }else{
            alert("Something went wrong try again");
        }
    }
});



  }

</script>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <!--  <div class="alert alert-success">
 <strong>  Admin Panel</strong> &mdash; <a href="assign-subject.php">Assigned Subject</a>
</div> -->

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-heading" style="background-color:#af0202;color:#FFFFFF;">
        <center> <i class="fa fa-graduation-cap" style="font-size:26px; color:#ffffff;"></i>
          <font style="font-size:24px;"> <strong> View Assigned Station</strong></font>
        </center>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label>Select JE<span style="color:#FF0000">&lowast;</span></label>
              <form name="form1">
                <select name="branch" id="fetchval" class="form-control input-sm"
                  style="margin-top:15px;border:1px solid #e26228;border-left:3px solid #e26228;border-right:3px solid #e26228;padding:0 10px 0 20px;">
                  <option selected="true">CHOOSE JE</option>
                  <?php

                  include('include/db_config.php');
                  // $recordset = mysqli_query($con,"select * from department");
                  // 								while($record = mysqli_fetch_object($recordset))
                  // 								{
                  // 								echo"<option>",$record->name,"</option>";
                  // 								}
                  try
                  {



                  $teacher_que = mysqli_query($con, "select empid,empname,empdesg,phone from je_info_rail where empname!='' order by empname");
                  while ($tea_run = mysqli_fetch_array($teacher_que)) {
                    // echo "<option value='" . $tea_run['empid'] . "'>(" . $tea_run['empname'] . ")" . $tea_run['empid'] . "</option>";
                    $empData = $tea_run['empid']."___".$tea_run['empname']."___".$tea_run['empdesg']."___".$tea_run['phone']; // this one
                    echo "<option value='" . $empData . "'>(" . $tea_run['empname'] . ")" . $tea_run['empid'] . "</option>"; // this one
                  
                  }
              } // try close
              catch(Exception $e)
              {
                print_r($e);
              }

                  ?>



                  ?>


                </select>
            </div>
          </div>



        </div><!--row--->

        <div class="row d-none" id="info-row">
          <!-- emp info -->
          <div class="col-12 col-md-8 m-auto">
            <div class="form-row">
              <div class="col-6 form-group">
                <label>JE/SSE Name</label>
                <input type="text" disabled readonly="true" class="form-control" id="jeName">

              </div>

              <div class="col-6 form-group">
                <label>JE/SSE ID</label>
                <input type="text" disabled readonly="true" class="form-control" id="jeId">

              </div>

              <div class="col-6 form-group">
                <label>Designtaion</label>
                <input type="text" disabled readonly="true" class="form-control" id="jedesigntation">

              </div>

              <div class="col-6 form-group">
                <label>Phone</label>
                <input type="text" disabled readonly="true" class="form-control" id="jePhone">

              </div>

            </div>

          </div>
          <!-- emp info end -->
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <span style="float:right; color:#FF0000;">&nbsp;<button type="button" class="btn btn-sm btn-danger"
                  name="bt" id="btn" onClick="submitForm();">Download in Excel Format</button>
                </form></span>
              <tr>
                <th>S.No.</th>
                <th>Emp ID</th>
                <th>JE/SSE Name</th>
                <th>Section Name</th>
                <th>Station Name</th>
                <th>Designtaion</th>
                <th>Phone</th>
                <th>Form</th>  

                <th>Delete Assigned Station</th>
              </tr>
            </thead>

            <tbody>

              <?php

              include('include/db_config.php');
              $n = 1;
              $recordset = mysqli_query($con, "select * from assign_info_rail");
              while ($record = mysqli_fetch_object($recordset)) {
                echo "
                				
									<tr>
                                 <td>", $n, "</td>
								                <td>", $record->empid, "</td>
                                <td>", $record->empname, "</td>
                                <td>", $record->section_name, "</td>
                                <td>", $record->station_name, "</td>
                                <td>", $record->empdesg, "</td>
                                <td>", $record->phone, "</td>
                                
                                  								 
								 "; ?>
                <td>
                  <?php echo '<button type="button" onclick=ViewCommonForm("'.$record->section_name.'","'.$record->section_id.'","'.$record->station_name.'","'.$record->station_id.'","'.$record->empid.'") class="btn btn-sm btn-success">Form</button>'; ?>
                </td>
                <td><a href='delete_assign_station.php?id=<?php echo $record->id; ?>'><button
                      class='btn btn-sm btn-outline-danger'>Delete</button></a></td>









                <?php
                $n++;

              } ?>







            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

  <!-- VIEW Modal-->

  <!----------------------------------->



  <?php require('footer.php'); ?>