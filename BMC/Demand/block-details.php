<?php
include('header.php');
?>

<div class="d-flex justify-content-between align-items-center">
    <div class="h5 mb-4 text-gray-800">Block Demand</div>

  <div>
  <a href="block-register.php" role="button" class="btn btn-success btn-sm m-1">Primary Add</a>
    <a href="block-register.php" role="button" class="btn btn-success btn-sm m-1">Block Details</a>
    <a href="block-register.php" role="button" class="btn btn-info btn-sm m-1">Report</a>
    <a href="block-register.php" role="button" class="btn btn-info btn-sm m-1">Export</a>
  </div>

</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="fromDate">From Date</label>
                    <input type="date" class="form-control" id="fromDate" name="fromDate">
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="toDate">To Date</label>
                    <input type="date" class="form-control" id="toDate" name="toDate">
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department">
                        <option value=""></option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="board">Board</label>
                    <select class="form-control" id="board" name="board">
                        <option value="All">All</option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="All">All</option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="status">Line</label>
                    <select class="form-control" id="line" name="line">
                        <option value="All">All</option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="mainWork">Main Work</label>
                    <select class="form-control" id="mainWork" name="mainWork">
                        <option value=""></option>
                        
                    </select>
                </div>

                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="blockType">Block Type</label>
                    <select class="form-control" id="blockType" name="blockType">
                        <option value="All">All</option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4">
                    <label for="organisation">Organisation</label>
                    <select class="form-control" id="organisation" name="organisation">
                        <option value="All">All</option>

                    </select>
                </div>
                <div class="form-group col-12 col-xl-2 col-lg-3 col-md-4 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-info mx-2">Show</button>
                    <button type="button" class="btn btn-sm btn-success mx-2">Reset</button>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- table -->

<hr>

<div class="my-1 text-dark h6">
    Primary
</div>

<div class="table-responsive">
    <table class="table table-bordered display" id="myTable">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Date</th>
                <th>Depart.</th>
                <th>Board</th>
                <th>Line</th>
                <th colspan="2">Station</th>
                <th>Main Work</th>
                <th colspan="2">KM</th>
                <th>Demand Hrs</th>
                <th>Status</th>
                <th>Shadow</th>
                <th colspan="3">Corridor</th>
                <th colspan="3">Sanctioned</th>
                <th colspan="3">Operated Time</th>
                <th>Operated</th>
              
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>From</th>
                <th>To</th>
                <th></th>
                <th>From</th>
                <th>To</th>
                <th></th>
                <th></th>
                <th></th>
                <th >From</th>
                <th >To</th>
                <th >Total(hrs)</th>
                <th >From</th>
                <th >To</th>
                <th >Total(hrs)</th>
                <th >From</th>
                <th >To</th>
                <th >Total(hrs) </th>
                <th></th>
              
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>



<?php
    include('footer.php');
?>


<script>

var gbl_data = [];
  var  myTableData;


    function getBlockRegisterData(){
        $.ajax({
            type:"POST",
            url:"./action/demand-action.php",
            data:{
                "action":"getBlockRegisterList"
            },
            beforeSend:function(){

            },
            success:function(response){
                let respo = JSON.parse(response);
                console.log(respo);

                gbl_data = respo['data'];
            
            myTableData.clear();
            myTableData.rows.add(gbl_data);
            myTableData.draw(false);

            }
        });
    }




    $(document).ready(function(){
        myTableData = $('#myTable').DataTable( {
    data: gbl_data,
    columns: [
    
        { data: 'SrNo' },
        { data: 'dateTime' },
        { data: 'department' },
        { data: 'board' },
        { data: 'line' },
        { data: 'fromStation' },
        { data: 'toStation' },
        { data: 'mainWork' },
        { data: 'kmFrom' },
        { data: 'kmTo' },
        { data: 'demandHrs' },
        { data: 'status' },
        { data: 'SrNo' }, //
        { data: 'corridorFrom' },
        { data: 'corridorTo' },
        { data: 'totalCorridor' },
        { data: 'SrNo' }, //
        { data: 'SrNo' }, //
        { data: 'SrNo' }, //
        { data: 'operatedFrom' },
        { data: 'operatedTo' },
        { data: 'totalOperator' }
       
    ]
} );
        getBlockRegisterData();
    });
</script>