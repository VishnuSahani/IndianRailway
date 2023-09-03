<?php
include('header.php');
?>

<div class="d-flex justify-content-center align-items-center">
    <div class="h5 mb-4 text-gray-800">Block Demand Form</div>
</div>


<form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="form-row">
                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="dateTime">DateTime</label>
                        <input type="date" id="dateTime" name="dateTime" class="form-control">
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value=""></option>
                            <option value="ENGG">ENGG</option>
                            <option value="OHE">OHE</option>
                            <option value="S&T">S&T</option>
                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="board">Board</label>
                        <select name="board" id="board" class="form-control">
                            <option value=""></option>
                            <option value="CSMT-CLA">CSMT-CLA</option>
                            <option value="CLA-KYN">CLA-KYN</option>                           

                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="line">Line</label>
                        <input type="text" id="line" name="line" class="form-control">
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="fromStation">From STN</label>
                        <select name="fromStation" id="fromStation" class="form-control">
                            <option value=""></option>
                            <option value="CSMT">CSMT</option>
                            <option value="MSD">MSD</option>

                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="toStation">To STN</label>
                        <select name="toStation" id="toStation" class="form-control">
                            <option value=""></option>
                            <option value="CSMT">CSMT</option>
                            <option value="MSD">MSD</option>
                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="blockType">Block Type</label>
                        <select name="blockType" id="blockType" class="form-control">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="mainWork">Main Work</label>
                        <select name="mainWork" id="mainWork" class="form-control">
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="subWork">Sub Work</label>
                        <input type="text" id="subWork" name="subWork" class="form-control">
                    </div>

                    <div class="form-group col-xl-2 col-md-3 col-lg-3 col-12">
                        <label for="organisation">Organisation</label>
                        <select name="organisation" id="organisation" class="form-control">
                            <option value="Railway">Railway</option>
                        </select>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width:25%">SSE Name</th>
                    <th scope="col" style="width:25%">Mobile No.</th>
                    <th scope="col" style="width:35%"><span class="text-danger">KM (xxx/xxx)</span></th>
                    <th scope="col" style="width:25%">Other Lines Affected</th>
                    <th scope="col" style="width:25%">Signals Affected</th>
                    <th scope="col" style="width:30%">Work Details</th>
                    <th scope="col" style="width:35%">
                        <span class="text-danger">
                            Type Of Demand
                        </span>
                    </th>
                    <th scope="col">Quantum Of Work Demand</th>
                    <th scope="col">Resources Needed</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width:25%">
                        <input type="text" class="form-control" id="sseName" name="sseName">
                    </td>
                    <td style="width:25%">
                        <input type="text" class="form-control" id="mobileNo" name="mobileNo">
                    </td>
                    <td style="width:35%">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="kmFrom">From</label>
                                <input type="text" class="form-control" id="kmFrom" name="kmFrom">

                            </div>
                            <div class="form-group col-6">
                                <label for="kmTo">To</label>
                                <input type="text" class="form-control" id="kmTo" name="kmTo">
                            </div>
                        </div>
                    </td>
                    <td style="width:25%">
                        <input type="text" class="form-control" id="otherLineAffected" name="otherLineAffected">

                    </td>
                    <td style="width:25%">
                        <input type="text" class="form-control" id="signalAffected" name="signalAffected">

                    </td>
                    <td style="width:30%">
                        <input type="text" class="form-control" id="workDetails" name="workDetails">

                    </td>
                    <td style="width:35%">
                        <input type="text" class="form-control" id="typeOfDemand" name="typeOfDemand">

                    </td>
                    <td>
                        <input type="text" class="form-control" id="quantumOfWorkDemand" name="quantumOfWorkDemand">

                    </td>
                    <td>
                        <input type="text" class="form-control" id="resourcesNeeded" name="resourcesNeeded">

                    </td>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th scope="col">Day/Night</th>
                <th scope="col">Demand Hrs</th>
                <th scope="col" colspan="2">Corridor</th>
                <th scope="col">OHE</th>
                <th scope="col">S&T</th>
                <th scope="col">BTN/Power</th>
                <th scope="col">SASM</th>
            </tr>

            <tr>
                <td>
                    <select name="dayNight" id="dayNight" class="form-control">
                        <option value=""></option>
                        <option value="DAY">DAY</option>
                        <option value="NIGHT">NIGHT</option>
                    </select>
                </td>
                <td>
                    <input type="time" class="form-control" id="demandHrs" name="demandHrs">
                </td>
                <td>
                    <input type="time" class="form-control" id="corridorFrom" name="corridorFrom">


                </td>
                <td>
                    <input type="time" class="form-control" id="corridorTo" name="corridorTo">

                </td>
                <td>
                    <select name="ohe" id="ohe" class="form-control">
                        <option value="No">No</option>
                    </select>
                </td>
                <td>
                    <select name="sAndT" id="sAndT" class="form-control">
                        <option value="No">No</option>
                    </select>
                </td>
                <td>
                    <select name="btnPower" id="btnPower" class="form-control">
                        <option value="No">No</option>
                    </select>

                </td>
                <td>
                    <select name="sasm" id="sasm" class="form-control">
                        <option value="No">No</option>
                    </select>

                </td>
            </tr>
            
        </table>
        
    </div>

    <div class="table-responsive">
        <table class="table table-boredered">
            <tr>
                <th>Vehicle</th>
                <th>Status</th>
                <th colspan="2">Operated Time</th>
                <th class="text-danger">Operated/Not</th>
                <th>Progress</th>
                <th>Reason Remarks</th>
                <th>OHE_sec_Form</th>
                <th>OHE_sec_To</th>
            </tr>

            <tr>
                <td>
                    <input type="text" id="vahicle" name="vahicle"  class="form-control">
                </td>
                <td>
                    <select name="status" id="status" class="form-control">
                        <option value="Demand">Demand</option>
                    </select>

                </td>
                <td>
                    <input type="time" id="operatedFrom" name="operatedFrom" class="form-control">
                </td>
                <td>
                    <input type="time" id="operatedTo" name="operatedTo" class="form-control">
                </td>
                <td>
                    <select name="operatedOrNot" id="operatedOrNot" class="form-control">
                        <option value="Operated">Operated</option>
                        <option value="Not Operated">Not Operated</option>
                    </select>

                </td>
                <td>
                    <input type="text" id="progress" name="progress" class="form-control"> 
                </td>
                <td>
                    <input type="text" id="resonRemark" name="resonRemark" class="form-control"> 
                    
                </td>
                <td>
                    <input type="text" id="oheSecFrom" name="oheSecFrom" class="form-control"> 
                    
                </td>
                <td>
                    
                    <input type="text" id="oheSecTo" name="oheSecTo" class="form-control"> 
                </td>
            </tr>
        </table>
    </div>

    <div class="from-group">
        <div id="formStatus"></div>
        <button type="button" id="submitBtn" class="btn btn-success">Submit</button>
    </div>
