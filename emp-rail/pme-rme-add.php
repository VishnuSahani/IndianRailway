<?php require('header.php');?>
<?php require('include/db_config.php');

$empId = @$_GET['id'];

// echo $empId;

/*

$query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE id = '$empId'");

if(mysqli_num_rows($query) <= 0){
    echo "Invalid employee id <a href='emp-info.php'> Go back</a>";
    die();
}

$empBasicData = mysqli_fetch_array($query);

$employeeId = $empBasicData['empid'];

*/

// print_r($empBasicData);


/*
The FILTER_VALIDATE_INT filter is used to validate value as integer.

FILTER_VALIDATE_INT also allows us to specify a range for the integer variable.

Possible options and flags:

min_range - specifies the minimum integer value
max_range - specifies the maximum integer value
FILTER_FLAG_ALLOW_OCTAL - allows octal number values
FILTER_FLAG_ALLOW_HEX - allows hexadecimal number values
*/

if (filter_var($empId, FILTER_VALIDATE_INT)!== false) {
    $query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE id = '$empId'");

    if(mysqli_num_rows($query) <= 0){
        echo "Invalid employee id <a href='emp-info.php'> Go back</a>";
        die();
    }

    $empBasicData = mysqli_fetch_array($query);

    $employeeId = $empBasicData['empid'];
  } 
  else {
    echo("Invalid param found from url <a href='emp-info.php'> Go back</a>");
    die();
  }


?>


<div class="alert alert-danger my-2">
    <h5 class="text-center">Add PME , Refresher Date </h5>
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


            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="pmeDate">PME Date</label>
                <input type="date" class="form-control" id="pmeDate" >
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="rmeDate">Refresher Date</label>
                <input type="date" class="form-control" id="rmeDate" >
            </div>



            <div class="form-group text-center col-12">
                <div class="my-2" id="statusRespo"></div>
                <button type="button" class="btn btn-success" onclick="addPmeRmeData()">Save Data</button>
            </div>





            </div>

        </div>

        <div class="col-12">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>PME Date</th>
                        <th>Refresher Date</th>
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


<script>

function _(id)
{ 
  return document.getElementById(id);
 }


 function createTablerow(dataList){

let htmlDisplay = '';

  if(dataList.length == 0){

    htmlDisplay = `<tr>
    <td colspan="5">No data found</td>


    </tr>`

  }else{

    dataList.forEach((value,index)=>{

        let className1 = value['pme_date']==''?'text-danger':'';
        let className2 = value['rme_date']==''?'text-danger':'';

      htmlDisplay += `<tr>
      <td>${index+1}</td>
       <td class="${className1}">${value['pme_date']==''?'No Record':value['pme_date']}</td>
        <td class="${className2}">${value['rme_date'] == '' ? 'No Record': value['rme_date']}</td>
         <td>${value['section_name']}</td>
         <td>${value['station_name']}</td>
     
      </tr>`;
    });

  }

  _("preRmeOldTableData").innerHTML = htmlDisplay ;
}


    function addPmeRmeData(){

        let pmeDate = _("pmeDate").value;
        let rmeDate = _("rmeDate").value;

        if(pmeDate != "" || rmeDate != ""){

            var formdata = new FormData();

            formdata.append( "pmeDate", pmeDate);
            formdata.append( "rmeDate",rmeDate);
            formdata.append( "id",'<?php echo $empId ?>');





            formdata.append( "action","pmeRmeDateInsert");
            var ajax = new XMLHttpRequest();
            ajax.open("POST","./query/action.php",true);
            ajax.send(formdata);

            ajax.onreadystatechange = function(){
            if(ajax.readyState == 4 && ajax.status == 200) {

                let respo = JSON.parse(ajax.responseText);
                console.log(respo);  
                
                _("statusRespo").innerHTML = respo['msg'];
                
                
                if(respo['status']){
                    
                    _("statusRespo").style.color = "green";
                    getPmeRmeData();
                    
                } else {
                _("statusRespo").style.color = "red";
            
            }

            }
        };


        }else{
            _("statusRespo").innerHTML = "Please select at least one date";
            _("statusRespo").style.color = "red";
            setTimeout(() => {
                _("statusRespo").innerHTML = "";

            }, 5000);
        }
      
        
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
                
                
                
                createTablerow(respo['data']);
            //     if(respo['status']){
                    
            //     } else {
            
            // }

            }
        };

    }


    getPmeRmeData();
    
</script>