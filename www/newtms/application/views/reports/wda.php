<<<<<<< HEAD
<script>    $siteurl = '<?php echo site_url(); ?>';    $baseurl = '<?php echo base_url(); ?>';</script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/reportwda.js"></script><div class="col-md-10">    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-list-alt"></span> Reports - WDA Report</h2>    <h5 class="sub_panel_heading_style"><span class="glyphicon glyphicon-search"></span> Search By</h5>    <div class="table-responsive">        <?php        $course_id = $this->input->get_post("courseId");        $class_id = $this->input->get_post("classId");        $trainee = $this->input->get_post("trainee_id");        $taxcode = $this->input->get_post("taxcode_id");        $start_date = $this->input->get_post("start_date");        $end_date = $this->input->get_post("end_date");        $atr = array('id' => 'wda_report_form', 'method' => 'get');        echo form_open("reports/wda", $atr);        ?>        <table class="table table-striped">            <tbody>                <tr>                    <td class="td_heading">Select Course Name:</td>                    <td><?php echo form_dropdown("courseId", $courses, $this->input->get('courseId'), 'id="courseId" style="width:200px;"') ?> </td>                    <td class="td_heading">Class Name:</td>                    <td colspan="3"><?php echo form_dropdown("classId", $classes, $this->input->get('classId'), 'id="classId"') ?> </td>                </tr>                <tr>                    <td class="td_heading">&nbsp;&nbsp;                        <?php                        $data = array(                            'id' => 'search_select',                            'class' => 'search_select',                            'name' => 'search_select',                            'value' => '1',                            'checked' => true                        );                        echo form_radio($data);                        ?>                        &nbsp;&nbsp;Trainee Name.:</td>                    <td>                        <?php                        $data = array(                            'id' => 'trainee',                            'name' => 'trainee',                            'class'=>'upper_case',                            'value' => $this->input->get('trainee')                        );                        echo form_input($data);                        $data = array(                            'id' => 'trainee_id',                            'name' => 'trainee_id',                            'type' => 'hidden',                            'value' => $this->input->get('trainee_id')                        );                        echo form_input($data);                        ?>                        <span id="trainee_err"></span>                    </td>                    <td class="td_heading">&nbsp;&nbsp;                        <?php                        $select = $this->input->get('search_select');                        $val = ($select == 2) ? true : false;                        $data = array(                            'id' => 'search_select',                            'class' => 'search_select',                            'name' => 'search_select',                            'value' => '2',                            'checked' => $val                        );                        echo form_radio($data);                        ?>                        &nbsp;&nbsp;NRIC/FIN No.:</td>                    <td colspan="3">                        <?php                        $data = array(                            'id' => 'taxcode',                            'name' => 'taxcode',                            'class'=>'upper_case',                            'value' => $this->input->get('taxcode')                        );                        echo form_input($data);                        $data = array(                            'id' => 'taxcode_id',                            'name' => 'taxcode_id',                            'type' => 'hidden',                            'value' => $this->input->get('taxcode_id')                        );                        echo form_input($data);                        ?>                        <span id="taxcode_err"></span>                    </td>                </tr>                <tr>                    <td class="td_heading">Class Start Date From:</td>                    <td><input type="text" name="start_date" id="start_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('start_date'); ?>"></td>                    <td class="td_heading">To:</td>                    <td colspan="2"><input type="text" name="end_date"  id="end_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('end_date'); ?>"></td>                    <td align="center"><button type="submit" class="btn btn-xs btn-primary no-mar"><span class="glyphicon glyphicon-search"></span> Search</button></td>                </tr>            </tbody>        </table>    </div>    <div style="clear:both;"><span id="search_error"></span></div><br/>        <?php    if (!empty($tabledata)) {        if (empty($start_date) && empty($end_date)) {            $period = ' for ' . date('F d Y, l');        } else {            $period = 'for the period';            if (!empty($start_date))                $period .= ' from ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $start_date)->getTimestamp());            if (!empty($end_date))                $period .= ' to ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $end_date)->getTimestamp());        }        if (!empty($course_id)) {            $period .= ' \'' . $courses[$course_id] . '\'';        }        if (!empty($class_id)) {            $period .= ' \'' . $classes[$class_id] . '\'';        }        if (!empty($trainee_name)) {            $period .= ' \'' . $trainee_name->first . ' ' . $trainee_name->last . ' ' . $trainee_name->tax_code . '\'';        }        ?>        <div class = "panel-heading panel_headingstyle" style = "width:100%;"><strong>WDA Report <?php echo $period ?></strong></div>        <br>        <?php         if((courseId!="Select") || ($taxcode!="") || ($start_date !='' && $end_date !='')|| ($trainee!=""))         {        ?>        <span class="pull-right">            <a href="<?php echo site_url('/reports/wda_export_xls') . '?' . $_SERVER['QUERY_STRING']; ?>" class="small_text1">                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;            <a href="<?php echo site_url('/reports/report_wda_pdf') . '?' . $_SERVER['QUERY_STRING']; ?>"  class="small_text1">                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>        </span>         <?php }else { ?>        <div class="pull-right">            <a href="javascript:void(0)" class="small_text1" id='displayText'>                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;            <a href="javascript:void(0)"  class="small_text1" id='displayText1'>                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>        </div>        <div class="pull-right" id="alertmsg" style="display: none;color:#ff0000;padding:5px">Please Select One of the above filter to export PDF/XLS.</div>         <?php } ?>        <br><br>        <div class="table-responsive">        <table class="table table-striped">            <thead>                <?php                $ancher = (($sort_order == 'asc') ? 'desc' : 'asc');                $pageurl = $controllerurl;                ?>                <tr>                    <th width="10%" class="th_header">NRIC/FIN No.</th>                    <th width="15%" class="th_header text_move">Trainee Name</th>                    <th width="15%" class="th_header text_move">Company Name</th>                    <th width="10%" class="th_header text_move">Account Type</th>                    <th width="15%" class="th_header text_move">Home Address</th>                    <th width="10%" class="th_header">Contact Details</th>                    <th width="10%" class="th_header">Course Name</th>                    <th width="10%" class="th_header">Class Start Date</th>                    <th width="10%" class="th_header">Assessment Date</th>                    <th width="10%" class="th_header">Amount Paid</th>                </tr>            </thead>            <tbody>                <?php                foreach ($tabledata as $data) {                    $paid = ($data->payment_status == 'PAID') ? $data->total_amount_due : 0;                    $assmnt_date = empty($data->exam_date) ? $data->class_end_datetime : $data->exam_date;                    echo '<tr>                            <td>' . $data->tax_code . '</td>                            <td>' . $data->first_name . ' ' . $data->last_name . '</td>                            <td>' . $data->company_name . '</td>                            <td>' . $meta_map[$data->account_type] . '</td>                            <td>' . $data->personal_address_bldg . ' ' . $data->personal_address_city . ' ' . $meta_map[$data->personal_address_state] . ' ' . $meta_map[$data->personal_address_country] . '</td>                            <td>' . $data->registered_email_id . ' ' . $data->contact_number . '</td>                            <td>' . $data->crse_name . '</td>                            <td>' . date('d/m/Y', strtotime($data->class_start_datetime)) . '</td>                            <td>' . date('d/m/Y', strtotime($assmnt_date)) . '</td>                            <td>$ ' . number_format($paid, 2, '.', '') . '</td>                        </tr>';                }                ?>            </tbody>        </table>        </div>        <div class="error">*: All currency values are in <b>SGD</b>.</div>    <?php } else { ?>        <br>        <table class="table table-striped">            <tr class="danger">                <td colspan="10" style="color:red;text-align: center;">No data available.</td>            </tr>        </table>    <?php } ?>    <br>    <ul class="pagination pagination_style">        <?php echo $pagination; ?>    </ul></div>
=======
<script>    $siteurl = '<?php echo site_url(); ?>';    $baseurl = '<?php echo base_url(); ?>';</script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/reportwda.js"></script><div class="col-md-10">    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-list-alt"></span> Reports - WDA Report</h2>    <h5 class="sub_panel_heading_style"><span class="glyphicon glyphicon-search"></span> Search By</h5>    <div class="table-responsive">        <?php        $course_id = $this->input->get_post("courseId");        $class_id = $this->input->get_post("classId");        $trainee = $this->input->get_post("trainee_id");        $taxcode = $this->input->get_post("taxcode_id");        $start_date = $this->input->get_post("start_date");        $end_date = $this->input->get_post("end_date");        $atr = array('id' => 'wda_report_form', 'method' => 'get');        echo form_open("reports/wda", $atr);        ?>        <table class="table table-striped">            <tbody>                <tr>                    <td class="td_heading">Select Course Name:</td>                    <td><?php echo form_dropdown("courseId", $courses, $this->input->get('courseId'), 'id="courseId" style="width:200px;"') ?> </td>                    <td class="td_heading">Class Name:</td>                    <td colspan="3"><?php echo form_dropdown("classId", $classes, $this->input->get('classId'), 'id="classId"') ?> </td>                </tr>                <tr>                    <td class="td_heading">&nbsp;&nbsp;                        <?php                        $data = array(                            'id' => 'search_select',                            'class' => 'search_select',                            'name' => 'search_select',                            'value' => '1',                            'checked' => true                        );                        echo form_radio($data);                        ?>                        &nbsp;&nbsp;Trainee Name.:</td>                    <td>                        <?php                        $data = array(                            'id' => 'trainee',                            'name' => 'trainee',                            'class'=>'upper_case',                            'value' => $this->input->get('trainee')                        );                        echo form_input($data);                        $data = array(                            'id' => 'trainee_id',                            'name' => 'trainee_id',                            'type' => 'hidden',                            'value' => $this->input->get('trainee_id')                        );                        echo form_input($data);                        ?>                        <span id="trainee_err"></span>                    </td>                    <td class="td_heading">&nbsp;&nbsp;                        <?php                        $select = $this->input->get('search_select');                        $val = ($select == 2) ? true : false;                        $data = array(                            'id' => 'search_select',                            'class' => 'search_select',                            'name' => 'search_select',                            'value' => '2',                            'checked' => $val                        );                        echo form_radio($data);                        ?>                        &nbsp;&nbsp;NRIC/FIN No.:</td>                    <td colspan="3">                        <?php                        $data = array(                            'id' => 'taxcode',                            'name' => 'taxcode',                            'class'=>'upper_case',                            'value' => $this->input->get('taxcode')                        );                        echo form_input($data);                        $data = array(                            'id' => 'taxcode_id',                            'name' => 'taxcode_id',                            'type' => 'hidden',                            'value' => $this->input->get('taxcode_id')                        );                        echo form_input($data);                        ?>                        <span id="taxcode_err"></span>                    </td>                </tr>                <tr>                    <td class="td_heading">Class Start Date From:</td>                    <td><input type="text" name="start_date" id="start_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('start_date'); ?>"></td>                    <td class="td_heading">To:</td>                    <td colspan="2"><input type="text" name="end_date"  id="end_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('end_date'); ?>"></td>                    <td align="center"><button type="submit" class="btn btn-xs btn-primary no-mar"><span class="glyphicon glyphicon-search"></span> Search</button></td>                </tr>            </tbody>        </table>    </div>    <div style="clear:both;"><span id="search_error"></span></div><br/>        <?php    if (!empty($tabledata)) {        if (empty($start_date) && empty($end_date)) {            $period = ' for ' . date('F d Y, l');        } else {            $period = 'for the period';            if (!empty($start_date))                $period .= ' from ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $start_date)->getTimestamp());            if (!empty($end_date))                $period .= ' to ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $end_date)->getTimestamp());        }        if (!empty($course_id)) {            $period .= ' \'' . $courses[$course_id] . '\'';        }        if (!empty($class_id)) {            $period .= ' \'' . $classes[$class_id] . '\'';        }        if (!empty($trainee_name)) {            $period .= ' \'' . $trainee_name->first . ' ' . $trainee_name->last . ' ' . $trainee_name->tax_code . '\'';        }        ?>        <div class = "panel-heading panel_headingstyle" style = "width:100%;"><strong>WDA Report <?php echo $period ?></strong></div>        <br>        <?php         if((courseId!="Select") || ($taxcode!="") || ($start_date !='' && $end_date !='')|| ($trainee!=""))         {        ?>        <span class="pull-right" style='margin: 10px;'>            <a href="<?php echo site_url('/reports/wda_export_xls') . '?' . $_SERVER['QUERY_STRING']; ?>" class="small_text1" onclick="return exportValidates()">                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;            <a href="<?php echo site_url('/reports/report_wda_pdf') . '?' . $_SERVER['QUERY_STRING']; ?>"  class="small_text1" onclick="return exportValidates()">                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>        </span>         <?php }else { ?>        <div class="pull-right" style='margin: 10px;'>            <a href="javascript:void(0)" class="small_text1" id='displayText'>                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;            <a href="javascript:void(0)"  class="small_text1" id='displayText1'>                <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>        </div>         <div id="alertmsg" style="padding:5px;clear:both;display:none" class='alert alert-danger'>Please Select One of the above filter to export PDF/XLS.</div>         <?php } ?>        <br><br>        <div class="table-responsive">        <table class="table table-striped">            <thead>                <?php                $ancher = (($sort_order == 'asc') ? 'desc' : 'asc');                $pageurl = $controllerurl;                ?>                <tr>                    <th width="10%" class="th_header">NRIC/FIN No.</th>                    <th width="15%" class="th_header text_move">Trainee Name</th>                    <th width="15%" class="th_header text_move">Company Name</th>                    <th width="10%" class="th_header text_move">Account Type</th>                    <th width="15%" class="th_header text_move">Home Address</th>                    <th width="10%" class="th_header">Contact Details</th>                    <th width="10%" class="th_header">Course Name</th>                    <th width="10%" class="th_header">Class Start Date</th>                    <th width="10%" class="th_header">Assessment Date</th>                    <th width="10%" class="th_header">Amount Paid</th>                </tr>            </thead>            <tbody>                <?php                foreach ($tabledata as $data) {                    $paid = ($data->payment_status == 'PAID') ? $data->total_amount_due : 0;                    $assmnt_date = empty($data->exam_date) ? $data->class_end_datetime : $data->exam_date;                    echo '<tr>                            <td>' . $data->tax_code . '</td>                            <td>' . $data->first_name . ' ' . $data->last_name . '</td>                            <td>' . $data->company_name . '</td>                            <td>' . $meta_map[$data->account_type] . '</td>                            <td>' . $data->personal_address_bldg . ' ' . $data->personal_address_city . ' ' . $meta_map[$data->personal_address_state] . ' ' . $meta_map[$data->personal_address_country] . '</td>                            <td>' . $data->registered_email_id . ' ' . $data->contact_number . '</td>                            <td>' . $data->crse_name . '</td>                            <td>' . date('d/m/Y', strtotime($data->class_start_datetime)) . '</td>                            <td>' . date('d/m/Y', strtotime($assmnt_date)) . '</td>                            <td>$ ' . number_format($paid, 2, '.', '') . '</td>                        </tr>';                }                ?>            </tbody>        </table>        </div>        <div class="error">*: All currency values are in <b>SGD</b>.</div>    <?php } else { ?>        <br>        <table class="table table-striped">            <tr class="danger">                <td colspan="10" style="color:red;text-align: center;">No data available.</td>            </tr>        </table>    <?php } ?>    <br>    <ul class="pagination pagination_style">        <?php echo $pagination; ?>    </ul></div><script>function exportValidates(){        if(validates(true)){            return true;        }else{            return false;        }    }    function validates(retval) {        var courseId = $('#courseId').val().trim();        var trainee = $('#trainee').val().trim();        var taxcode = $('#taxcode').val().trim();        var start_date = $('#start_date').val().trim();        var end_date = $('#end_date').val().trim();        if(courseId == '' && trainee == '' && taxcode == ''&& (start_date == '' || end_date == '')){                $('#search_error').addClass('error').text('Oops!..Please select atleast one filter to perform search operation');                retval = false;            }else{                $('#search_error').removeClass('error').text('');        }        return retval;    }</script>
>>>>>>> testing
