<?php
session_start();
?>
<script src="../js/precaution-info.js"></script>

<div class="container">
    <div class="row">
        <div class="my-1 col-12" id="createSubcompo">

        </div>

        <div id="showError" class="text-danger text-center h6">

        </div>

    </div>


    <div class="table-responsive d-none" id="mainTable">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>#</td>
                    <td>Component</td>
                    <td>Language</td>
                    <td>Sub Component</td>
                    <td>Created Date </td>
                    <td>Updated Date </td>
                    <td>Action</td>
                    <td>View</td>

                </tr>
            </thead>

            <tbody id="printTableData">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal Summer -->
<div class="modal fade" id="componentForm_Summer" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodySummer">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelSummer">
                    <span class="badge badge-success h3">
                     <span class="heading_english">
                     Annexure-1
                     </span>
                     <span class="heading_hindi">
                     Annexure-1
                     </span>
                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['emp_name_tmp'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['empid_for_form']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['section_name_tmp']; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <span>Station:</span>

                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['station_name_tmp']; ?>

                        </span>

                    </div>

                    <div class="col-6">
                        <span>Created Date:</span>

                        <span class="ml-2 font-weight-bold" id="created_date">

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Updated Date:</span>

                        <span class="ml-2 font-weight-bold" id="updated_date">

                        </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
           

           <span class="heading_english">
           Summer Precautions  <?php echo date("Y"); ?>
              </span>

              <span class="heading_hindi">
          Summer Precautions  <?php echo date("Y"); ?>
              </span>
          </div>
                <div class="modal-body table-responsive">

                <div class="container-fluid">
                    <div class="d-flex bg-dark text-light">
                       <div style="width:65px" class="border py-3 px-2">
                       <span class="heading_english">
                             S.No
                        </span>

                        <span class="heading_hindi">
                            क्रम सं
                        </span>
                       </div>
                       <div class="flex-fill py-3 border px-2">
                       <span class="heading_english">
                                    Items
                                </span>

                                <span class="heading_hindi">
                                Items
                                </span>
                       </div>
                    </div>
                    <!-- heading -->
                
                    <div id="summer_body" class="border">

                    </div>

                </div>
                
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="summerForm_status"></div> -->
                <!-- <button type='button' id="summerFormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="summerPdfBtn" onclick="generatePdf('Summer','pdfBodySummer')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    // global 
    var formDataList_g = [];

    function openDialog(response, id) {

        let tableId = '';

        let tableDataForm = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);

        $("#componentForm_Summer").modal("show");

        
    let idList=[
        "t_no_use",
        "t_no_attend",
        "t_no_rectified",
        "t_no_attend_cal",
        "t_no_rectified_date",
        "t_no_balance_done"
    ];

    let lableList =[
        "Total No. in use",
        "Total No. to be attended",
        "Total No. to be rectified",
        "Total No. attended",
        "Total No. rectified on",
        "Balance to be done by date"
    ]


    console.log("wp=",response);
    let displayHtml='';
    let commonInputName='';
    response.forEach((element,i) => {
        displayHtml += `<div class="d-flex alert-success">
        <div style="width:65px" class="border py-2 px-1">${i+1}</div>
        <div class="border px-1 py-2 flex-fill">${element.heading}</div>
        </div>`;

        if(element.data.length){
            element.data.forEach((element1,j) => {

                displayHtml += `<div class="alert my-2">`;

                displayHtml += `<div class="d-flex py-1">
                <div class="border px-1">(${j+1})</div>
                <div class="border px-1 flex-fill">${element1.info}</div>
                </div>`; // heading

                displayHtml += `<div class="d-flex ">`;
                element1.options.forEach((option,o) => {
                    displayHtml +=`<div class="border d-flex flex-column justify-content-between px-1 pb-2">
                        <div class="font12">${lableList[o]}</div>
                        <div class=" p-1 border" id="${idList[o]}_${i}_${j}_div">
                        ${tableDataForm[`${idList[o]}_${i}_${j}`]}
                        </div>
                        </div>`;
                
                });// option for each                
            displayHtml +=`</div>`; // options div


            displayHtml +=`</div>`; // element 1 alert

            //
            if(element1.children && element1.children.length){

                element1.children.forEach((element_child,k) => {
                    displayHtml += `<div class="alert my-2">`;
                    displayHtml += `<div class="d-flex py-1"><div class="border px-1">(${convertToRoman(k+1)})</div><div class="border px-1 flex-fill">${element_child.info}</div></div>`;

                    displayHtml += `<div class="d-flex">`;
                    element_child.options.forEach((option,o) => {

                
                        displayHtml +=`<div class="border d-flex flex-column justify-content-between px-1 pb-2">
                            <div class="font12">${lableList[o]}</div>
                            <div class="border p-1">
                            ${tableDataForm[`${idList[o]}_${i}_${j}_${k}`]}                              
                            </div>
                            
                            </div>`;

                    });
                    displayHtml +=`</div>`;
                    displayHtml +=`</div>`; // element childe alert

                });

            }// children if check
            //
                
            }); // main data for each
        }

        
    });

        document.getElementById("summer_body").innerHTML = displayHtml;

    }
    function addViewFormSuccessfully(formId,empId){

        let formData = formDataList_g.filter((x) => {
            if (x['id'] == formId) {
                return x;
            }
        })[0];

        if(formData){
                $.ajax({
                type:"POST",
                url:"./query/common-action.php",
                data:{
                    common_action:"whoViewMyFormAdd",
                    empid:empId,
                    formId:formId,
                    section_id : formData.section_id,
                    station_id : formData.station_id,
                    component_name : formData.component_name,
                    form_empid : formData.emp_id
                },
                success:(su)=>{
                    console.log("su",su);
                }
            })
        }


        }
    

    function showFormDetails(id, language) {

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        addViewFormSuccessfully(id,'<?php echo $_SESSION['myOriginalId']; ?>');

        if (id != '') {
           let response = SUMMER_PRECAUTION_INFO;
            openDialog(response, id);

        } else {
            alert("Id is not set");
        }

    }

    function whoViewMyFormFuntion(formId){
        return new Promise((resolve,reject)=>{
            $.ajax({
            type : "POST",
            url:"./query/common-action.php",
            data:{
                common_action:"whoViewMyForm",
                who : '<?php echo $_SESSION['viewType']; ?>',
                id : '<?php echo $_SESSION['empid_for_form']; ?>',
                formId:formId
            },
            success:(response)=>{
                try{
                    let respo =JSON.parse(response);
                    if(respo['data']){
                        resolve(respo['data'])
                    }else{
                        resolve([])
                    }

                }catch(e){
                    resolve([])

                }
            }
        });
        });

    }

    function showTable(subcomponame) {

        $("#mainTable").removeClass('d-none');

        let formData = formDataList_g.filter((x) => x.sub_component == subcomponame);
        let displayHtml = '';


        formData.forEach((element, index) => {
            whoViewMyFormFuntion(element['id']).then((res)=>{
                    let formViewHtml = '';
                    if(res.length){
                        res.forEach(ele => {
                            let btnClass = 'btn-outline-danger';
                            if(ele['isView']){
                                btnClass = 'btn-danger';
                            }
                            formViewHtml+= `<button class="btn m-1 btn-sm ${btnClass}">${ele['type']}</button>`
                        });
                    }
            displayHtml += `<tr>
        <th scope="row">${index + 1}</th>
        <td>${element['component_name']}</td>
        <td>${element['language']}</td>
        <td>${element['sub_component']}</td>
        <td>${element['created_date']}</td>
        <td>${element['updated_date']}</td>
        <td style="vertical-align:middle;width:22%" >`;

            $(".displaySubcompoName").html(element['sub_component']);

            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button></td>`;



        displayHtml += `<td>${formViewHtml}</td></tr>`;

        document.getElementById("printTableData").innerHTML = displayHtml;
        })


        });


    }

    function showSubComponent() {

        $("#mainTable").addClass('d-none');

        document.getElementById("printTableData").innerHTML = "";

        let dataList = [...formDataList_g];

        let subCompo = [...new Set(dataList.map(x => x.sub_component))];

        console.log("subCompo map=", subCompo);

        if (subCompo.length != 0) {

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "Summer" Form</div>`;
            createSubcompo += `<div class="col-12 mt-1 mb-2">`;

            subCompo.forEach(element => {

                createSubcompo +=
                    `<button type="button" onclick="showTable('${element}')" class="btn btn-sm btn-primary mx-2">${element}</button>`

            });
            createSubcompo += `</div>`;


            $("#createSubcompo").html(createSubcompo);


        }


    }


    function getComponentForm() {

        $.ajax({
            type: "POST",
            url: "query/common-form-data-action.php",
            data: {
                common_action: "getFormSubmitedData_new",
                "formType": "Summer"
            },
            beforeSend: function () {
                $("#loader_show").removeClass('d-none');
                formDataList_g = [];
                $("#showError").html("");


            },
            success: function (response) {
                try {
                    let respo = JSON.parse(response);
                    console.log("response form data=", respo);

                    if (!respo['status']) {
                        $("#showError").html(respo['msg']);
                        return
                    }

                    formDataList_g = respo['data'];
                    showSubComponent();

                } catch (e) {
                    $("#showError").html("Catch block, Response Error " + e);


                }


            },
            complete: function () {
                $("#loader_show").addClass('d-none');
                setTimeout(() => {
                    $("#showError").html("");

                }, 9000);

            }

        });


    }


    $(document).ready(() => {
        getComponentForm();
    });

</script>