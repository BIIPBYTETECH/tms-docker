<script>
    $siteurl = '<?php echo site_url(); ?>';
    $baseurl = '<?php echo base_url(); ?>';
</script>

<div class="col-md-10 right-minheight">
    <?php echo validation_errors('<div class="error1">', '</div>'); ?> 
    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-list-alt"></span> TPG Course Session Attendance</h2>
    <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Course Session Attendance Details</h2>
    <div class="table-responsive">
        <?php
        $tenant_id = $this->session->userdata('userDetails')->tenant_id;
        ?>  
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td colspan="4">                            
                        <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Course Details</h2>
                    </td>                           
                </tr>
                <tr class="change_span" style="">
                    <td>                    
                        <b>Course Title. :<span class="required">*</span></b> 
                    </td>   
                    <td>
                        <?php echo $title; ?>
                    </td> 

                    <td>
                        <b>Coure Reference Number:<span class="required">*</span></b> 
                    </td>
                    <td> 
                        <?php echo $referenceNumber; ?>
                    </td>
                </tr>

                <tr class="change_span" style="">
                    <td>                    
                        <b>Course Run ID:<span class="required">*</span></b> 
                    </td>   
                    <td>
                        <?php echo $courseRunId; ?>
                    </td> 

                    <td>
                        <b>External Reference Number.:<span class="required">*</span></b> 
                    </td>
                    <td> 
                        <?php echo $externalReferenceNumber; ?>
                    </td>
                </tr>

                <tr class="change_span" style="">
                    <td>                    
                        <b>Course Start Date.:<span class="required">*</span></b> 
                    </td>   
                    <td>
                        <?php echo $courseStartDate; ?>
                    </td> 

                    <td>
                        <b>Course End Date:<span class="required">*</span></b> 
                    </td>
                    <td> 
                        <?php echo $courseEndDate; ?>
                    </td>
                </tr>
                <tr class="change_span" style="">
                    <td>                    
                        <b>Mode of Training.:<span class="required">*</span></b> 
                    </td>   
                    <td>
                        <?php echo $modeOfTraining; ?>
                    </td>                    
                </tr> 
                <tr>
                    <td colspan="4">                            
                        <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Session Details</h2>
                    </td>                           
                </tr>
                <tr class="new_span">
                    <td class="td_heading" width="15%">Session ID:<span class="required">*</span></td>
                    <td colspan="3">
                        <?php echo $sessionId; ?>
                    </td>
                </tr> 
                <tr class="new_span">
                    <td class="td_heading" width="15%">Session Start Date & Time:<span class="required">*</span></td>
                    <td>
                       <?php echo $sessionStartDate . ' ' . $sessionStartTime; ?>
                    </td>
                    <td class="td_heading" width="15%">Session End Date & Time:<span class="required">*</span></td>
                    <td>
                        <?php echo $sessionEndDate . ' ' . $sessionEndTime; ?>
                    </td>
                </tr>                               
                <tr>
                    <td colspan="4">                            
                        <h2 class="sub_panel_heading_style"><span class="glyphicon glyphicon-th-list"></span> Venue Details</h2>
                    </td>                           
                </tr>
                <tr class="new_span">
                    <td class="td_heading">Venue:<span class="required">*</span></td>
                    <td>                        
                        <?php echo $venueBlock . ' ' . $venueBuilding.' Floor : '.$venueFloor.' '.$venuePostalCode; ?>
                        ,</br>                        
                        <?php echo $venueRoom. ' ' .$venueStreet.' Unit : '.$venueUnit; ?>                                                
                    </td>                                    
                </tr>
                <tr class="new_span">
                    <td class="td_heading" width="15%">Wheel Chair Access<span class="required">*</span></td>
                    <td colspan="3">
                        <?php
                        if ($venueWheelChairAccess) {
                            echo "Yes";
                        } else {
                            echo "No";
                        }
                        ?>
                        <span id="tpcode_err"></span>
                    </td>
                </tr> 
                <tr class="new_span">
                    <td colspan="4" class="no-bg">
                        <div class="push_right">
                            <a href="<?php echo base_url() . 'class_trainee'; ?>" class="small_text1"><span class="label label-default black-btn">Back</span></a>
                        </div>
                    </td>
                </tr>                
            </tbody>
        </table>        
    </div>
</div>
<!-- end abdulla -->