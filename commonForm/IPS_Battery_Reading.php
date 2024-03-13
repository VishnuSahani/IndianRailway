<?php
// require('header.php');
// require('include/db_config.php');

// echo "IPS_Battery";
// echo $_SESSION['empid_for_form'];
// print_r($_SESSION);
session_start();
?>
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
                    <td>#v</td>
                    <td>Component</td>
                    <td>Language</td>
                    <td>Sub Component</td>
                    <td>Created Date </td>
                    <td>Updated Date </td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody id="printTableData">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal IPS_Battery -->
<div class="modal fade" id="componentForm_IPS_Battery" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyIPS_Battery">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">

                            <span class="heading_english">
                                IPS Battery Reading
                            </span>

                            <span class="heading_hindi">
                                IPS Battery Reading
                            </span>
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>


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
                        Maintenance Schedules of IPS with Battery Bank Readings
                    </span>

                    <span class="heading_hindi">
                        बैटरी बैंक रीडिंग के साथ आईपीएस का रखरखाव कार्यक्रम
                    </span>

                </div>
                <div class="modal-body table-responsive">

                    <table class="table">
                        <tbody id="ips_battery_body1">

                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                        Railway:
                                    </span>

                                    <span class="heading_hindi">
                                        रेलवे:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control" id="ips_railway">
                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        Division/Station*:
                                    </span>

                                    <span class="heading_hindi">
                                        प्रभाग/स्टेशन*:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_division">

                                </td>
                            </tr>

                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                        IPS Manufacturer:
                                    </span>

                                    <span class="heading_hindi">
                                        आईपीएस निर्माता:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_manufacturer">

                                </td>

                                <th scope="col">
                                    <span class="heading_english">
                                        Battery Manufacturer:
                                    </span>

                                    <span class="heading_hindi">
                                        बैटरी निर्माता:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading"
                                        id="ips_batteryManufacturer">

                                </td>
                            </tr>

                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                        IPS Installation Date:
                                    </span>

                                    <span class="heading_hindi">
                                        आईपीएस स्थापना तिथि:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading"
                                        id="ips_installation_Date">

                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        Battery Bank Installation Date
                                    </span>

                                    <span class="heading_hindi">
                                        बैटरी बैंक रुकने की तिथि:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading"
                                        id="ips_bank_installation_Date">
                                </td>
                            </tr>

                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                        No. of working cells
                                    </span>

                                    <span class="heading_hindi">
                                        कार्यशील कोशिकाओं की संख्या:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_workingCells">

                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        Battery Bank Voltage
                                    </span>

                                    <span class="heading_hindi">
                                        बैटरी बैंक वोल्टेज:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_bankVoltage">

                                </td>
                            </tr>

                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                        No. of spare cells
                                    </span>

                                    <span class="heading_hindi">
                                        अतिरिक्त कोशिकाओं की संख्या:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_spareCells">

                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        Capacity of Battery Bank (AH)
                                    </span>

                                    <span class="heading_hindi">
                                        बैटरी बैंक की क्षमता (AH):
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_capacityBattery">

                                </td>
                            </tr>

                            <tr>
                                <th scope="col">


                                </th>
                                <td>

                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        Type of Battery
                                    </span>

                                    <span class="heading_hindi">
                                        बैटरी का प्रकार:
                                    </span>

                                </th>
                                <td>
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_typeBattery">

                                </td>
                            </tr>

                            <tr class="text-light bg-secondary">
                                <th scope="col">
                                    <span class="heading_english">
                                        Specific Gravity of LMLA cell
                                    </span>

                                    <span class="heading_hindi">
                                        एलएमएलए सेल का विशिष्ट गुरुत्व:
                                    </span>

                                </th>
                                <td>
                                    1180-1220
                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        VRLA cell
                                    </span>

                                    <span class="heading_hindi">
                                        वीआरएलए सेल:
                                    </span>

                                </th>
                                <td>
                                    <span class="heading_english">
                                        Specific Gravity N/A

                                    </span>
                                    <span class="heading_hindi">
                                        विशिष्ट गुरुत्व N/A

                                    </span>
                                </td>
                            </tr>

                            <tr class="text-light bg-secondary">
                                <th scope="col">
                                    <span class="heading_english">
                                        Voltage of LMLA cell
                                    </span>

                                    <span class="heading_hindi">
                                        एलएमएलए सेल का वोल्टेज:
                                    </span>

                                </th>
                                <td>
                                    1.85-2.25V
                                </td>
                                <th scope="col">
                                    <span class="heading_english">
                                        VRLA cell Voltage
                                    </span>

                                    <span class="heading_hindi">
                                        वीआरएलए सेल वोल्टेज:
                                    </span>

                                </th>
                                <td>
                                    1.85-2.27V
                                </td>
                            </tr>

                            <tr>
                                <th colspan="2" scope="col">
                                    <span class="heading_english">
                                        Date of Measurement:
                                    </span>

                                    <span class="heading_hindi">
                                        माप की तिथि:
                                    </span>

                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_dateMeasurement">
                                </td>

                            </tr>
                        </tbody>
                        <!-- tbody 1 -->
                        <tr class="bg-dark text-light">
                            <th style="width:5%">
                                <span class="heading_english"> Cell No.</span>
                                <span class="heading_hindi">सेल नं.</span>


                            </th>
                            <th>
                                <span class="heading_english">Specific Gravity</span>
                                <span class="heading_hindi">विशिष्ट गुरुत्व</span>
                            </th>
                            <th colspan="2">
                                <span class="heading_english">Voltage</span>
                                <span class="heading_hindi">वोल्टेज</span>
                            </th>
                        </tr>
                        <tbody id="ips_battery_body2">
                            <tr>
                                <th>1</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_1"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_1">
                                </td>
                            </tr>

                            <tr>
                                <th>2</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_2"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_2">
                                </td>
                            </tr>


                            <tr>
                                <th>3</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_3"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_3">
                                </td>
                            </tr>

                            <tr>
                                <th>4</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_4"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_4">
                                </td>
                            </tr>

                            <tr>
                                <th>5</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_5"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_5">
                                </td>
                            </tr>

                            <tr>
                                <th>6</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_6"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_6">
                                </td>
                            </tr>

                            <tr>
                                <th>7</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_7"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_7">
                                </td>
                            </tr>

                            <tr>
                                <th>8</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_8"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_8">
                                </td>
                            </tr>

                            <tr>
                                <th>9</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_9"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_9">
                                </td>
                            </tr>

                            <tr>
                                <th>10</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_10"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_10">
                                </td>
                            </tr>

                            <tr>
                                <th>11</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_11"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_11">
                                </td>
                            </tr>

                            <tr>
                                <th>12</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_12"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_12">
                                </td>
                            </tr>

                            <tr>
                                <th>13</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_13"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_13">
                                </td>
                            </tr>

                            <tr>
                                <th>14</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_14"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_14">
                                </td>
                            </tr>

                            <tr>
                                <th>15</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_15"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_15">
                                </td>
                            </tr>

                            <tr>
                                <th>16</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_16"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_16">
                                </td>
                            </tr>

                            <tr>
                                <th>17</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_17"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_17">
                                </td>
                            </tr>

                            <tr>
                                <th>18</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_18"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_18">
                                </td>
                            </tr>

                            <tr>
                                <th>19</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_19"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_19">
                                </td>
                            </tr>

                            <tr>
                                <th>20</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_20"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_20">
                                </td>
                            </tr>

                            <tr>
                                <th>21</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_21"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_21">
                                </td>
                            </tr>

                            <tr>
                                <th>22</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_22"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_22">
                                </td>
                            </tr>

                            <tr>
                                <th>23</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_23"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_23">
                                </td>
                            </tr>

                            <tr>
                                <th>24</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_24"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_24">
                                </td>
                            </tr>

                            <tr>
                                <th>25</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_25"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_25">
                                </td>
                            </tr>

                            <tr>
                                <th>26</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_26"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_26">
                                </td>
                            </tr>

                            <tr>
                                <th>27</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_27"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_27">
                                </td>
                            </tr>

                            <tr>
                                <th>28</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_28"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_28">
                                </td>
                            </tr>

                            <tr>
                                <th>29</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_29"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_29">
                                </td>
                            </tr>

                            <tr>
                                <th>30</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_30"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_30">
                                </td>
                            </tr>

                            <tr>
                                <th>31</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_31"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_31">
                                </td>
                            </tr>

                            <tr>
                                <th>32</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_32"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_32">
                                </td>
                            </tr>

                            <tr>
                                <th>33</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_33"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_33">
                                </td>
                            </tr>

                            <tr>
                                <th>34</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_34"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_34">
                                </td>
                            </tr>

                            <tr>
                                <th>35</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_35"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_35">
                                </td>
                            </tr>

                            <tr>
                                <th>36</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_36"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_36">
                                </td>
                            </tr>

                            <tr>
                                <th>37</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_37"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_37">
                                </td>
                            </tr>

                            <tr>
                                <th>38</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_38"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_38">
                                </td>
                            </tr>

                            <tr>
                                <th>39</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_39"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_39">
                                </td>
                            </tr>

                            <tr>
                                <th>40</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_40"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_40">
                                </td>
                            </tr>

                            <tr>
                                <th>41</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_41"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_41">
                                </td>
                            </tr>

                            <tr>
                                <th>42</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_42"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_42">
                                </td>
                            </tr>

                            <tr>
                                <th>43</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_43"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_43">
                                </td>
                            </tr>

                            <tr>
                                <th>44</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_44"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_44">
                                </td>
                            </tr>

                            <tr>
                                <th>45</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_45"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_45">
                                </td>
                            </tr>

                            <tr>
                                <th>46</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_46"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_46">
                                </td>
                            </tr>

                            <tr>
                                <th>47</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_47"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_47">
                                </td>
                            </tr>

                            <tr>
                                <th>48</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_48"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_48">
                                </td>
                            </tr>

                            <tr>
                                <th>49</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_49"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_49">
                                </td>
                            </tr>

                            <tr>
                                <th>50</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_50"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_50">
                                </td>
                            </tr>

                            <tr>
                                <th>51</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_51"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_51">
                                </td>
                            </tr>

                            <tr>
                                <th>52</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_52"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_52">
                                </td>
                            </tr>

                            <tr>
                                <th>53</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_53"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_53">
                                </td>
                            </tr>

                            <tr>
                                <th>54</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_54"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_54">
                                </td>
                            </tr>

                            <tr>
                                <th>55</th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="sg_55"></td>
                                <td colspan="2"><input type="text" class="form-control ipsBatteryReading" id="volt_55">
                                </td>
                            </tr>

                            <tr class="text-light bg-dark">
                                <th colspan="2">

                                    <span class="heading_english">Spare Cells</span>
                                    <span class="heading_hindi">अतिरिक्त सेल</span>
                                </th>
                                <th>

                                    <span class="heading_english">Specific Gravity</span>
                                    <span class="heading_hindi">विशिष्ट गुरुत्व</span>
                                </th>
                                <th>

                                    <span class="heading_english">Voltage</span>
                                    <span class="heading_hindi">वोल्टेज</span>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">Cell No1</span>
                                    <span class="heading_hindi">सेल नंबर 1</span>

                                </th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_sg_1"></td>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_volt_1"></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">Cell No 2</span>
                                    <span class="heading_hindi">सेल नंबर 2</span>
                                </th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_sg_2"></td>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_volt_2"></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">Cell No 3</span>
                                    <span class="heading_hindi">सेल नंबर 3</span>
                                </th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_sg_3"></td>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_volt_3"></td>
                            </tr>
                            <tr>
                                <th colspan="2"><span class="heading_english">Cell No 4</span>
                                    <span class="heading_hindi">सेल नंबर 4</span>
                                </th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_sg_4"></td>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_volt_4"></td>
                            </tr>
                            <tr>
                                <th colspan="2"><span class="heading_english">Cell No 5</span>
                                    <span class="heading_hindi">सेल नंबर 5</span>
                                </th>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_sg_5"></td>
                                <td><input type="text" class="form-control ipsBatteryReading" id="cell_volt_5"></td>
                            </tr>

                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">Total Battery Voltage:</span>
                                    <span class="heading_hindi">कुल बैटरी वोल्टेज:</span>

                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading"
                                        id="ips_totalBatteryVoltage">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Battery Charging Current:</span>
                                    <span class="heading_hindi">बैटरी चार्जिंग करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_batteryCurrent">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Load Current:</span>
                                    <span class="heading_hindi">भार बिजली:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_loadCurrent">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">AC Input Voltage:</span>
                                    <span class="heading_hindi">एसी इनपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_inputVolt">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="heading_english">AC Input Current:</span>
                                    <span class="heading_hindi">एसी इनपुट करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="ips_inputCurrent">

                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 1: Voltage/Current:</span>
                                    <span class="heading_hindi">एसएमआर 1: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_1">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 2: Voltage/Current:</span>
                                    <span class="heading_hindi">एसएमआर 2: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_2">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 3: Voltage/Current:</span>
                                    <span class="heading_hindi">एसएमआर 3: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_3">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 4: Voltage/Current:</span>
                                    <span class="heading_hindi">एसएमआर 4: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_4">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 1: Voltage/Current:</span>
                                    <span class="heading_hindi"> एसएमआर 1: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_1_1">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 2: Voltage/Current:</span>
                                    <span class="heading_hindi"> एसएमआर 2: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_2_2">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 3: Voltage/Current:</span>
                                    <span class="heading_hindi"> एसएमआर 3: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_3_3">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">SMR 4: Voltage/Current:</span>
                                    <span class="heading_hindi"> एसएमआर 4: वोल्टेज/करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="smr_4_4">

                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Inverter 1: Input/Output Voltage:</span>
                                    <span class="heading_hindi"> इन्वर्टर 1: इनपुट/आउटपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="inverter_volt_1">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Inverter 1: Load Current:</span>
                                    <span class="heading_hindi"> इन्वर्टर 1 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="inverter_current_1">

                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Inverter 2: Input/Output Voltage:</span>
                                    <span class="heading_hindi"> इन्वर्टर 2: इनपुट/आउटपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="inverter_volt_2">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Inverter 2: Load Current:</span>
                                    <span class="heading_hindi">इन्वर्टर 2 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="inverter_current_2">

                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Signals) 1 Input/Output Voltage:</span>
                                    <span class="heading_hindi"> सीवीटी/एवीआर (सिग्नल) 1 इनपुट/आउटपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_volt_1">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Signals) 1 Load Current:</span>
                                    <span class="heading_hindi"> सीवीटी/एवीआर (सिग्नल) 1 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_current_1">

                                </td>
                            </tr>


                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Signals) 2 Input/Output Voltage:</span>
                                    <span class="heading_hindi">सीवीटी/एवीआर (सिग्नल) 2 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_volt_2">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Signals) 2 Load Current:</span>
                                    <span class="heading_hindi">सीवीटी/एवीआर (ट्रैक) 1 इनपुट/आउटपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_current_2">

                                </td>
                            </tr>


                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Track) 1 Input/Output Voltage:</span>
                                    <span class="heading_hindi"> सीवीटी/एवीआर (ट्रैक) 1 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_trackVolt_1">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Track) 1 Load Current:</span>
                                    <span class="heading_hindi">सीवीटी/एवीआर (ट्रैक) 2 इनपुट/आउटपुट वोल्टेज:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading"
                                        id="cvt_avr_trackCurrent_1">

                                </td>
                            </tr>


                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">CVT/AVR (Track) 2 Input/Output Voltage:</span>
                                    <span class="heading_hindi"> सीवीटी/एवीआर (ट्रैक) 2 लोड करंट:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_trackVolt_2">

                                </td>
                            </tr>
                            <!-- <tr>
                                <th>CVT/AVR (Track) 2 Load Current:</th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="cvt_avr_trackCurrent_2">

                                </td>
                            </tr> -->


                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">110V DC for Points:</span>
                                    <span class="heading_hindi"> पॉइंट के लिए 110V DC:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="dcPoint">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Battery Charging & Load Current may be
                                        included:</span>
                                    <span class="heading_hindi"> बैटरी चार्जिंग और लोड करंट शामिल हो सकते हैं:</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="batteryLoadInclude">

                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    <span class="heading_english">Signal transformer and DC-DC converter voltage may be
                                        included</span>
                                    <span class="heading_hindi"> सिग्नल ट्रांसफार्मर और डीसी-डीसी कनवर्टर वोल्टेज शामिल
                                        किया जा सकता है</span>
                                </th>
                                <td colspan="2">
                                    <input type="text" class="form-control ipsBatteryReading" id="signalTransformer">

                                </td>
                            </tr>
                        </tbody>


                    </table>

                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="IPS_BatteryForm_status"></div> -->
                <!-- <button type='button' id="IPS_BatteryFormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="IPS_BatteryPdfBtn" onclick="generatePdf('IPS_Battery','pdfBodyIPS_Battery')"
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

    function openDialog(id) {

        let displayHtml = "";

        let tableDataForm = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];
        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);

        Object.keys(tableDataForm).forEach((key,index)=>{
            let getIdBykey = $("#"+key);
            if(getIdBykey.attr("id")){
                getIdBykey.val(tableDataForm[key]).attr("readonly","true");
            }

        });


        $("#componentForm_IPS_Battery").modal("show");


    }

    function showFormDetails(id, language) {

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        openDialog(id);


    }



    function showTable(subcomponame) {

        $("#mainTable").removeClass('d-none');

        let formData = formDataList_g.filter((x) => x.sub_component == subcomponame);
        let displayHtml = '';


        formData.forEach((element, index) => {

            displayHtml += `<tr>
        <th scope="row">${index + 1}</th>
        <td>${element['component_name']}</td>
        <td>${element['language']}</td>
        <td>${element['sub_component']}</td>
        <td>${element['created_date']}</td>
        <td>${element['updated_date']}</td>
        <td style="vertical-align:middace;width:22%" >`;

            $(".displaySubcompoName").html(element['sub_component']);

            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>`;



            displayHtml += `</td></tr>`;


        });

        document.getElementById("printTableData").innerHTML = displayHtml;


    }

    function showSubComponent() {

        $("#mainTable").addClass('d-none');

        document.getElementById("printTableData").innerHTML = "";

        let dataList = [...formDataList_g];

        let subCompo = [...new Set(dataList.map(x => x.sub_component))];

        console.log("subCompo map=", subCompo);

        if (subCompo.length != 0) {

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "IPS_Battery" Form</div>`;
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
                "formType": "IPS_Battery"
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