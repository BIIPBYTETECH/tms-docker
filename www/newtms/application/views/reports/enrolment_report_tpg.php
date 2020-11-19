<script>
    $siteurl = '<?php echo site_url(); ?>';
    $baseurl = '<?php echo base_url(); ?>';
    $role_check = '<?php echo $this->data['user']->role_id; ?>';
    $tenant_id = '<?php echo $this->data['user']->tenant_id; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/classtraineelist.js"></script>
<style>
    table td{
        font-size: 11px;
    }
</style>
<div class="col-md-10">
    <?php
    $class_status = $this->input->get('class_status');
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error1">' . $this->session->flashdata('error') . '</div>';
    }
    ?>
    <h2 class="panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/class-trainee.png"/> Enrolment Report TPG</h2>
    <?php
    $atr = 'id="search_form" name="search_form" method="get"';
    echo form_open("reports/enrolment_report_for_tpg", $atr);
    ?>  
    <div class="table-responsive">
        <h5  class="sub_panel_heading_style"><span class="glyphicon glyphicon-search"></span> Search By</h5>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <td class="td_heading">Course Name:</td>
                    <td colspan="3">
                        <?php
                        $options = array();
                        $options[''] = 'Select';
                       
                        foreach ($courses as $k => $v) {
                            $options[$k] = $v;
                        }
                         
                        $js = 'id="course" ';
                        echo form_dropdown('course', $options, $this->input->get('course'), $js);
                        ?>
                        <span class="course_err"></span>
                    </td>                    
                </tr>                
                <tr>
                    <td class="td_heading">Class Name:</td>
                    <td colspan='3'>
                        <?php
                        $options = array();
                        $options[''] = 'Select';
                        foreach ($classes as $k => $v) {
                            $options[$k] = $v;
                        }
                        $js = 'id="class" ';
                        echo form_dropdown('class', $options, $this->input->get('class'), $js);
                        ?>
                        <span class="class_err"></span>
                    </td>
                    <td>
                    <span class="pull-right">
                            <button type="button" value="Search" class="srch_btn btn btn-xs btn-primary no-mar" title="Search" /><span class="glyphicon glyphicon-search"></span> Search</button>
                        </span>
                    </td>
                </tr>
               
               
            </tbody>
        </table>
    </div><br>
    <div class="bs-example">
        <div class="table-responsive">
            

            <?php if (count($tabledata) > 0) { ?>                    
                <div class="add_button98 pull-right">
                    <a href="<?php echo base_url(); ?>reports/export_enrolment_report_for_tpg<?php echo $export_url; ?>" class="small_text1" onclick="return exportValidate()">
                        <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export To XLS</span>
                    </a> &nbsp;&nbsp; 
                    
                </div>                  
            <?php } ?>
        </div>

    </div>
    <?php echo form_close(); ?>
    <?php ?>
    <div class="bs-example">
        <div class="table-responsive">
            <div style="clear:both;"></div>
            <table class="table table-striped">
                <thead>
                   
                    <tr>
                        <th width="5%" class="th_header">Trainee ID Type</th>
                        <th width="5%" class="th_header">Trainee ID</th>
                        <th width="5%" class="th_header">Date Of Birth</th>
                        <th width="5%" class="th_header">Trainee Name</th>
                        <th width="5%" class="th_header">Course Run</th>
                        <!--<th width="5%" class="th_header">Trainee Email</th>-->
                        <th width="5%" class="th_header">Trainee Phone Country Code</th>
                        <th width="5%" class="th_header">Trainee Phone Area Code</th>
                        <th width="5%" class="th_header">Trainee Phone</th>
                        <th width="5%" class="th_header">Sponsorship Type</th>
                        
                        <th width="5%" class="th_header">Employer UEN</th>
                        <th width="5%" class="th_header">Employer Contact Name</th>
                        <th width="5%" class="th_header">Employer Phone Country Code</th>
                        <th width="5%" class="th_header">Employer Phone Area Code</th>
                        <th width="5%" class="th_header">Employer Phone</th>
                        <th width="15%" class="th_header">Employer Contact Email</th>
                        <th width="5%" class="th_header">Course Fee Discount Amount</th>
                        <!--<th width="5%" class="th_header">Fee Collection Status</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $err_msg = 'There are no trainees enrolled to any class currently.';
                    if (!empty($_GET)) {
                        $err_msg = 'No data available for the search criteria entered.';
                    }
                    if (!empty($tabledata)) 
                    {
                        foreach ($tabledata as $row) 
                        {   
                            ?>
                        <tr>
                            <td><?php echo $row->TraineeIDType;?></td>
                            <td><?php echo $row->TraineeID ;?></td>
                            <td><?php echo $row->DateofBirth;?></td>
                            <td><?php echo $row->TraineeName ;?></td>
                            <td><?php echo $row->CourseRun ;?></td>
                            <!--<td><?php //echo $row->TraineeEmail ;?></td>-->
                            <td><?php echo $row->TraineePhoneCountryCode;?></td>
                            <td><?php echo $row->TraineePhoneAreaCode;?></td>
                            <td><?php echo $row->TraineePhone;?></td>
                            <td><?php echo $row->SponsorshipType;?></td>
                            <td><?php echo $row->EmployerUEN;?></td>
                            <td><?php echo $row->EmployerContactName;?></td>
                            <td><?php echo $row->EmployerPhoneCountryCode;?></td>
                            <td><?php echo $row->EmployerPhoneAreaCode;?></td>
                            <td><?php echo $row->EmployerPhone;?></td>
                            <td><?php echo $row->EmployerContactEmail;?></td>
                            <td><?php echo $row->CourseFeeDiscountAmount;?></td>
                            <!--<td><?php //echo $row['Fee Collection Status'] ;?></td>-->
                        </tr>
                       <?php }
                    } 
                    else 
                    {
                        $err_msg=$error_msg ? $error_msg : $err_msg;/// added by shubhranshu to remove the classtrainee list on 26/11/2018
                        echo '<tr><td colspan="17" class="error" style="text-align: center">' . $err_msg . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="clear:both;"></div><br>
        <ul class="pagination pagination_style">
            <?php echo $pagination; ?>
        </ul>
    </div>
</div>
</div>

<script>
      $('#search_form').on('submit',function() {
        form_check = 1;
        //alert("form click");
        var status=form_validate(true);//alert(status);
        if(status){
        var self = $(this),
        button = self.find('input[type="submit"],button'),
        submitValue = button.data('submit-value');
        button.attr('disabled','disabled').html('Please Wait..');
        return true;
       }else{
           return false;
       }
    });  
    
    $('.srch_btn').click(function(){
        if($('#course').val()== ''){
            $('.course_err').html('<span style="color:red">[required]</span>');
            $status = 0;
        }else{
            $('.course_err').html('');
            $status = 1;
        }
        if($('#class').val()== ''){
             $('.class_err').html('<span style="color:red">[required]</span>');
             $status = 0;
        }else{
            $('.class_err').html('');
            $status = 1;
        }
        
        if($status == 1){
            $('#search_form').submit();
        }
    });
    
 </script>
    