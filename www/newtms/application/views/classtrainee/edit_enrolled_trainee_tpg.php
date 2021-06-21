<script>
    $siteurl = '<?php echo site_url(); ?>';
    $baseurl = '<?php echo base_url(); ?>';
</script>

<div class="col-md-10 right-minheight">
    <?php echo validation_errors('<div class="error1">', '</div>'); ?> 
    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-list-alt"></span> TPG Trainee Enrolled Details</h2>
    <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span>Update Enrollment Details</h2>
    <form action="<?php echo base_url(); ?>tp_gateway/update_cancel_enrolment_tpg" method="post" name ="update_cancel_form" id ="update_cancel_form">
        <div class="table-responsive">
            <?php
            $tenant_id = $this->session->userdata('userDetails')->tenant_id;
            ?>  
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="4">                            
                            <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Trainee Details</h2>
                        </td>                           
                    </tr>
                    <tr class="change_span" style="">
                        <td>                    
                            <b>Enrollment Reference No. :<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="referenceNumber" id="referenceNumber" style="" value='<?php echo $referenceNumber; ?>' disabled="disabled"/>
                            <span id="referenceNumber_err"></span>
                        </td> 

                        <td>
                            <b>Status:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="status" id="status" style="" value='<?php echo $status; ?>' disabled="disabled"/>
                            <span id="status_err"></span>
                        </td>
                    </tr>

                    <tr class="change_span" style="">
                        <td>                    
                            <b>NRIC/FIN No.:<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="nric" id="nric" style="" value='<?php echo $traineeId; ?>' disabled="disabled"/>
                            <span id="nric_err"></span>
                        </td> 

                        <td>
                            <b>Full Name.:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="fullname" id="fullname" style="" value='<?php echo $traineeFullName; ?>' disabled="disabled"/>
                            <span id="fullname_err"></span>
                        </td>
                    </tr>

                    <tr class="change_span" style="">
                        <td>                    
                            <b>Trainee DOB.:<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="change_taxcode_autocomplete" id="dob" style="" value='<?php echo $traineeDateOfBirth; ?>' disabled="disabled"/>
                            <span id="dob_err"></span>
                        </td> 

                        <td>
                            <b>Trainee Cont. No.:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="fullname" id="contactno" style="" value='<?php echo $traineeContactNumber; ?>' />
                            <span id="contactno_err"></span>
                        </td>
                    </tr>

                    <tr class="change_span" style="">
                        <td>                    
                            <b>Trainee Email.:<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="temail" id="temail" style="" value='<?php echo $traineeEmailAddress; ?>'/>
                            <span id="temail_err"></span>
                        </td> 

                        <td>
                            <b>Trainee Type.:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="traineeIdType" id="traineeIdType" style="" value='<?php echo $traineeIdType; ?>' disabled="disabled"/>
                            <span id="traineeIdType_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Sponsorship Type:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="traineeSponsorshipType" id="traineeSponsorshipType" style="" value='<?php echo $traineeSponsorshipType; ?>' disabled="disabled"/>
                            <span id="traineeSponsorshipType_err"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Training Partner Details</h2>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Training Partner Code:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="tpcode" id="tpcode" style="" value='<?php echo $trainingPartnerCode; ?>' disabled="disabled"/>
                            <span id="tpcode_err"></span>
                        </td>
                        <td class="td_heading" width="15%">Training Partner UEN:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="tpuen" id="tpuen" style="" value='<?php echo $trainingPartnerUEN; ?>' disabled="disabled"/>
                            <span id="tpuen_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Training Partner Name:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="tpname" id="tpname" style="" value='<?php echo $trainingPartnerName; ?>' disabled="disabled"/>
                            <span id="tpname_err"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Course Details</h2>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading">Course Reference No.:<span class="required">*</span></td>
                        <td>                       
                            <input type="text" name="course" id="crefno" style="" value='<?php echo $courseReferenceNumber; ?>' disabled="disabled"/>
                            <span id="crefno_err"></span>
                        </td>
                        <td class="td_heading" width="15%">Course RunID:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="courseRunId" id="courseRunId" style="" value='<?php echo $courseRunId; ?>' />
                            <span id="crunid_err"></span>
                        </td>
                    </tr>                
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Course Title:<span class="required">*</span></td>
                        <td colspan="3">
                            <input type="text" name="course_title" id="course_title" value='<?php echo $courseTitle; ?>' disabled="disabled"/>
                            <span id="course_title_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Start Date:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="course_start_date" id="course_start_date" value='<?php echo $courseStartDate; ?>' disabled="disabled"/>
                            <span id="course_start_date_err"></span>
                        </td>
                        <td class="td_heading" width="15%">End Date:<span class="required">*</span></td>
                        <td>
                            <input type="text" name="course_end_date" id="course_end_date" value='<?php echo $courseEndDate; ?>' disabled="disabled"/>
                            <span id="course_end_date_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Discount Amount:<span class="required">*</span></td>
                        <td colspan="3">
                            <input type="text" name="discount_amount" id="discount_amount" value='<?php echo $feeDiscountAmount; ?>' />

                            <span id="discount_amount_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Collection Status:<span class="required">*</span></td>
                        <td colspan="3">
                            <?php
                            $attr = 'id="feeCollectionStatus"';
                            echo form_dropdown('feeCollectionStatus', $feeCollectionStatus_options, $feeCollectionStatus, $attr);
                            ?>
                            <span id="class_type_err"></span>
                            <?php echo form_error('feeCollectionStatus', '<div class="error">', '</div>'); ?>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td class="td_heading" width="15%">Enrollment Date:<span class="required">*</span></td>
                        <td colspan="3">
                            <input type="date" name="enrolment_date" id="enrolment_date" value='<?php echo $traineeEnrolmentDate; ?>' disabled="disabled"/>
                            <span id="enrolment_date_err"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Employer Details</h2>
                        </td>
                    </tr>
                    <tr class="change_span" style="">
                        <td>                    
                            <b>Employer Name.:<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="employerName" id="employerName" style="" value='<?php echo $employerName; ?>' disabled="disabled"/>
                            <span id="ename_err"></span>
                        </td> 

                        <td>
                            <b>Employer UEN.:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="employerUEN" id="employerUEN" style="" value='<?php echo $employerUEN; ?>' disabled="disabled"/>
                            <span id="employerUEN_err"></span>
                        </td>
                    </tr>
                    <tr class="change_span" style="">
                        <td>                    
                            <b>Contact Name.:<span class="required">*</span></b> 
                        </td>   
                        <td>
                            <input type="text" name="employerContactFullName" id="employerContactFullName" style="" value='<?php echo $employerContactFullName; ?>' />
                            <span id="employerContactFullName_err"></span>
                        </td> 

                        <td>
                            <b>Contact No.:<span class="required">*</span></b> 
                        </td>
                        <td> 
                            <input type="text" name="employerContactNumber" id="employerContactNumber" style="" value='<?php echo $employerContactNumber; ?>' />
                            <span id="employerContactNumber_err"></span>
                        </td>
                    </tr>
                    <tr class="change_span" style="">
                        <td>                    
                            <b>Employer Email.:<span class="required">*</span></b>
                        </td>   
                        <td>
                            <input type="text" name="employerEmailAddress" id="employerEmailAddress" style="" value='<?php echo $employerEmailAddress; ?>' />
                            <span id="employerEmailAddress_err"></span>
                        </td>
                    </tr>
                    <tr class="new_span">
                        <td colspan="4" class="no-bg">
                            <div class="push_right">
                                <input type="hidden" name="enrolmentReferenceNumber" value="<?php echo $enrolmentReferenceNumber; ?>" id="enrolmentReferenceNumber">
                                <button type="submit" value="Submit" class="btn btn-xs btn-primary no-mar" title="Submit" />Update To TPG</button>
                            </div>
                        </td>
                    </tr>                
                </tbody>
            </table>        
        </div>
    </form>
</div>
<!-- end abdulla -->