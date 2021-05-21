  
<div class="col-md-10">
    <h2 class="panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/course.png"> Add Course Run Details</h2>   
    <h2 class="sub_panel_heading_style">COURSE</h2>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td class="td_heading" width="20%">Course Reference Number:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo $coursedetails->reference_num; ?></label></td>
                <td class="td_heading">TP UEN:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo $tenant->comp_reg_no; ?></td>
            </tr>
        </tbody>
    </table> 
    
    <h2 class="sub_panel_heading_style">RUN</h2>
    
     <table class="table table-striped">
        <tbody>
            <tr>
                <td width="20%" class="td_heading">Mode Of Training:<span class="required">*</span></td>
                <td>
                    <select name="modeoftraining" id="modeoftraining">
                        <option value="" selected="selected">Please Choose</option>
                        <option value="1">Classroom</option>
                        <option value="2">Asynchronous eLearning</option>
                        <option value="3">In-house</option>
                        <option value="4">On-the-Job</option>
                        <option value="5">Practical / Practicum</option>
                        <option value="6">Supervised Field</option>
                        <option value="7">Traineeship</option>
                        <option value="8">Assessment</option>
                        <option value="9">Synchronous eLearning</option>
                    </select>
                    
                    <span id="modeoftraining_err"></span>
                
                </td>
                <td colspan="2"> <label class="label_font"></label>
                    <div style='color:grey'>(Mode of training code - Code Description,1 Classroom,2 Asynchronous eLearning,3 In-house,4 On-the-Job,5 Practical / Practicum,6 Supervised Field,7 Traineeship,8 Assessment,9 Synchronous eLearning)</div>
                </td>
            </tr>

            <tr>
                <td class="td_heading">Course Admin Email:<span class="required">*</span></td>
                    <td>
                    <label class="label_font">
                        <?php
                        $crs_admin_email = array(
                            'name' => 'crs_admin_email',
                            'id' => 'crs_admin_email',
                            'value' => '',
                            'maxlength' => 50,
                            "class" => "upper_case"
                        );
                        echo form_input($crs_admin_email);
                        ?>
                    </label>
                    </td>
                <td colspan="2"> <label class="label_font"></label>
                    <div style='color:grey'>Course admin email is under course run level that can be received the email from 'QR code Attendance Taking','Course Attendance with error' and 'Trainer information not updated'</td></div>
            </tr>

            <tr>
                <td class="td_heading">Registration Open Date:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('Ymd', strtotime($class->class_start_datetime)); ?></td>
                <td class="td_heading">Registration Close Date:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('Ymd', strtotime($class->class_end_datetime)); ?></td>
            </tr>

            <tr>
                <td class="td_heading">Course Start Date:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('Ymd', strtotime($class->class_start_datetime)); ?></td>
                <td class="td_heading">Course End Date:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('Ymd', strtotime($class->class_end_datetime)); ?></td>
            </tr>

            <tr>
                <td class="td_heading">Schedule Info Code:<span class="required">*</span></td>
                <td><label class="label_font">01</label></td>
                <td class="td_heading">Schedule Info Description:<span class="required">*</span></td>
                <td><label class="label_font">Description</label></td>                        
            </tr>

            <tr>
                <td class="td_heading">Schedule Info:<span class="required">*</span></td>
                <td colspan='3'><label class="label_font"><?php echo date('d/m/Y h:i A', strtotime($class->class_start_datetime)).' - '.date('d/m/Y h:i A', strtotime($class->class_end_datetime)).' / '.date('D', strtotime($class->class_start_datetime)); ?></label></td>
            </tr>

            <tr>
                <td class="td_heading">Classroom Venue(TMS):</td>
                <td colspan='3'><?php echo rtrim($ClassLoc, ', '); ?></td>
            </tr>
            
            <tr>                        
                <td class="td_heading"> Venue Floor:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                        <?php
                        $venue_floor = array(
                            'name' => 'venue_floor',
                            'id' => 'venue_floor',
                            'value' => '',
                            'maxlength' => 50,
                            "class" => "upper_case"
                        );
                        echo form_input($venue_floor);
                        ?>
                    </label>
                </td>
                <td class="td_heading">Venue Unit:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                    <?php
                    $venue_unit = array(
                        'name' => 'venue_unit',
                        'id' => 'venue_unit',
                        'value' => '',
                        'maxlength' => 50,
                        "class" => "upper_case"
                    );
                    echo form_input($venue_unit);
                    ?>
                    </label>
                </td>
            </tr>

            <tr>                        
                <td class="td_heading">Venue Postal Code:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                    <?php
                    $venue_postalcode = array(
                        'name' => 'venue_postalcode',
                        'id' => 'venue_postalcode',
                        'value' => '',
                        'maxlength' => 50,
                        "class" => "upper_case"
                    );
                    echo form_input($venue_postalcode);
                    ?>
                    </label>
                </td>
                <td class="td_heading">Venue Room:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                    <?php
                    $venue_room = array(
                        'name' => 'venue_room',
                        'id' => 'venue_room',
                        'value' => '',
                        'maxlength' => 50,
                        "class" => "upper_case"
                    );
                    echo form_input($venue_room);
                    ?>
                    </label>
                </td>
            </tr>

            <tr>                        
                <td class="td_heading">Course Intake Size:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo $class->total_seats; ?></td>
                <td colspan="2"> <label class="label_font"></label>Course run intake size. It's maximum pax for a class</td>
            </tr>

            <tr>                        
                <td class="td_heading">Course Vacancy Code:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                        <?php 
                        if($booked_seats >= $class->total_seats){
                            echo "F";
                        }elseif($booked_seats < $class->total_seats && $booked_seats > ($class->total_seats/2)){
                            echo "L";
                        }elseif($booked_seats < $class->total_seats && $booked_seats < ($class->total_seats/2)){
                            echo "A";
                        }
                        ?>
                    </label>
                    <div style='color:grey'>A  - Available ,F  - Full, L  - Limited Vacancy</div>
                </td>
                <td class="td_heading">Course Vacancy Description:<span class="required">*</span></td>
                <td>
                    <label class="label_font">
                    <?php 
                        if($booked_seats >= $class->total_seats){
                            echo "Full";
                        }elseif($booked_seats < $class->total_seats && $booked_seats > ($class->total_seats/2)){
                            echo "Limited Vacancy";
                        }elseif($booked_seats < $class->total_seats && $booked_seats < ($class->total_seats/2)){
                            echo "Available";
                        }
                        ?>
                                
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
    
    <h2 class="sub_panel_heading_style">SESSION</h2>
    
    <table class="table table-striped">
        <tbody>
            <tr>                        
                <td class="td_heading" width="20%">Session Start Date:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo date('Ymd', strtotime($class->class_start_datetime)); ?></label></td>
                <td class="td_heading">Session End Date:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('Ymd', strtotime($class->class_end_datetime)); ?></td>
            </tr>

            <tr>                        
                <td class="td_heading">Session Start Time:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo date('h:i A', strtotime($class->class_start_datetime)); ?></label></td>
                <td class="td_heading">Session End Time:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo date('h:i A', strtotime($class->class_end_datetime)); ?></td>
            </tr>

            <tr>                        
                <td class="td_heading">Session Venue Floor:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo rtrim($LabLoc, ', '); ?></label></td>
                <td class="td_heading">Session Venue Unit:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo rtrim($LabLoc, ', '); ?></td>
            </tr>

            <tr>                        
                <td class="td_heading">Session Venue Postal Code:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo $course_data->competency_code; ?></label></td>
                <td class="td_heading">Session Venue Room:<span class="required">*</span></td>
                <td><label class="label_font"></label><?php echo rtrim($LabLoc, ', '); ?></td>
            </tr>
        </tbody>
    </table>

    
    <h2 class="sub_panel_heading_style">TRAINER</h2>
    <?php foreach($ClassTrainer as $trainer){?>
    <table class="table table-striped">
        <tbody>
            <tr>                        
                <td class="td_heading" width="20%">Trainer Name:<span class="required">*</span></td>
                <td width='40%'><label class="label_font"><?php echo $trainer->first_name.' '.$trainer->last_name; ?></label></td>
                <td class="td_heading">Trainer Email:<span class="required">*</span></td>
                <td><label class="label_font"><?php echo $trainer->registered_email_id;?></label></td>
            </tr>


            <tr>                        
                <td class="td_heading">Trainer Type Code:<span class="required">*</span></td>
                <td><label class="label_font">1</label>
                    <div style='color:grey'>1-(Existing) ,2-(New)</div>
                </td>
                <td class="td_heading" width="13%">Trainer Description:<span class="required">*</span></td>
                <td><label class="label_font"></label></td>
            </tr>

            <tr>                        
                <td class="td_heading">inTrainingProviderProfile:<span class="required">*</span></td>
                <td><label class="label_font">True</label>
                    <div style='color:grey'>For trainerType as "1-Existing" trainer, fill up the Trainer name, email and leave the rest of the Trainer fields empty. API will get the details from the TP Profile,For trainerType as "2-New" trainer, please fill in all required details. If inTrainingProviderProfile is set to "true", the new added trainer will be saved into trainer profile as well as linked to this specific course run; otherwise, this trainer is linked to this specific course run only.</div>
                </td>
                <td class="td_heading">Trainer ID:<span class="required">*</span></td>
                <td><label class="label_font"></label>
                <div style='color:grey'>The unique Trainer id for existing trainer. For new trainer, leave it blank.</div>
                </td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>