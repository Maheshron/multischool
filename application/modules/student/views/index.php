<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div>
              <div class="col-md-3 ht-1">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="head-title"><small> <?php echo $this->lang->line('manage_student'); ?></small></h3>
                   

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="http://localhost/multischool//assets/images//student.png" width="80px height:80px;">
                </div>
            </div>


        </div>
               
              
            </div>
            <div class="x_content quick-link">
                <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(ADD, 'student', 'student')){ ?>
                    <a href="<?php echo site_url('student/add/'); ?>"><?php echo $this->lang->line('admit'); ?> <?php echo $this->lang->line('student'); ?></a>
                 <?php } ?>
                <?php if(has_permission(VIEW, 'student', 'student')){ ?>
                    <a href="<?php echo site_url('student/index'); ?>"><?php echo $this->lang->line('manage_student'); ?></a>                    
                 <?php } ?>
                <?php if(has_permission(VIEW, 'student', 'bulk')){ ?>
                    <a href="<?php echo site_url('student/bulk/add'); ?>"><?php echo $this->lang->line('bulk'); ?> <?php echo $this->lang->line('admission'); ?></a>                    
                 <?php } ?>
                <?php if(has_permission(VIEW, 'student', 'activity')){ ?>
                    <a href="<?php echo site_url('student/activity/index'); ?>"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('activity'); ?></a>                    
                 <?php } ?>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_student_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'student', 'student')){ ?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('student/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('student'); ?></a> </li>                          
                             <?php }else{ ?>
                                 <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_student"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('student'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_student"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('student'); ?></a> </li>                          
                        <?php } ?>
                        
                        <li class="li-class-list">
                            <?php if($this->session->userdata('role_id') != SUPER_ADMIN){  ?> 
                                <select  class="form-control col-md-7 col-xs-12" onchange="get_student_by_class(this.value);">
                                    <?php if($this->session->userdata('role_id') != STUDENT){ ?>    
                                        <option value="<?php echo site_url('student/index/'); ?>">--<?php echo $this->lang->line('select'); ?>--</option> 
                                    <?php } ?>
                                    <?php foreach($classes as $obj ){ ?>
                                        <?php if($this->session->userdata('role_id') == STUDENT && $this->session->userdata('class_id') == $obj->id){ ?>
                                            <option value="<?php echo site_url('student/index/'.$obj->id); ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $this->lang->line('class'); ?> <?php echo $obj->name; ?></option>
                                        <?php }elseif($this->session->userdata('role_id') != STUDENT){ ?>
                                            <option value="<?php echo site_url('student/index/'.$obj->id); ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $this->lang->line('class'); ?> <?php echo $obj->name; ?></option>
                                        <?php } ?>
                                    <?php } ?>                                            
                                </select>
                            <?php }else{ ?> 
                                <select  class="form-control col-md-7 col-xs-12 auto-width" name="school_id_filter" id="school_id_filter" onchange="get_class_by_school(this.value,'')">
                                        <option value="">--<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>--</option> 
                                    <?php foreach($schools as $obj ){ ?>
                                        <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                    <?php } ?>   
                                </select>                            
                                <select  class="form-control col-md-7 col-xs-12 auto-width" name="class_id_filter" id="class_id_filter" onchange="get_student_by_class_sa(this.value);" >
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                               
                                </select>
                            <?php } ?>
                        </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_student_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                         <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>
                                        <th><?php echo $this->lang->line('photo'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('group'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section'); ?></th>
                                        <th><?php echo $this->lang->line('roll_no'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($students) && !empty($students)){ ?>
                                        <?php foreach($students as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                            <?php } ?>
                                            <td>
                                                <?php  if($obj->photo != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $obj->photo; ?>" alt="" width="70" /> 
                                                <?php }else{ ?>
                                                <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="70" /> 
                                                <?php } ?>
                                            </td>
                                            <td><?php echo ucfirst($obj->name); ?></td>
                                            <td><?php echo $this->lang->line($obj->group); ?></td>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->section; ?></td>
                                            <td><?php echo $obj->roll_no; ?></td>
                                            <td><?php echo $obj->email; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'student', 'student')){ ?>
                                                    <a href="<?php echo site_url('student/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                <?php } ?>
                                               <?php if(has_permission(VIEW, 'student', 'student')){ ?>
                                                        <a href="javascript:void(0);" onclick="get_student_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-student-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                    <?php } ?>
                                                <?php if(has_permission(DELETE, 'student', 'student')){ ?>
                                                    <a href="<?php echo site_url('student/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_student">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('student/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?>
                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class=""><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                          
                                              <label for="name" class="col-md-2"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                              <div class="col-md-4 col-md-offset-right-6 "><input  class="form-control"  name="name"  id="name" value="<?php echo isset($post['name']) ?  $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off"></div>
                                            
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                               
                                          
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_no" class="col-md-2"><?php echo $this->lang->line('admission_no'); ?> <span class="required">*</span></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                               <input  class="form-control col-md-7 col-xs-12"  name="admission_no"  id="admission_no" value="<?php echo isset($post['admission_no']) ?  $post['admission_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('admission_no'); ?>" required="required" type="text" autocomplete="off">
                                                
                                            </div>
                                            
                                            <div class="help-block"><?php echo form_error('admission_no'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_date" class="col-md-2"><?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('date'); ?><span class="required">*</span></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                               <input  class="form-control "  name="admission_date"  id="add_admission_date" value="<?php echo isset($post['admission_date']) ?  $post['admission_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('date'); ?>" required="required" type="text" autocomplete="off">

                                                
                                            </div>
                                            <div class="help-block"><?php echo form_error('admission_date'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label  for="dob"  class="col-md-2"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="dob"  id="add_dob" value="<?php echo isset($post['dob']) ?  $post['dob'] : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                         </div>
                                    </div>
                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="gender" class="col-md-2"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                <select  class="form-control "  name="gender"  id="gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach($genders as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['gender']) && $post['gender'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                                 
                                             </div>
                                        
                                            <div class="help-block"><?php echo form_error('gender'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="blood_group" class="col-md-2" ><?php echo $this->lang->line('blood_group'); ?></label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                              <select  class="form-control" name="blood_group" id="blood_group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $bloods = get_blood_group(); ?>
                                                <?php foreach($bloods as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['blood_group']) && $post['blood_group'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                                </select>

                                                 
                                             </div>
                                            <div class="help-block"><?php echo form_error('blood_group'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="religion" class="col-md-2"><?php echo $this->lang->line('religion'); ?></label>
                                              <div class="col-md-4 col-md-offset-right-6">
                                                  <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="add_religion" value="<?php echo isset($post['religion']) ?  $post['religion'] : ''; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>" type="text" autocomplete="off">
                                                  
                                              </div>
                                             
                                               <div class="help-block"><?php echo form_error('religion'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                 <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('contact'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                            <label for="guardian_id" class="col-md-2"><?php echo $this->lang->line('guardian'); ?> <span class="required">*</span></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <select  class="form-control quick-field" name="guardian_id" id="add_guardian_id" required="required" onchange="get_guardian_by_id(this.value);">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($guardians as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php echo isset($post['guardian_id']) && $post['guardian_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->phone; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('guardian_id'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                            <label for="relation_with" class="col-md-2"><?php echo $this->lang->line('relation_with'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <select  class="form-control " name="relation_with" id="relation_with"  >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $relation_types = get_relation_types(); ?>
                                                <?php foreach($relation_types as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['relation_with']) && $post['relation_with'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('relation_with'); ?></div>
                                        </div>
                                    </div>
                                    
                                     
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="phone" class="col-md-2"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                 <input  class="form-control "  name="phone"  id="add_phone" value="<?php echo isset($post['phone']) ?  $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                                 
                                             </div>
                                            
                                             <div class="help-block"><?php echo form_error('phone'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="national_id" class="col-md-2"><?php echo $this->lang->line('national_id'); ?> </label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="national_id"  id="national_id" value="<?php echo isset($post['national_id']) ?  $post['national_id'] : ''; ?>" placeholder="<?php echo $this->lang->line('national_id'); ?>" type="text" autocomplete="off">
                                                 
                                             </div>
                                             
                                             <div class="help-block"><?php echo form_error('national_id'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="present_address" class="col-md-2" ><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                  <textarea  class="form-control textarea-4column"  name="present_address"  id="add_present_address"  placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($post['present_address']) ?  $post['present_address'] : ''; ?></textarea>
                                                 
                                             </div>
                                            
                                              <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                         </div>
                                     </div>                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="permanent_address"  class="col-md-2" ><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="add_permanent_address"  placeholder="<?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($post['permanent_address']) ?  $post['permanent_address'] : ''; ?></textarea>

                                            </div>
                                            <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="row">                                      
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="class_id"  class="col-md-2"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                             <div  class="col-md-4 col-md-offset-right-6">
                                                   <select  class="form-control quick-field" name="class_id" id="add_class_id" required="required" onchange="get_section_by_class(this.value, '');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($classes as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                                 
                                             </div>
                                          
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="section_id"  class="col-md-2"><?php echo $this->lang->line('section'); ?> <span class="required">*</span></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <select  class="form-control quick-field" name="section_id" id="add_section_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                                
                                            </div>
                                          
                                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="group"  class="col-md-2"><?php echo $this->lang->line('group'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <select  class="form-control " name="group" id="group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $groups = get_groups(); ?>
                                                <?php foreach($groups as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['group']) && $post['group'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('group'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="roll_no" class="col-md-2"><?php echo $this->lang->line('roll_no'); ?> <span class="required">*</span></label>
                                             <div class="col"></div>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                  <input  class="form-control "  name="roll_no"  id="roll_no" value="<?php echo isset($post['roll_no']) ?  $post['roll_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('roll_no'); ?>" required="required" type="text" autocomplete="off">
                                             </div>
                                            
                                             <div class="help-block"><?php echo form_error('roll_no'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="registration_no" class="col-md-2"><?php echo $this->lang->line('registration_no'); ?></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="registration_no"  id="registration_no" value="<?php echo isset($post['registration_no']) ?  $post['registration_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('registration_no'); ?>" type="text" autocomplete="off">
                                           
                                                
                                            </div>
                                             <div class="help-block"><?php echo form_error('registration_no'); ?></div>
                                           
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="role_id" class="col-md-2"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                   <select  class="form-control col-md-7 col-xs-12" name="role_id" id="role_id" required="required">
                                                <?php foreach($roles as $obj){ ?>
                                                    <?php if(in_array($obj->id, array(STUDENT))){ ?>
                                                    <option value="<?php echo $obj->id; ?>"><?php echo $obj->name; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                             </div>
                                           
                                            <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="discount_id" class="col-md-2"><?php echo $this->lang->line('discount'); ?></label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                               <select  class="form-control col-md-7 col-xs-12 quick-field" name="discount_id" id="add_discount_id">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($discounts as $obj){ ?>                                                    
                                                    <option value="<?php echo $obj->id; ?>"><?php echo $obj->title; ?> [<?php echo $obj->amount; ?>%]</option>                                                   
                                                <?php } ?>
                                            </select>
                                                
                                            </div>
                                            
                                            <div class="help-block"><?php echo form_error('discount_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="second_language" class="col-md-2"><?php echo $this->lang->line('second'); ?> <?php echo $this->lang->line('language'); ?></label>
                                            <div class="col-md-4 col-md-offset-right-6">  <input  class="form-control col-md-7 col-xs-12"  name="second_language"  id="second_language" value="<?php echo isset($post['second_language']) ?  $post['second_language'] : ''; ?>" placeholder="<?php echo $this->lang->line('second'); ?> <?php echo $this->lang->line('second'); ?>" type="text" autocomplete="off"></div>
                                          
                                            <div class="help-block"><?php echo form_error('second_language'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">                  
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_school" class="col-md-2"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="previous_school"  id="previous_school" value="<?php echo isset($post['previous_school']) ?  $post['previous_school'] : ''; ?>" placeholder="<?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?>"  type="text" autocomplete="off"> 
                                            </div>
                                        
                                            <div class="help-block"><?php echo form_error('previous_school'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_class" class="col-md-2"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('class'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">   <input  class="form-control"  name="previous_class"  id="previous_class" value="<?php echo isset($post['previous_class']) ?  $post['previous_class'] : ''; ?>" placeholder="<?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('class'); ?>"  type="text" autocomplete="off"></div>
                                         
                                            <div class="help-block"><?php echo form_error('previous_class'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('transfer'); ?> <?php echo $this->lang->line('certificate'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control "  name="transfer_certificate"  id="transfer_certificate" type="file">
                                            </div>
                                               
                                                 <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                
                                            </div>
                                          
                                           
                                            <div class="help-block"><?php echo form_error('transfer_certificate'); ?></div>
                                         </div>
                                     </div>
                                    
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_name" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('name'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="father_name"  id="father_name" value="<?php echo isset($post['father_name']) ?  $post['father_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('name'); ?>" type="text" autocomplete="off">
                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('father_name'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_phone"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('phone'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control col-md-7 col-xs-12"  name="father_phone"  id="father_phone" value="<?php echo isset($post['father_phone']) ?  $post['father_phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('phone'); ?>"  type="text" autocomplete="off">
                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('father_phone'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_phone" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('email'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <input  class="form-control"  name="father_email"  id="father_email" value="<?php echo isset($post['father_email']) ?  $post['father_email'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('email'); ?>"  type="text" autocomplete="off">
                                                
                                            </div>
                                          
                                            <div class="help-block"><?php echo form_error('father_email'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                             <label for="blood_group"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('blood_group'); ?></label>
                                             <div class="col-md-4 col-md-offset-right-6">
                                                  <select  class="form-control" name="f_blood_group" id="f_blood_group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $bloods = get_blood_group(); ?>
                                                <?php foreach($bloods as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['f_blood_group']) && $post['f_blood_group'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                                </select>
                                                 
                                             </div>
                                            
                                            <div class="help-block"><?php echo form_error('blood_group'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="religion"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('religion'); ?></label>
                                              <div class="col-md-4 col-md-offset-right-6">
                                                 <input  class="form-control"  name="f_religion"  id="add_religion" value="<?php echo isset($post['religion']) ?  $post['religion'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('religion'); ?>" type="text" autocomplete="off">
                                                  
                                              </div>
                                              
                                               <div class="help-block"><?php echo form_error('religion'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="caste" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('caste'); ?></label>
                                              <div  class="col-md-4 col-md-offset-right-6">
                                                    <input  class="form-control"  name="f_caste"  id="add_religion" value="<?php echo isset($post['caste']) ?  $post['caste'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('caste'); ?>" type="text" autocomplete="off">
                                                  
                                              </div>
                                           
                                               <div class="help-block"><?php echo form_error('caste'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="nation"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('nation'); ?></label>
                                              <div class="col-md-4 col-md-offset-right-6">
                                                   <input  class="form-control "  name="f_nation"  id="add_religion" value="<?php echo isset($post['nation']) ?  $post['nation'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('nation'); ?>" type="text" autocomplete="off">
                                              </div>
                                             
                                               <div class="help-block"><?php echo form_error('nation'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="state"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('state'); ?></label>
                                                 <div  class="col-md-4 col-md-offset-right-6">
                                                  <input  class="form-control"  name="f_state"  id="add_religion" value="<?php echo isset($post['state']) ?  $post['state'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('state'); ?>" type="text" autocomplete="off">
                                                  
                                              </div>
                                             
                                               <div class="help-block"><?php echo form_error('state'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                              <label for="city" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('city'); ?></label>
                                              <div  class="col-md-4 col-md-offset-right-6">
                                                    <input  class="form-control "  name="f_city"  id="add_religion" value="<?php echo isset($post['city']) ?  $post['city'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('city'); ?>" type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('city'); ?></div>
                                                  
                                              </div>
                                           
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_education" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('education'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                            <input  class="form-control "  name="father_education"  id="father_education" value="<?php echo isset($post['father_education']) ?  $post['father_education'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('education'); ?>"  type="text" autocomplete="off">

                                            </div>
                                            <div class="help-block"><?php echo form_error('father_education'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_profession" class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('profession'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <input  class="form-control "  name="father_profession"  id="father_profession" value="<?php echo isset($post['father_profession']) ?  $post['father_profession'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('profession'); ?>"  type="text" autocomplete="off">
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('father_profession'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_designation"  class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('designation'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                            <input  class="form-control"  name="father_designation"  id="father_designation" value="<?php echo isset($post['father_designation']) ?  $post['father_profession'] : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('designation'); ?>"  type="text" autocomplete="off">

                                                
                                            </div>
                                            <div class="help-block"><?php echo form_error('father_designation'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('photo'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                               <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control"  name="father_photo"  id="father_photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                
                                            </div>
                                            
                                            <div class="help-block"><?php echo form_error('father_photo'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('aadhar'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">

                                                <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control"  name="father_aadhar"  id="father_aadhar" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            </div>
                                         
                                            
                                            <div class="help-block"><?php echo form_error('father_aadhar'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('pan'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">

                                                  <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control"  name="father_pan"  id="father_pan" type="file">
                                            </div>
                                             <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            </div>
                                          
                                           
                                            <div class="help-block"><?php echo form_error('father_pan'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('ration'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="father_ration"  id="father_ration" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>

                                                
                                            </div>
                                           
                                            <div class="help-block"><?php echo form_error('father_ration'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_name" class="col-md-2"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('name'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                  <input  class="form-control"  name="mother_name"  id="mother_name" value="<?php echo isset($post['mother_name']) ?  $post['mother_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('name'); ?>" type="text" autocomplete="off">
                                        
                                                
                                            </div>
                                             <div class="help-block"><?php echo form_error('mother_name'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_phone" class="col-md-2" ><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('phone'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                   <input  class="form-control col-md-7 col-xs-12"  name="mother_phone"  id="mother_phone" value="<?php echo isset($post['mother_phone']) ?  $post['mother_phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('phone'); ?>"  type="text" autocomplete="off">
                                           
                                            </div>
                                             <div class="help-block"><?php echo form_error('mother_phone'); ?></div>
                                         
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_education" class="col-md-2"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('education'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">

                                            <input  class="form-control"  name="mother_education"  id="mother_education" value="<?php echo isset($post['mother_education']) ?  $post['mother_education'] : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('education'); ?>"  type="text" autocomplete="off">
                                           
                                         </div>
                                          <div class="help-block"><?php echo form_error('mother_education'); ?></div>
                                     </div>
                                    </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_profession" class="col-md-2"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('profession'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">

                                            <input  class="form-control"  name="mother_profession"  id="mother_profession" value="<?php echo isset($post['mother_profession']) ?  $post['mother_profession'] : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('profession'); ?>"  type="text" autocomplete="off">
                                             </div>
                                                                                     <div class="help-block"><?php echo form_error('mother_profession'); ?></div>

                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_designation" class="col-md-2"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('designation'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                <input  class="form-control"  name="mother_designation"  id="mother_designation" value="<?php echo isset($post['mother_designation']) ?  $post['mother_profession'] : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('designation'); ?>"  type="text" autocomplete="off">
                                            
                                            </div>
                                            <div class="help-block"><?php echo form_error('mother_designation'); ?></div>
                                            
                                         </div>
                                     </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('photo'); ?> </label>
                                            <div class="col-md-4 col-md-offset-right-6">
                                                 <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control "  name="mother_photo"  id="mother_photo" type="file">
                                            </div>
                                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            </div>
                                           
                                
                                   
                                         </div>
                                                  <div class="help-block"><?php echo form_error('mother_photo'); ?></div>
                                     </div>
                                </div>
                                
                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5><strong><?php echo $this->lang->line('other'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                        <hr>
                                    </div>
                                </div>    
                                <div class="row"> 
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="item form-group">
                                        <label for="email" class="col-md-2"><?php echo $this->lang->line('email'); ?> </label>
                                        <div class="col-md-4 col-md-offset-right-6">
                                            <input  class="form-control "  name="email"  id="email" value="<?php echo isset($post['email']) ?  $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" type="email" autocomplete="off">
                                        </div>
                                        
                                        <div class="help-block"><?php echo form_error('email'); ?></div>
                                     </div>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="item form-group">
                                        <label for="username" class="col-md-2"><?php echo $this->lang->line('username'); ?> <span class="required">*</span></label>
                                        <div class="col-md-4 col-md-offset-right-6">
                                             <input  class="form-control "  name="username"  id="username" value="" placeholder="<?php echo $this->lang->line('username'); ?>" required="required" type="text" autocomplete="off">
                                            
                                        </div>
                                      
                                        <div class="help-block"><?php echo form_error('username'); ?></div>
                                     </div>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="item form-group">
                                        <label for="password" class="col-md-2"><?php echo $this->lang->line('password'); ?> <span class="required">*</span></label>
                                        <div class="col-md-4 col-md-offset-right-6">
                                               <input  class="form-control "  name="password"  id="password" value="" placeholder="<?php echo $this->lang->line('password'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('password'); ?></div>
                                        </div>
                                     
                                     </div>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="item form-group" >
                                        <label for="health_condition" class="col-md-2"><?php echo $this->lang->line('health_condition'); ?> </label>
                                        <div class="col-md-4 col-md-offset-right-6">
                                            <input  class="form-control"  name="health_condition"  id="health_condition" value="" placeholder="<?php echo $this->lang->line('health_condition'); ?>" type="text" autocomplete="off">
                                        </div>
                                        
                                        <div class="help-block"><?php echo form_error('health_condition'); ?></div>
                                     </div>
                                 </div>
                            </div>
                                <div class="row">                                     
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="item form-group">
                                            <label for="other_info" class="col-md-2"><?php echo $this->lang->line('other_info'); ?></label> 
                                            <div  class="col-md-4 col-md-offset-right-6">
                                                <textarea  class="form-control  textarea-4column"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($post['other_info']) ?  $post['other_info'] : ''; ?></textarea>  
                                            </div>
                                          
                                            <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group">
                                            <label class="col-md-2"><?php echo $this->lang->line('student'); ?>  <?php echo $this->lang->line('photo'); ?></label>
                                            <div  class="col-md-4 col-md-offset-right-6">
                                                   <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div> 
                                            </div>
                                        
                                            <div class="help-block"><?php echo form_error('photo'); ?></div>
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                         </div>
                                     </div>                                    
                                </div>
                                                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('student'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_student_instruction'); ?></div>
                                </div>
                                
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_edit_student">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('student/edit/'. $student->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                               
                                <?php $this->load->view('layout/school_list_edit_form'); ?>
                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($student->name) ?  $student->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_no"><?php echo $this->lang->line('admission_no'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_no"  id="admission_no" value="<?php echo isset($student->admission_no) ?  $student->admission_no : ''; ?>" placeholder="<?php echo $this->lang->line('admission_no'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('admission_no'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="admission_date"><?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('date'); ?><span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="admission_date"  id="edit_admission_date" value="<?php echo isset($student->admission_date) ?   date('d-m-Y', strtotime($student->admission_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('admission_date'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label  for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo isset($student->dob) ?  date('d-m-Y', strtotime($student->dob)) : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                         </div>
                                    </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                              <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach($genders as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if($student->gender == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('gender'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="blood_group"><?php echo $this->lang->line('blood_group'); ?></label>
                                              <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $bloods = get_blood_group(); ?>
                                                <?php foreach($bloods as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if($student->blood_group == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                                </select>
                                            <div class="help-block"><?php echo form_error('blood_group'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                              <label for="religion"><?php echo $this->lang->line('religion'); ?></label>
                                              <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="add_religion" value="<?php echo isset($student->religion) ?  $student->religion : ''; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>" type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('religion'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('contact'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="guardian_id"><?php echo $this->lang->line('guardian'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="guardian_id" id="edit_guardian_id" required="required" onchange="get_guardian_by_id(this.value);">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($guardians as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if($student->guardian_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('guardian_id'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="relation_with"><?php echo $this->lang->line('relation_with'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="relation_with" id="relation_with" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $relation_types = get_relation_types(); ?>
                                                <?php foreach($relation_types as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if($student->relation_with == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('relation_with'); ?></div>
                                        </div>
                                    </div>
                                    
                                     
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="add_phone" value="<?php echo isset($student->phone) ?  $student->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo form_error('phone'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="national_id"><?php echo $this->lang->line('national_id'); ?> </label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo isset($student->national_id) ?  $student->national_id : ''; ?>" placeholder="<?php echo $this->lang->line('national_id'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo form_error('national_id'); ?></div>
                                         </div>
                                     </div>
                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                             <label for="present_address"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                              <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="add_present_address"  placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($student->present_address) ?  $student->present_address : ''; ?></textarea>
                                              <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                         </div>
                                     </div>                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="item form-group">
                                            <label for="permanent_address"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?></label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="add_permanent_address"  placeholder="<?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($student->permanent_address) ?  $student->permanent_address : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">                                      
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12 quick-field" name="class_id" id="edit_class_id" required="required" disabled="disabled">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($classes as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if($student->class_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="section_id"><?php echo $this->lang->line('section'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="section_id" id="edit_section_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="group"><?php echo $this->lang->line('group'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="group" id="group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $groups = get_groups(); ?>
                                                <?php foreach($groups as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if($student->group == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('group'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="roll_no"><?php echo $this->lang->line('roll_no'); ?> <span class="required">*</span></label>
                                             <input  class="form-control col-md-7 col-xs-12"  name="roll_no"  id="roll_no" readonly="readonly"  value="<?php echo isset($student->roll_no) ?  $student->roll_no : ''; ?>" placeholder="<?php echo $this->lang->line('roll_no'); ?>" required="required" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo form_error('roll_no'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="registration_no"><?php echo $this->lang->line('registration_no'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_no"  id="registration_no" value="<?php echo isset($student->registration_no) ?  $student->registration_no : ''; ?>" placeholder="<?php echo $this->lang->line('registration_no'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('registration_no'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12" name="role_id" id="role_id" required="required">
                                                <?php foreach($roles as $obj){ ?>
                                                <?php if(in_array($obj->id, array(STUDENT))){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if($student->role_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="discount_id"><?php echo $this->lang->line('discount'); ?></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="discount_id" id="edit_discount_id">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($discounts as $obj){ ?>                                                    
                                                    <option value="<?php echo $obj->id; ?>" <?php if($student->discount_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->title; ?> [<?php echo $obj->amount; ?>%]</option>                                                   
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('discount_id'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="second_language"><?php echo $this->lang->line('second'); ?> <?php echo $this->lang->line('language'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="second_language"  id="second_language" value="<?php echo isset($student->second_language) ?  $student->second_language : ''; ?>" placeholder="<?php echo $this->lang->line('second'); ?> <?php echo $this->lang->line('second'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('second_language'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">                  
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_school"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_school"  id="previous_school" value="<?php echo isset($student->previous_school) ?  $student->previous_school : ''; ?>" placeholder="<?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('previous_school'); ?></div>
                                         </div>
                                     </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="previous_class"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('class'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="previous_class"  id="previous_class" value="<?php echo isset($student->previous_class) ?  $student->previous_class : ''; ?>" placeholder="<?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('class'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('previous_class'); ?></div>
                                         </div>
                                     </div>
                                   
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label ><?php echo $this->lang->line('transfer'); ?> <?php echo $this->lang->line('certificate'); ?> </label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="transfer_certificate"  id="transfer_certificate" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('transfer_certificate'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_transfer_certificate" id="prev_transfer_certificate" value="<?php echo $student->transfer_certificate; ?>" />
                                            <?php if($student->transfer_certificate){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/transfer-certificate/<?php echo $student->transfer_certificate; ?>" alt="" width="70" /><br/><br/>
                                            <?php } ?>
                                         </div>
                                     </div>                                    
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_name"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('name'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_name"  id="father_name" value="<?php echo isset($student->father_name) ?  $student->father_name : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('name'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_name'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_phone"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('phone'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_phone"  id="father_phone" value="<?php echo isset($student->father_phone) ?  $student->father_phone : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('phone'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_phone'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_education"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('education'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_education"  id="father_education" value="<?php echo isset($student->father_education) ?  $student->father_education : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('education'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_education'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_profession"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('profession'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_profession"  id="father_profession" value="<?php echo isset($student->father_profession) ?  $student->father_profession : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('profession'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_profession'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="father_designation"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('designation'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_designation"  id="father_designation" value="<?php echo isset($student->father_designation) ?  $student->father_designation : ''; ?>" placeholder="<?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('designation'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_designation'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label ><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('photo'); ?> </label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="father_photo"  id="father_photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('father_photo'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_father_photo" id="prev_father_photo" value="<?php echo $student->father_photo; ?>" />
                                            <?php if($student->father_photo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/father-photo/<?php echo $student->father_photo; ?>" alt="" width="70" /><br/><br/>
                                            <?php } ?>
                                         </div>
                                     </div> 
                                </div>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div> 
                                <div class="row">  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_name"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('name'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_name"  id="mother_name" value="<?php echo isset($student->mother_name) ?  $student->mother_name : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('name'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_name'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_phone"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('phone'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_phone"  id="mother_phone" value="<?php echo isset($student->mother_phone) ?  $student->mother_phone : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('phone'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_phone'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_education"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('education'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_education"  id="mother_education" value="<?php echo isset($student->mother_education) ?  $student->mother_education : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('education'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_education'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_profession"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('profession'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_profession"  id="mother_profession" value="<?php echo isset($student->mother_profession) ?  $student->mother_profession : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('profession'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_profession'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="mother_designation"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('designation'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_designation"  id="mother_designation" value="<?php echo isset($student->mother_designation) ?  $student->mother_designation : ''; ?>" placeholder="<?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('designation'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_designation'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label ><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('photo'); ?> </label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="mother_photo"  id="mother_photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('mother_photo'); ?></div>
                                         </div>
                                     </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_mother_photo" id="prev_mother_photo" value="<?php echo $student->mother_photo; ?>" />
                                            <?php if($student->mother_photo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/mother-photo/<?php echo $student->mother_photo; ?>" alt="" width="70" /><br/><br/>
                                            <?php } ?>
                                         </div>
                                     </div>
                                </div>
                                
                                
                               <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="column-title"><strong><?php echo $this->lang->line('other'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>    
                                <div class="row">                  
                                    
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"   id="email" value="<?php echo isset($student->email) ?  $student->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="username"><?php echo $this->lang->line('username'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" readonly="readonly" value="<?php echo isset($student->username) ?  $student->username : ''; ?>" placeholder="<?php echo $this->lang->line('username'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('username'); ?></div>
                                         </div>
                                     </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                            <label for="health_condition"><?php echo $this->lang->line('health_condition'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="health_condition"  id="health_condition" value="<?php echo isset($student->health_condition) ?  $student->health_condition : ''; ?>" placeholder="<?php echo $this->lang->line('health_condition'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('health_condition'); ?></div>
                                         </div>
                                     </div>
                                </div>
                                <div class="row">     
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                           <label for="other_info"><?php echo $this->lang->line('other_info'); ?></label> 
                                           <textarea  class="form-control col-md-6 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($student->other_info) ?  $student->other_info : ''; ?></textarea>
                                           <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label ><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('photo'); ?></label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('photo'); ?></div>
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                         <div class="item form-group">
                                             <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $student->photo; ?>" />
                                            <?php if($student->photo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $student->photo; ?>" alt="" width="70" /><br/><br/>
                                            <?php } ?>
                                         </div>
                                     </div>                                    
                                </div>
                                
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="class_id" id="class_id" value="<?php echo $student->class_id; ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php echo $student->id; ?>" />
                                        <a href="<?php echo site_url('student'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div> 
                        <?php } ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bs-student-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('information'); ?></h4>
        </div>
        <div class="modal-body fn_student_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_student_modal(student_id){
         
        $('.fn_student_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('student/get_single_student'); ?>",
          data   : {student_id : student_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_student_data').html(response);
             }
          }
       });
    }
</script>


<div class="modal fade bs-activity-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('activity'); ?> <?php echo $this->lang->line('information'); ?></h4>
        </div>
        <div class="modal-body fn_activity_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_activity_modal(activity_id){
         
        $('.fn_activity_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('student/activity/get_single_activity'); ?>",
          data   : {activity_id : activity_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_activity_data').html(response);
             }
          }
       });
    }
</script>

  
  <!-- bootstrap-datetimepicker -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

 
<!-- Super admin js START  -->
 <script type="text/javascript">
     
    var edit = false;
         
    $("document").ready(function() {
         <?php if(isset($edit) && !empty($edit)){ ?>
            $("#edit_school_id").trigger('change');
             edit = true;
         <?php } ?>
    });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();        
        var class_id = '';
        var guardian_id = '';       
        var discount_id = '';       
        <?php if(isset($edit) && !empty($edit)){ ?>
            class_id =  '<?php echo $student->class_id; ?>';
            guardian_id =  '<?php echo $student->guardian_id; ?>';
            discount_id =  '<?php echo $student->discount_id; ?>';
         <?php } ?> 
        
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   if(edit){
                       $('#edit_class_id').html(response);   
                   }else{
                       $('#add_class_id').html(response);   
                   }
                                    
                   get_guardian_by_school(school_id, guardian_id);
                   get_discount_by_school(school_id, discount_id);
               }
            }
        });
    }); 
    
    
    function get_guardian_by_school(school_id, guardian_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_guardian_by_school'); ?>",
            data   : { school_id:school_id, guardian_id: guardian_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_guardian_id').html(response);
                   }else{
                       $('#add_guardian_id').html(response); 
                   }
               }
            }
        });
    }
        
    function get_discount_by_school(school_id, discount_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_discount_by_school'); ?>",
            data   : { school_id:school_id, discount_id: discount_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_discount_id').html(response);
                   }else{
                       $('#add_discount_id').html(response); 
                   }
               }
            }
        });
    }
    
  </script>
<!-- Super admin js end -->

 

<!-- datatable with buttons -->
 <script type="text/javascript">
     
    $('#add_admission_date').datepicker();
    $('#edit_admission_date').datepicker();
    $('#add_dob').datepicker();
    $('#edit_dob').datepicker();
  
  <?php if(isset($edit)){ ?>
        get_section_by_class('<?php echo $student->class_id; ?>', '<?php echo $student->section_id; ?>');
    <?php } ?>
    
    function get_section_by_class(class_id, section_id){       
        
        var school_id = '';
        <?php if(isset($edit)){ ?>                
            school_id = $('#edit_school_id').val();
         <?php }else{ ?> 
            school_id = $('#add_school_id').val();
         <?php } ?> 
             
       if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : { school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   if(section_id === ''){
                       $('#add_section_id').html(response);
                   }else{
                       $('#edit_section_id').html(response);
                   }
               }
            }
        });  
                     
        
   }
  </script>
  
  <!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true,              
              responsive: true
          });
        });
        
        
        function get_guardian_by_id(guardian_id){
            
            $.ajax({       
            type   : "POST",
            dataType: "json",
            url    : "<?php echo site_url('ajax/get_guardian_by_id'); ?>",
            data   : { guardian_id : guardian_id},               
            async  : true,
            success: function(response){ 
               if(response)
               {
                $('#add_phone').val(response.phone);  
                $('#add_present_address').val(response.present_address);  
                $('#add_permanent_address').val(response.permanent_address);  
                $('#add_religion').val(response.religion);  
               }else{
                    $('#add_phone').val('');  
                    $('#add_present_address').val('');  
                    $('#add_permanent_address').val('');  
                    $('#add_religion').val(''); 
               }
            }
        });  
        }
        
     /* Menu Filter Start */   
        function get_student_by_class(url){          
            if(url){
                window.location.href = url; 
            }
        }         
        
    function get_class_by_school(school_id , class_id){
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {                     
                  $('#class_id_filter').html(response); 
               }
            }
        });
    }
    
    
    <?php if(isset($filter_school_id) && isset($class_id)){ ?>
        get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $class_id; ?>');
    <?php } ?>
    
    function get_student_by_class_sa(class_id){
    
        var school_id = $('#school_id_filter').val();
        if( !school_id){
            
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }        
        if(!class_id){
            return false;
        }        
       window.location.href = '<?php echo site_url('student/index/'); ?>'+class_id+'/'+school_id; 
    }
        
        
        
    $("#add").validate();     
    $("#edit").validate();      
</script>