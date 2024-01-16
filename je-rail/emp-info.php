<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailerje'])) {
  $id = $_SESSION['userretailerje'];

}


?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>



<div class="container">
  <div class="card-header mt-3 alert alert-primary text-center h3">View Employee </div>

  <div class="row">
  <div class="col-12">
    <div class="form-group px-2">
      <label class="h5">Station List</label>
      <div class="my-1">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="allStation" value="All">
          <label class="form-check-label h6" for="allStation">All</label>
        </div>

        <?php

        $query = mysqli_query($con, "SELECT * FROM assign_info_rail WHERE empid='$id'");
        while ($list = mysqli_fetch_array($query)) {

          $stationName = $list['station_name'];
          $stationId = $list['station_id'];

          echo '<div class="form-check form-check-inline mx-2">
                      <input class="form-check-input commonStation" type="checkbox" id="station' . $stationName . '" value="' . $stationId . '">
                      <label class="form-check-label h6" for="station' . $stationName . '">' . $stationName . '</label>
                    </div>';

        }
        ?>
      </div>
    </div>
  </div>

  </div>
  <!-- row -->


  
</div>

<div class="p-2">
<div class="table-responsive">
    <table class="table display table-striped" border="0" align="center" bgcolor="#E9E9E9" id="myTable">
      <thead class="thead-dark">

        <tr>
          <!-- <th>S.No.</th> -->
          <th>Employee Id</th>

          <th>Employee Name</th>
          <th>Employee Designation</th>

          <th> PME</th>
          <th>Refresher</th>
          <th>Add PME/Refresher</th>
          <th>View</th>


        </tr>
      </thead>
    </table>
  </div>
</div>


<?php require('footer.php'); ?>


<script type="text/javascript">

  var gbl_data = [];
  var myTableData;

  $(document).ready(() => {

    myTableData = $('#myTable').DataTable({
      data: gbl_data,
      columns: [

        { data: 'empid' },
        { data: 'empname' },
        { data: 'empdesg' },
        { data: 'pme_date' },
        { data: 'rme_date' },
        { data: 'href' },
        { data: 'formView' }
      ]
    });

  })


  function _(id) {
    return document.getElementById(id);
  }


function showCommonform(empid,from){
  
  console.log("empid",empid)
  console.log("from",from)
  $.ajax({
    type:"POST",
    url:"../commonForm/query/common-action.php",
    data:{
      common_action:"setSessionForFormDetails",
      empid:empid,
      from:from,
      viewType:"Employee"
    },
    beforeSend:()=>{
      $("#loader_show").removeClass('d-none');

    },
    success:(response)=>{
      $("#loader_show").addClass('d-none');
      let respo = JSON.parse(response);
      if(respo['status']){
        window.location.href = "../commonForm/view-form.php";
      }else{
        alert("Something went wrong try again");
      }

    }
    
  });
}

  function getStationValList() {

    let valueList = [];
    let checkAll = [];

    // console.log("E=",e);
    $('.commonStation').each((i, element) => {
      checkAll.push(i);
      // console.log("i",i);
      // console.log("element",element.checked);
      if (element.checked) {
        valueList.push(element.value);
      }
    });

    return { valueList: valueList, checkAll: checkAll }

  }

  function getEmpData(dataList) {
    console.log(dataList);
    if (dataList.length) {

      let stationData = dataList.join();
      $.ajax({
        type: "POST",
        url: "query/je-action.php",
        data: {
          JE_action: "getEmpByStation",
          stationData: dataList
        },
        beforeSend: () => {
          $("#loader_show").removeClass('d-none');
        },
        success: (response) => {
          $("#loader_show").addClass('d-none');

          let respo = JSON.parse(response);
          console.log("response-", respo);
          if (respo['status']) {
            gbl_data = respo['data'];

            myTableData.clear();
            myTableData.rows.add(gbl_data);
            myTableData.draw(false);
          }


        }
      })

    } else {
      myTableData.clear();
      myTableData.rows.add([]);
      myTableData.draw(false);
    }
  }

  $(document).ready(() => {
    $("#allStation").change((e) => {
      let data = []
      if ($('#allStation').is(":checked")) {
        $('.commonStation').prop('checked', true);
        let dataList = getStationValList();
        data = dataList.valueList;
      } else {
        $('.commonStation').prop('checked', false)

      }

      getEmpData(data);

    });

    $(".commonStation").change((e) => {

      let dataList = getStationValList();

      if (dataList.checkAll.length == dataList.valueList.length) {
        $('#allStation').prop('checked', true)
      } else {
        $('#allStation').prop('checked', false)
      }

      // console.log("valueList",dataList.valueList);
      getEmpData(dataList.valueList);

    })
  })
</script>