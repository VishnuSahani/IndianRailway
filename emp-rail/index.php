<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
  

    $empId = $id;

    // echo $name;
    
    
    $query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE empid = '$empId'");
    
    if(mysqli_num_rows($query) <= 0){
        echo "Invalid employee id <a href='logout.php'> click to Verify ?</a>";
        die();
    }
    
    $empBasicData = mysqli_fetch_array($query);
    
    $employeeId = $empBasicData['empid'];

?>

<div class="alert alert-danger my-2">
    <h5 class="text-center">Employee Details</h5>
</div>


<div class="container ">
    <div class="row">
        <div class="col-12 m-auto">

            <div class="row">
            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="sectionName">Section Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['section_name'];?>">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="stationName">Station Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['station_name'];?>">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="employeeId">Employee Id</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empid'];?>">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="empname">Employee Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empname'];?>">
            </div>








            </div>

        </div>

        <div class="col-12">
            <div class="table-responsive">
            <table class="table table-hover w-100" id="myTablePmeRme">
                <thead class="table-dark">
                    <tr>
                        <!-- <th>#</th> -->
                        <th>PME Date</th>
                        <th>Refresher Date</th>
                        <th>Competency</th>
                        <th>Section Name</th>
                        <th>Station Name</th>
                    </tr>

                </thead>

                <tbody id="preRmeOldTableData">

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>




<?php require('footer.php');?>



<script>

var gbl_data = [];
  var  myTableData;

  $(document).ready(()=>{

    myTableData = $('#myTablePmeRme').DataTable( {
    data: gbl_data,
    columns: [    
        { data: 'pme_date' },
        { data: 'rme_date' },
        { data: 'competency' },
        { data: 'section_name' },
        { data: 'station_name' },
      
    ]
} );

  })

function _(id)
{ 
  return document.getElementById(id);
 }







    function getPmeRmeData(){

        var formdata = new FormData();
        formdata.append( "action","getPmeRmeDate");
        formdata.append( "empId",'<?php echo $employeeId ?>');
            var ajax = new XMLHttpRequest();
            ajax.open("POST","./query/action.php",true);
            ajax.send(formdata);

            ajax.onreadystatechange = function(){
            if(ajax.readyState == 4 && ajax.status == 200) {

                let respo = JSON.parse(ajax.responseText);
                console.log(respo);                  
                
                gbl_data = respo['data'];
            
                myTableData.clear();
                myTableData.rows.add(gbl_data);
                myTableData.draw(false);
            //     if(respo['status']){
                    
            //     } else {
            
            // }

            }
        };

    }


    getPmeRmeData();
    
</script>