</form>


<?php
    include('footer.php');
?>

<script>
    $(document).ready(function(){

        $("#submitBtn").click(function(){

            let dateTime = $("#dateTime").val();
            let department = $("#department").val();
            let board = $("#board").val();
            let line = $("#line").val();
            let fromStation = $("#fromStation").val();
            let toStation = $("#toStation").val();
            let blockType = $("#blockType").val();
            let mainWork = $("#mainWork").val();
            let subWork = $("#subWork").val();
            let organisation = $("#organisation").val();
            let sseName = $("#sseName").val();
            let mobileNo = $("#mobileNo").val();
            let kmFrom = $("#kmFrom").val();

            let kmTo = $("#kmTo").val();
            let otherLineAffected = $("#otherLineAffected").val();
            let signalAffected = $("#signalAffected").val();
            let workDetails = $("#workDetails").val();
            let typeOfDemand = $("#typeOfDemand").val();
            let quantumOfWorkDemand = $("#quantumOfWorkDemand").val();
            let resourcesNeeded = $("#resourcesNeeded").val();
            let dayNight = $("#dayNight").val();
            let demandHrs = $("#demandHrs").val();
            let corridorFrom = $("#corridorFrom").val();
            let corridorTo = $("#corridorTo").val();
            let ohe = $("#ohe").val();
            let sAndT = $("#sAndT").val();
            let btnPower = $("#btnPower").val();
            let sasm = $("#sasm").val();
            let vahicle = $("#vahicle").val();
            let status = $("#status").val();
            let operatedFrom = $("#operatedFrom").val();
            let operatedTo = $("#operatedTo").val();
            let operatedOrNot = $("#operatedOrNot").val();
            let progress = $("#progress").val();
            let resonRemark = $("#resonRemark").val();
            let oheSecFrom = $("#oheSecFrom").val();
            let oheSecTo = $("#oheSecTo").val();

            let reqBody = {
                "action":"insertBlockRegisterData",
                "dateTime":dateTime,
                "department":department,
                "board":board,
                "line":line,
                "fromStation":fromStation,
                "toStation":toStation,
                "blockType":blockType,
                "mainWork":mainWork,
                "subWork":subWork,
                "organisation":organisation,
                "sseName":sseName,
                "mobileNo":mobileNo,
                "kmFrom":kmFrom,
                "kmTo":kmTo,
                "otherLineAffected":otherLineAffected,
                "signalAffected":signalAffected,
                "workDetails":workDetails,
                "typeOfDemand":typeOfDemand,
                "quantumOfWorkDemand":quantumOfWorkDemand,
                "resourcesNeeded":resourcesNeeded,
                "dayNight":dayNight,
                "demandHrs":demandHrs,
                "corridorFrom":corridorFrom,
                "corridorTo":corridorTo,

                "ohe":ohe,
                "sAndT":sAndT,
                "btnPower":btnPower,
                "sasm":sasm,
                "vahicle":vahicle,
                "status":status,
                "operatedFrom":operatedFrom,
                "operatedTo":operatedTo,
                "operatedOrNot":operatedOrNot,
                "progress":progress,
                "resonRemark":resonRemark,
                "oheSecFrom":oheSecFrom,
                "oheSecTo":oheSecTo               
            }

            $.ajax({
                type:"POST",
                url: "./action/demand-action.php",
                data : reqBody,
                beforeSend:function(){

                },
                success:function(response){
                    let respo = JSON.parse(response);
                    console.log(respo);
                    if(respo['status']){
                        $("#formStatus").html(respo['msg']).css("color","greeen")

                    }else{
                        $("#formStatus").html(respo['msg']).css("color","red")

                    }
                },
                complete:function(){
                    setTimeout(() => {

                    $("#formStatus").html("")

                        
                    }, 5000);
                }
            })
            
             
            
            
        });
        
    });
</script>