<!-- Modal CS1 -->
<div class="modal fade" id="componentForm_CS1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelCS1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:100%;max-width:100%">
        <div class="modal-content">
            <div id="pdfBodyCS1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelCS1">
                        <span class="badge badge-success h3">
                            Schedule Code: CS1
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Monthly, Sectional SSE/JE(Signal): Quarterly, SSE(Signal)/In
                    charge:
                    Half yearly

                </div>
                <div class="modal-body table-responsive">
                    
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cs1_body">
                            <tr>
                                <th scope="row">1</th>
                                <td>Cleaning of LED lighting unit & current regulator/integrated LED, all terminations,
                                    housing, signal units & around signal post.</td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_1"> -->
                                    <div id="cs1_1"></div>

                                </td>
                            </tr>



                            <tr>
                                <th scope="row" rowspan="6">2</th>
                                <td>Measurement of input voltage & current with clamp type ammeter at input terminals of
                                    current regulator/LED signal for all signal aspects and V/I reading shall be within
                                    specified range as below:</td>
                                <td rowspan="6" style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_2"> -->
                                    <div id="cs1_2"></div>

                                </td>

                            </tr>
                            <tr>
                                <td>(a) Main signal Voltage: 82.5 to137.5 V and Current: 112 to 154 mA</td>

                            </tr>

                            <tr>
                                <td>(b) Calling on/A/AG Marker Voltage: 88 to 132 V and current: 120 to 165 mA.</td>
                            </tr>
                            <tr>
                                <td>(c) Route signal Voltage: 88 to 132 V and Current: 23.75 to 26.25 mA per LED.</td>
                            </tr>
                            <tr>
                                <td>(d) Shunt signal Voltage: 88 to 132 V and Current: 52.25 to 57.75 mA per LED.</td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered">
                                        <thead class="text-center table-dark">
                                            <tr>
                                                <td rowspan="2">Date</td>
                                                <td colspan="7">LED</td>
                                                <td rowspan="2"> Nut Bolt </td>
                                                <td rowspan="2"> Dom Clean</td>
                                                <td rowspan="2"> Cover</td>
                                                <td rowspan="2">Remark </td>
                                            </tr>

                                            <tr>
                                                <td>RG</td>
                                                <td>HG</td>
                                                <td>DG</td>
                                                <td>HHG</td>
                                                <td>ROUTE</td>
                                                <td>C-ON</td>
                                                <td>Shunt</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- <input id="date" readonly disable="true" class="form-control" type="date"> -->
                                                    <div id="date"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="rg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="rg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="hg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="hg"></div>

                                                </td>
                                                <td>
                                                    <!-- <input id="dg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="dg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="hhg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="hhg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="route" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="route"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="c_on" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="c_on"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="shout" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="shout"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="nut_bolt" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="nut_bolt"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="dome_clean" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="dome_clean"></div>
                                                    </td>

                                                <td>
                                                    <!-- <input id="cover" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="cover"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="remark" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="remark"></div>
                                                    </td>


                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    Checking of tightness of all adjusting screws of LED signal unit as well as Current
                                    regulator/integrated LED.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_3"> -->
                                    <div id="cs1_3"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    Ensure condition of signal post is satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_4"> -->
                                    <div id="cs1_4"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    Check condition of Signal foundation, ladder & ensure proper alignment of signal
                                    post.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_5"> -->
                                    <div id="cs1_5"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    Ensure Signal unit condition, closing of door & locking arrangements are
                                    satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_6"> -->
                                    <div id="cs1_6"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    Ensure Signal post & CLS unit should be earthed & screen earthing is effective.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_7"> -->
                                    <div id="cs1_7"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>
                                    Complete signal unit should be cleaned for removing oxidation, rusting & tightened
                                    properly.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_8"> -->
                                    <div id="cs1_8"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    Ensure that there is no opening/access for rain water/rodent entry.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_9"> -->
                                    <div id="cs1_9"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>
                                    Ensure the cable terminations in location box should be cleaned for removing
                                    oxidation,
                                    rusting & tightened properly.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_10"> -->
                                    <div id="cs1_10"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    Visual check of insulations of cables, PVC wires, proper termination without criss
                                    cross, condition of rubber gasket arrangement.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_11"> -->
                                    <div id="cs1_11"></div>

                                </td>
                            </tr>

                            <tr>
                                <th rowspan="3" scope="row">12</th>
                                <td>
                                    (a) Check that where signals are Infringing with SOD, their Implantation distance is
                                    marked on Red colour on white back ground.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12a"> -->
                                    <div id="cs1_12a"></div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    (b) Blanking off to be done as given in chapter 19 of SEM.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12b"> -->
                                    <div id="cs1_12b"></div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    (c) Right hand signals to be provided with an arrow mark pointing towards the
                                    relevant
                                    track.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12c"> -->
                                    <div id="cs1_12c"></div>

                                </td>
                            </tr>

                        </tbody>



                    </table>


                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="cs1Form_status"></div>
                <!-- <button type='button' id="cs1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="cs1PdfBtn" onclick="generatePdf('CS1','pdfBodyCS1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>


<!--  -->

<!-- Modal T1 -->
<div class="modal fade" id="componentForm_T1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT1" aria-hidden="true">
    <div class="modal-dialog" style="max-width:100%">
        <!--  modal-dialog-centered modal-lg -->
        <div class="modal-content">
            <div id="pdfBodyT1">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT1">
                        <span class="badge badge-success h3">
                            Schedule Code: T1
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="t1_body">

                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-bordered">
                                        <thead class="text-center table-dark">
                                            <tr>
                                                <td rowspan="3">Date</td>
                                                <td colspan="6">SPG and Volt</td>
                                                <td rowspan="3"> Charging V</td>
                                                <td rowspan="3">Current V</td>
                                                <td rowspan="3"> --- </td>
                                                <td rowspan="3"> िफड इंड पर वोल्टेज</td>
                                                <td rowspan="3">Near Block</td>
                                                <td rowspan="3">Wire status</td>
                                                <td rowspan="3">Remark</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">Sale 1</td>
                                                <td colspan="2">Sale 2</td>
                                                <td colspan="2">Sale 3</td>

                                            </tr>
                                            <tr>
                                                <td>SPG</td>
                                                <td>V</td>
                                                <td>SPG</td>
                                                <td>V</td>
                                                <td>SPG</td>
                                                <td>V</td>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- <input id="date1" class="form-control" type="date" disable="true" readonly> -->
                                                    <div id="date1"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="sale1_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale1_spg"></div>
                                            </td>
                                                <td>
                                                    <!-- <input id="sale1_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale1_v"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="sale2_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale2_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale2_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale2_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale3_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale3_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale3_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale3_v"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="charging_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="charging_v"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="charging_current" class="form-control" type="text"  disable="true" readonly> -->
                                                    <div id="charging_current"></div>
                                                    </td>
                                                <td></td>
                                                <td>
                                                    <!-- <input id="feedVoltage" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="feedVoltage"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="nearBlock" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="nearBlock"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="wireStatus" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="wireStatus"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="remark1" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="remark1"></div>
                                                </td>


                                            </tr>
                                        </tbody>
                                        <thead class="table-dark">
                                            <tr>
                                                <td>Date</td>
                                                <td>Rail Volt</td>
                                                <td>VT (PU Value < 250/300%)</td>
                                                <td>Wire status</td>
                                                <td>Magnetic Part</td>
                                                <td></td>
                                                <td>Rail Flag</td>
                                                <td>Wire status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- <input id="date2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="date2"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="railVoltage" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="railVoltage"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="vt_value" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="vt_value"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="wireStatus2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="wireStatus2"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="magneticPart" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="magneticPart"></div>
                                                    </td>
                                                <td></td>
                                                <td>
                                                    <!-- <input id="railFlag2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="railFlag2"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="jumberwireStatus" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="jumberwireStatus"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="remark2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="remark2"></div>
                                                    </td>
                                            </tr>

                                        </tbody>
                                    </table>



                                </td>
                            </tr>
                        </tbody>


                    </table>


                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="t1Form_status"></div>
                <!-- <button type='button' id="t1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="t1PdfBtn" onclick="generatePdf('T2','pdfBodyT1')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>