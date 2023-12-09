<?php require('header.php'); ?>
<script src="../jsPdf/jspdf.umd.min.js"></script>
<script src="../jsPdf/html2canvas.js"></script>
<script language="javascript">
  function submitForm() {

    form1.action = "excel.php";
    form1.submit();

  }


     
window.jsPDF = window.jspdf.jsPDF;


function generatePdf() {


    // var doc = new jsPDF('l', 'mm', [297, 210]);
    // var doc = new jsPDF('l', 'mm', 'letter');
    var doc = new jsPDF();

    // Source HTMLElement or a string containing HTML.
    var elementHTML = document.querySelector("#dataTable");
    // Add a new page before adding content
    // doc.addPage();
    doc.html(elementHTML, {
        callback: function(doc) {
            // Save the PDF
            
            // doc.save(formType + '.pdf'); // auto pdf downloading when click on btn
            doc.output('dataurlnewwindow'); // open pdf in new window
            // doc.save();

            /* 
                doc.output('save', 'filename.pdf'); //Try to save PDF as a file (not works on ie before 10, and some mobile devices)
                doc.output('datauristring');        //returns the data uri string
                doc.output('datauri');              //opens the data uri in current window
                doc.output('dataurlnewwindow');  
             */
        },
        margin: [10, 10, 10, 10],
        autoPaging: 'text',
        x: 0,
        y: 0,
        // filename: formType+'.pdf',
        width: 190, //target width in the PDF document
        windowWidth: 675 //window width in CSS pixels
    });


}

  $(document).ready(function () {
    $("#fetchval").on('change', function () {
      var branch = $(this).val();
      var sem = $(fetchval2).val();
      var per = $(fetchval3).val();

      $.ajax(
        {
          url: 'search-student-tpo-branch-db.php',
          type: 'POST',
          data: {
            branch: branch,
            sem: sem,
            per: per
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

 // <!--------------end------------->
  $(document).ready(function () {
    $("#fetchval2").on('change', function () {
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
          url: 'search-student-tpo-branch-db.php',
          type: 'POST',
          data: {
            branch: branch,
            sem: sem,
            per: per
          },

          beforeSend: function () {
            $("#dataTable").html('Working...');

          },
          success: function (data2) {
            $("#dataTable").html(data2);
          },
        });
    });
  });

//<---!--------------end------------->
    $(document).ready(function () {
      $("#fetchval3").on('change', function () {
        /*  var keyword3 = $(this).val();
          
          $.ajax(
          {
              url:'search-student-tpo-db.php',
              type:'POST',
              data:'request3='+keyword3,*/
        var branch = $(fetchval).val();
        var sem = $(fetchval2).val();
        var per = $(this).val();

        $.ajax(
          {
            url: 'search-student-tpo-branch-db.php',
            type: 'POST',
            data: {
              branch: branch,
              sem: sem,
              per: per
            },

            beforeSend: function () {
              $("#dataTable").html('Working...');

            },
            success: function (data3) {
              $("#dataTable").html(data3);
            },
          });
      });
    });
 /// < !--- end------------->
</script>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <!--   <div class="alert alert-success">
 <strong>  Admin Panel</strong> &mdash; <a href="view-enroll-student.php">View Enroll Students</a>
</div> -->

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-heading" style="background-color:#af0202;color:#FFFFFF;">
        <center> <i class="fa fa-graduation-cap" style="font-size:26px; color:#ffffff;"></i>
          <font style="font-size:24px;"> <strong> PME DUE DETAILS</strong></font>
        </center>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-right mb-2">
        <button type='button' class="btn btn-sm btn-info" onclick="generatePdf()">Generate PDF</button>

          </div>
        </div><!--row--->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <span style="float:right; color:#FF0000;">&nbsp;<button type="button" class="btn btn-sm btn-danger"
                  name="bt" id="btn" onClick="submitForm();">Download in Excel Format</button></form></span>
              <tr>
                <th>Emp ID</th>
                <th>Emp Name</th>
                <th>Dob</th>
                <th>Age</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>PME Due</th>


              </tr>
            </thead>

            <tbody>

              <?php

              // include('include/db_config.php');
              $con=mysqli_connect("localhost","root","") or die(mysqli_error());
            //to select the database
              $db=mysqli_select_db($con,"indian_rail_project3")or die(mysqli_error());


              $sql = "update emp_info_rail set age = DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), date_of_app)), '%Y') + 0";
              mysqli_query($con, $sql);

              $sql2 = "update emp_info_rail set pmedue = DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), pme_date)), '%Y') + 0";
              mysqli_query($con, $sql2);


              //$query = mysqli_query($con,"select * FROM emp_info_rail");
              
              // $row = mysqli_fetch_array($query);
              //  echo $age = $row['age'];
              // $pmedue = $row['pmedue'];
              



              //  if($age>=40 and $age<=50 )
              // {
              //     if($age>=51 and $age<=55 )
              //     {
              //         if($age>=51 and $age<=55 )
              //     }
              //     $que="select * from emp_info_rail where (age>=40 and age<=50) and pmedue>3";
              // }
              
              // else if($age>=51 and $age<=55 )
              // {
              //     $que="select * from emp_info_rail where (age>=51 and age<=55) and pmedue>3";
              // }
//      if ($age>=55)
//     {
//         $que="select * from emp_info_rail where age>=55";
              
              //     }
              
              //echo $query;
              
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
                                <td>", $record->date_of_app, "</td>

                                <td>", $record->age, "</td>
                                <td>", $record->empdesg, "</td>
                                <td>", $record->phone, "</td>
                                <td>", $record->pmedue, "</td>
                                                 

                 "; ?>




              </tr>
              <?php }
              } ?>

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


      function showdetails2(button) {
        var id = button.id;
        $.ajax({
          url: "verify-student-db.php",
          method: "GET",
          data: { "id": id },
          success: function (response) {
            //console.log(response);

            window.location.reload();


          }
        });

      }



    function showdetails3(button) {
      var id = button.id;
      $.ajax({
        url: "nonverify-student-db.php",
        method: "GET",
        data: { "id": id },
        success: function (response) {
          //console.log(response);

          window.location.reload();


        }
      });

    }

  </script>

  <?php


  require('footer.php'); ?>