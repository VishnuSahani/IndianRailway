<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailerje']))
{
  $id=$_SESSION['userretailerje'];  
   
}
  

    $empId = $id;

    // echo $name;
    
    
    $query = mysqli_query($con,"SELECT * FROM je_info_rail WHERE empid = '$empId'");
    
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
                <label for="employeeId">Employee Id</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empid'];?>">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="empname">Employee Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empname'];?>">
            </div>
            </div>
        </div>
        <!-- station name -->
        <div class="col-12">
            <div class="form-group">
                <label class="font-weight-bold">Station List</label>
                <div class="d-flex justify-content-start">
                    <?php
                        
                        $query = mysqli_query($con,"SELECT * FROM assign_info_rail WHERE empid='$employeeId'");
                        while($list = mysqli_fetch_array($query)){

                            echo "<div class='badge badge-primary h2 mx-2'>".$list['station_name']."</div>";

                        }
                    ?>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="table-responsive">
            <table class="table w-100" id="myTablePmeRme">
                <thead class="table-dark">
                    <tr>
                        <!-- <th>#</th> -->
                        <th>PME Date</th>
                        <th>Refresher Date</th>
                        <th>Section Name</th>
                        <th>Station Name</th>
                    </tr>

                </thead>

                <tbody class="table-hover" id="preRmeOldTableData">

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
