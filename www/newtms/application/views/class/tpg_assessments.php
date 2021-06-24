<script>
    $siteurl = '<?php echo site_url(); ?>';
    $baseurl = '<?php echo base_url(); ?>';
    $role_check = '<?php echo $this->data['user']->role_id; ?>';
    $tenant_id = '<?php echo $this->data['user']->tenant_id; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tpg_assessment.js?11111.00000"></script>
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
    <h2 class="panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/class-trainee.png"/> TPG Assessment Trainee Lists</h2>
    <?php
    $atr = 'id="search_form" name="search_form" method="get"';
    echo form_open("classes/tpg_assessments", $atr);
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
                    </td>
                </tr>
                <tr>
                    <td class="td_heading">Trainee NRIC:</td>
                    <td colspan='3'>
                        <?php
                        $options = array();
                        $options[''] = 'Select';
                        foreach ($classes as $k => $v) {
                            $options[$k] = $v;
                        }
                        $js = 'id="nric" ';
                        echo form_dropdown('nric', $options, $this->input->get('nric'), $js);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <span class="pull-right">
                            <button type="submit" value="Search" class="btn btn-xs btn-primary no-mar" title="Search" /><span class="glyphicon glyphicon-search"></span> Search</button>
                        </span>
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div><br>
    
    <?php echo form_close(); ?>
    <?php ?>
    <div class="bs-example">
        <div class="table-responsive">
            <div style="clear:both;"></div>
            <table class="table table-striped">
                <thead>
                    <?php
                    $ancher = (($sort_order == 'asc') ? 'desc' : 'asc');
                    $pageurl = 'class_trainee';
                    ?>
                    <tr>
                        <th width="9%" class="th_header">NRIC/FIN No</th>
                        <th width="10%" class="th_header">Full Name</th>
                        <th width="15%" class="th_header">Assessment Date</th>
                        <th width="10%" class="th_header">Skill Code</th>
                        <th width="6%" class="th_header">Feedback Score</th>
                        <th width="12%" class="th_header">Feedback Grade</th>
                        <th width="6%" class="th_header">Result</th>
                        <th width="10%" class="th_header">Course Ref No</th>
                        <th width="9%" class="th_header">CourseRunID</th>
                        <th width="13%" class="th_header">TPG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $err_msg = 'There are no trainees enrolled to any class currently.';
                    if (!empty($_GET)) {
                        $err_msg = 'No data available for the search criteria entered.';
                    }
                    if (!empty($tabledata)) {
                        foreach ($tabledata as $row) {
                          
                            ?>
                                                                              
                            <tr>                        
                                <td><?php echo $row['taxcode']; ?></td>

                                <td class="name"><?php echo $row->fullname; ?></td>
                                <td><?php echo $row->assessmentDate; ?></td>
                                <td><?php echo $row->skillCode; ?></td>
                                <td><?php echo $row->feedback_score ?></td>
                                <td><?php echo $row->feedback_grade; ?></td>
                                <td><?php echo $row->result; ?></td>
                                <td><?php echo $row->reference_num; ?></td>
                                <td><?php echo $row->tpg_course_run_id; ?></td>
                                <td>
                                   
                                    <a href="<?php echo base_url() . 'tp_gateway/create_assessment/' . $enrolmentReferenceNumber; ?>" class="small_text1"><span class="label label-default black-btn"><span class="glyphicon glyphicon-search"></span>Create Asessment</span></a>
                                    <br>
                                    <a href="<?php echo base_url() . 'tp_gateway/edit_enrolment_tpg/' . $enrolmentReferenceNumber; ?>" class="small_text1"><span class="label label-default black-btn"><span class="glyphicon glyphicon-retweet"></span>Update/Void Asessment</span></a>
                                    <br>
                                    <a href="<?php echo base_url() . 'tp_gateway/edit_enrolment_tpg/' . $enrolmentReferenceNumber; ?>" class="small_text1"><span class="label label-default black-btn"><span class="glyphicon glyphicon-retweet"></span>View Asessment</span></a>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        $err_msg = $error_msg ? $error_msg : $err_msg; /// added by shubhranshu to remove the classtrainee list on 26/11/2018
                        echo '<tr><td colspan="11" class="error" style="text-align: center">' . $err_msg . '</td></tr>';
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
<?php
$atr = 'id="update_fee" name="update_fee" method="post"';
echo form_open("tp_gateway/update_fee_collection_tpg", $atr);
?>
<div class="modal1_0001" id="abd" style="display:none;height:200px;min-height: 200px;">
    <h2 class="panel_heading_style">Update Fee Collection Status</h2>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td class="td_heading">Fee Collection Status:</td>
                <td>
                    <?php $enrolmentReferenceNumber = "ENR-2103-001256"; ?>
                    <input type="hidden" name="tpgCourseId" value="<?php echo $row['course_id']; ?>" id="tpgCourseId">
                    <input type="hidden" name="tpgClassId" value="<?php echo $row['class_id']; ?>" id="tpgClassId">
                    <input type="hidden" name="tpgEnrolmentReferenceNumber" value="<?php echo $enrolmentReferenceNumber; ?>" id="tpgEnrolmentReferenceNumber">
                    <?php                    
                    $fee_collectionStatus_attr = 'id="fee_collectionStatus"';
                    echo form_dropdown('fee_collectionStatus', $feecollectionStatus, '', $fee_collectionStatus_attr);
                    ?>
                    <span id="fee_collection_err"></span>
                </td>
            </tr>
        </tbody>
    </table>
    <span class="required required_i">* Required Fields</span>
    <div class="popup_cance89">
        <span href="#abd" rel="modal:close"><button class="btn btn-primary enrollment_fee_save" type="submit">Submit</button></span>
    </div>
</div>
<script>
    $(document).ready(function() {
            var check = 0;
            $('#update_fee').submit(function() {
                check = 1;
                return validateFee(true);
            });
            $('#update_fee select').change(function() {
                if (check == 1) {
                    return validateFee(false);
                }
            });
        });
        
        function validateFee(retVal) {
            fee_status = $.trim($("#fee_collectionStatus").val());
            if (fee_status == "") {
                $("#fee_collection_err").text("[required]").addClass('error');
                $("#fee_collection_err").addClass('error');
                retVal = false;
            } else {
                $("#fee_collection_err").text("").removeClass('error');
                $("#fee_collection_err").removeClass('error');
                retVal = true;
            }
            return retVal;
        }
</script>
<?php echo form_close(); ?>
</div>

