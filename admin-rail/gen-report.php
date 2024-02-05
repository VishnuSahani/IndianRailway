<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>

<style>
    #autocomplete-list {
      border: 1px solid #ccc;
      max-height: 150px;
      overflow-y: auto;
    }
    .autocomplete-item {
      padding: 8px;
      cursor: pointer;
    }
  </style>

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
                    <input type="text"  id="employeeId" class="form-control">
                        <!-- <select id="employeeId" class="custom-select">
                            <option value=""></option>
                        </select> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<h2>Autocomplete Example</h2>
  <input type="text" id="autocomplete-input" placeholder="Type to search">
  <div id="autocomplete-list"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var input = document.getElementById("autocomplete-input");
  var autocompleteList = document.getElementById("autocomplete-list");

  input.addEventListener("input", function() {
    var query = input.value.trim();

    // Clear previous results
    autocompleteList.innerHTML = '';

    if (query.length > 0) {
      // Fetch data from the server using AJAX
      fetchData(query, function(response) {
        var data = JSON.parse(response);

        // Populate the autocomplete list with fetched data
        data.forEach(function(item) {
          var option = document.createElement("div");
          option.className = "autocomplete-item";
          option.textContent = item;
          option.addEventListener("click", function() {
            input.value = item;
            autocompleteList.innerHTML = ''; // Clear autocomplete list after selection
          });
          autocompleteList.appendChild(option);
        });
      });
    }
  });

  function fetchData(query, callback) {
    // Use AJAX to fetch data from the server
    var xhr = new XMLHttpRequest();
    var url = 'server.php?query=' + encodeURIComponent(query);

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        callback(xhr.responseText);
      }
    };

    xhr.open('GET', url, true);
    xhr.send();
  }
});

</script>
</body>

</html>