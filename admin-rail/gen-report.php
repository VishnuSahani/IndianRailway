<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>

<div class="container-fluid">
    <div class=" my-2 alert alert-success h4 text-center">
        Report
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="form-row card-body">
                    <div class="form-group col-sm-3">
                        <label for="year">Select Year <span class="text-danger">*</span></label>
                        <select id="year" class="custom-select">
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="month">Select Month <span class="text-danger">*</span></label>
                        <select id="month" class="custom-select">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                    <label for="formType">Select Form Type <span class="text-danger">*</span></label>
                        <select id="formType" class="custom-select">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                    <label for="employeeId">Select Employee ID <span class="text-danger">*</span></label>
                        <select id="employeeId" class="custom-select">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</body>

</html>