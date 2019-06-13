<?php $check_startdate = $this->input->get('start_date'); ?>
<script>
    $siteurl = '<?php echo site_url(); ?>';
    $baseurl = '<?php echo base_url(); ?>';
    $get_startdate = '<?php echo $start_date; ?>';
    $get_enddate = $max_date = '<?php echo $end_date; ?>';
    $check_startdate = '<?php echo $check_startdate; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/reportcertificatesdist.js"></script>
<div class="col-md-10">
    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-list-alt"></span> Reports - Certificates Distribution Report</h2>
    <h5 class="sub_panel_heading_style"><span class="glyphicon glyphicon-search"></span> Search By</h5>
    <div class="table-responsive">
        <?php
              $course = $this->input->get("courseId");
             $class = $this->input->get("classId");
             $trainee = $this->input->get("trainee_id");
              $taxcode = $this->input->get("taxcode_id");
              $company = $this->input->get("company_id");
        
        $status = $this->input->get_post("status");
        $start_date = $this->input->get_post("start_date");
        $end_date = $this->input->get_post("end_date");

        $atr = array('id' => 'wda_report_form', 'method' => 'get');
        echo form_open("reports/certificate_distribution", $atr);
        ?>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td class="td_heading">Course Name:</td>
                    
                    <td colspan="3">
                        <?php echo form_dropdown("courseId", $courses, $this->input->get('courseId'), 'id="courseId"') ?> 
                    </td>
                </tr> 
                <tr>
                     <td class="td_heading">Class Name:</td>
                     <td colspan='3'>
                        <?php echo form_dropdown("classId", $classes, $this->input->get('classId'), 'id="classId"') ?> 
                    </td>
                </tr>
               
                <tr>
                      <!-- tax code filter -->
                     <td class="td_heading">&nbsp;&nbsp;
                        <?php
                         $checked = TRUE;
                        $check = $this->input->get('search_select');
                        if ($check) {
                            $checked = ( $check == 1) ? TRUE : FALSE;
                        }
                        $data = array(
                            'id' => 'search_select',
                            'class' => 'search_select',
                            'name' => 'search_select',
                            'value' => 1,
                            'checked' => $checked
                        );
                        echo form_radio($data);
                        ?>
                        &nbsp;&nbsp;NRIC/FIN No.:
                    </td>
                    <td width="32%">
                        <?php
                        $data = array(
                            'id' => 'taxcode',
                            'name' => 'taxcode',
                            'class'=>'upper_case',
                            'value' => $this->input->get('taxcode'),
                            'style' => 'width:200px',
                        );
                        echo form_input($data);
                        $data = array(
                            'id' => 'taxcode_id',
                            'name' => 'taxcode_id',
                            'value' => $this->input->get('taxcode_id'),
                            'type' => 'hidden'
                        );
                        echo form_input($data);
                        ?>
                       
                        <span id="taxcode_err"></span>
                    </td>
                    <!-- ends tax code filter -->
                    
                     <td width="15%" class="td_heading">
                        <?php
                        $checked = ($this->input->get('search_select') == 2) ? TRUE : FALSE;
                        $data = array(
                            'id' => 'search_select',
                            'class' => 'search_select',
                            'name' => 'search_select',
                            'value' => 2,
                            'checked' => $checked
                        );
                        echo form_radio($data);
                        ?>
                        &nbsp;&nbsp;Trainee Name.:
                    </td>
                    <td width="32%">
                        <?php
                        $data = array(
                            'id' => 'trainee',
                            'name' => 'trainee',
                            'class'=>'upper_case',
                            'value' => $this->input->get('trainee'),
                             'style' => 'width:200px;',
                        );
                        echo form_input($data);
                        $data = array(
                            'id' => 'trainee_id',
                            'name' => 'trainee_id',
                            'type' => 'hidden',
                               'value' => $this->input->get('trainee_id')
                        );
                       
                        echo form_input($data);
                        ?>
                        <span id="trainee_err"></span>
                    </td> 
                </tr>
                <tr>
                    <?php 
                    if ($this->data['user']->role_id != 'COMPACT') 
                    { ?>
                    <td class="td_heading" width="15%"> Company Name:</td>
                    <td colspan="4" width="47%">
                        <?php
                        $company = array(
                            'name' => 'company_name',
                            'id' => 'company_name',
                            'value' => $this->input->get('company_name'),
                            'style'=>'width:200px;',
                            'class'=>'upper_case',
                            'autocomplete'=>'off'
                        );
                        echo form_input($company);
                        echo form_hidden('company_id', $this->input->get('company_id'), $id='company_id');
                        ?>
                        <span id="company_name_err"></span>
                    <?php } else { ?>
                        <td colspan="5">
                    <?php } ?>
                        <span class="pull-right">
                            <button type="submit" value="Search"  class="btn btn-xs btn-primary no-mar" title="Search" /><span class="glyphicon glyphicon-search"></span> Search</button>
                        </span>
                    </td>
                </tr>
                

                <tr style="display:none;">
                    <td class="td_heading">Course Completion Date From:</td>
                    <td><input type="text" name="start_date" id="start_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('start_date'); ?>"></td>
                    <td class="td_heading">To:</td>
                    <td colspan="2">
                        <input type="text" name="end_date"  id="end_date" placeholder="dd/mm/yyyy" value="<?php echo $this->input->get('end_date'); ?>"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="clear:both;"></div><br/>    
    <?php
    if (!empty($tabledata)) 
    {
        if (empty($start_date) && empty($end_date)) 
        {
            $period = ' for ' . date('F d Y, l');
        } 
        else 
        {
            $period = 'for the period';
            if (!empty($start_date))
                $period .= ' from ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $start_date)->getTimestamp());
            if (!empty($end_date))
                $period .= ' to ' . date('F d Y', DateTime::createFromFormat('d-m-Y', $end_date)->getTimestamp());
        }
        if (!empty($course_id)) 
        {
            $period .= ' \'' . $courses[$course_id] . '\'';
        }
        if (!empty($class_id)) 
        {
            $period .= ' \'' . $classes[$class_id] . '\'';
        }
        if (!empty($trainee_name)) 
        {
            $period .= ' \'' . $trainee_name->first . ' ' . $trainee_name->last . ' ' . $trainee_name->tax_code . '\'';
        }
        if (!empty($status)) 
        {
            if ($status == 'PENDCOLL') 
            {
                $period .= ' \' Pending Collection \'';
            } 
            elseif ($status == 'EXPIRD') 
            {
                $period .= ' \' Expired / Due for Renewal \'';
            }
        }
        ?>
        <!--<div class = "panel-heading panel_headingstyle" style = "width:100%;"><strong>Certificates Distribution Report <?php echo $period ?></strong></div>-->
        <br>
        <?php
              $course = $this->input->get("courseId");
              $class = $this->input->get("classId");
              $trainee = $this->input->get("trainee");
              $taxcode = $this->input->get("taxcode_id");
              $company = $this->input->get("company_id");
              
         if(($course!="") || ($taxcode!="") || ($company!="") || ($trainee!=""))
         {
            ?>
            <div>
            <span class="pull-right">
                <a href="<?php echo site_url('/reports/certificates_dist_export_xls') . '?' . $_SERVER['QUERY_STRING']; ?>" class="small_text1"  style="cursor: default;">
                    <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;
                <a href="<?php echo site_url('/reports/report_certificates_distribution_pdf') . '?' . $_SERVER['QUERY_STRING']; ?>" class="small_text1" style="cursor: default;">
                    <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>
            </span>
              
            </div>
     
        <?php
           
        }
        else 
        {
            ?>
            <div>
            <span class="pull-right">
                
                  <a href="<?php echo site_url('/reports/certificates_dist_export_xls') . '?' . $_SERVER['QUERY_STRING']; ?>" class="small_text1"  style="cursor: default;">
                    <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to XLS</span></a> &nbsp;&nbsp;
                <a href="javascript:void(0)" class="small_text1" id="displayText1">
                    <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span>Export to PDF</span></a>
                    <div id="alertmsg" style="display: none;color:#ff0000;">Please Select One of the above filter to export PDF.</div>
            </span>
                  
            </div>
          
        <?php
        }
         
        ?>
        <br><br>
        <?php
         $atr = array('id' => 'wda_report_form', 'method' => 'get');
        echo form_open("reports/certificate_distribution", $atr);
        ?>
        <table class="table table-striped">
            <thead>
                <?php
                $ancher = (($sort_order == 'asc') ? 'desc' : 'asc');
                $pageurl = $controllerurl;
                ?>
                <tr>
                    <th width="10%" class="">NRIC/FIN No.</th>
                    <th width="15%" class="">Trainee Name</th>
                    <th width="10%" class="">Course/Class Name</th>
<!--                    <th width="15%" class="">Class Name</th>-->
                    <th width="10%" class="">Company Name</th>
                    <th width="10%" class="">Company Email id</th>
                    <th width="10%" class="">Certificate Sent TO</th>
                    <th width="10%" class="">Certificate Sent / <br /> Collected On</th>

                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $i=1;
                $count=count($tabledata) ;
                foreach ($tabledata as $data)
                {
                    
                     $certified_date = (empty($data['certificate_coll_on'])) ? '' : date('d-m-Y', strtotime($data['certificate_coll_on']));

                    ?>
                <tr>
                    <td><a href="<?php echo base_url().'trainee/view_trainee/' . $data['user_id']; ?>"><?php echo $data['tax_code'];?></a></td>
                    <td><?php echo $data['first_name'].$data['last_name'];?></td>
                    <td>
                        <?php echo $data['crse_name'];?>
                       
                        <input type="text" name="course"  id="course_<?php echo $i;?>" value="<?php echo $data['course_id'];?>" style="display:none;"> 
                        <input type="text" name="user"  id="user_<?php echo $i;?>" value="<?php echo $data['user_id'];?>" style="display:none;"> 
                        <?php echo "(".$data['class_name'].")";?>
                        <input type="text" name="class" id="class_<?php echo $i;?>" value="<?php echo $data['class_id'];?>" style="display:none;"> 
                    </td>
                   <td>
                       <?php 
                       if($data['com_name_ind'])
                       {
                            echo $data['com_name_ind'];
                       }
                        else 
                        {
                            echo $data['com_name'];
                        }
                       ?></td>
                    <td><?php echo $data['comp_email'];?></td>
                    <td><?php 
                      
                        if(!$data['com_name'])  
                        {
                            echo $data['company_name'];
                        }else if ($data['com_name_others']){
                            echo $data['com_name_others'];
                        }
                        ?>
                    </td>
                    <td>
                        <input type="text" name="cert_col" id="cert_col_<?php echo $i;?>" class="cert_col_<?php echo $i;?>" 
                               placeholder="dd-mm-yyyy" value="<?php echo $certified_date; ?>" style="border-color: #transparent !important;
    background-color:transparent;border: solid 0px #bcbcbc !important;">
                       
<!--                                  <span id="cert_coll_<?php echo $i;?>"></span>  -->
                    </td>
            <span id="result1"></span>
                </tr>
                <?php
                $i++;
                }
                ?>
            </tbody>
            
        </table>
        
    <?php } else { ?>
        <br>
        <table class="table table-striped">
            <tr class="danger">
                <td colspan="10" style="color:red;text-align: center;">No data available.</td>
            </tr>
        </table>
    <?php } ?>
    <br>
    <ul class="pagination pagination_style">
        <?php echo $pagination; ?>
    </ul>
</div>
 <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.4.2.js"></script>-->
 <script type="text/javascript">
var count = '<?php echo $count; ?>';

</script>
