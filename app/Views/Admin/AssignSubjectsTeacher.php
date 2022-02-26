<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Subjects</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include('public/Admin/inc/head.php'); ?>
 </head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
       <?php include ('public/Admin/inc/topbar.php'); ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include ('public/Admin/inc/sidebar.php'); ?>            
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Assign  more subject to already enrollerd teachers</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin'); ?>">Home</a>
                        </li>
                        <li>Assign more subjects</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!--  Start Here -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Assign  more subject to enrolled teachers</h3>
                                    </div>
                                
                                </div>
                                <?php
                                if (isset($reg_error)) {
                                ?>
                                    <div class="form-group text-danger"><?php print_r($reg_error); ?></div>
                                <?php
                                };
                                if (isset($message)) {
                                ?>
                                    <div class="form-group text-success"><?php print_r($message); ?></div>
                                <?php
                                };
                                ?>
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/assignSubjectsToTeachers');?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Teachers</label>
                                                <span class="required">*</span>
                                                <select class=" form-select"  name="teacher" aria-label="">
                                                    <option value="">Select teacher first..</option>
                                                    <?php 
                                                        if (isset($teachers) && $teachers != 0){
                                                            foreach ($teachers as $teacher) {
                                                                ?>
                                                                <option value="<?php echo $teacher->user_teacher_id; ?>"><?php echo $teacher->name; ?></option>
                                                                
                                                                <?php 
                                                            }
                                                        }
                                                    ?> 
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Grade (Category)</label>
                                                <span class="required">*</span>
                                                <select class="selectedClass form-select" onchange="AssignSubjectsFunctions()" name="grade" aria-label="">
                                                    <option value="">Select here..</option>
                                                    <option value="1">1st</option>
                                                    <option value="2">2nd</option>
                                                    <option value="3">3rd</option>
                                                    <option value="4">4th</option>
                                                    <option value="5">5th</option>
                                                    <option value="6">6th</option>
                                                    <option value="7">7th</option>
                                                    <option value="8">8th</option>
                                                    <option value="9">9th</option>
                                                    <option value="10">10th</option>
                                                    <option value="11">11th</option>
                                                    <option value="12">12th</option>
                                                    <option value="13">UG</option>
                                                    <option value="14">PG</option>
                                                    <option value="15">Diploma / certification</option>
                                                    <option value="16">Others</option>
                                                </select>
                                            </div> 
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Select Subject</label>
                                                <span class="required">*</span>
                                                <select class="fillSubjects form-select" name="subject" aria-label="">
                                                    <option value="">Select grade first..</option>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 " style="height: 65vh; overflow:scroll;">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Assigned Subjects</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-center text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Teacher Name</th>
                                                <th>Subject name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($subjects_teachers)) {
                                                if ($subjects_teachers != 0) {
                                                    $i = 1;
                                                    foreach($subjects_teachers as $subjects_student)
                                                    { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label"><?php echo $i; ?></label>
                                                            </div>
                                                        </td>
                                                         
                                                        <td>
                                                            <?php 
                                                            if (isset($teachers) && $teachers != 0){
                                                                foreach ($teachers as $users_student) {
                                                                    if($users_student->user_teacher_id == $subjects_student->teacher_id)
                                                                    {
                                                                        echo $users_student->name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>    
                                                        </td>   
                                                        <td>
                                                            <?php 
                                                            if (isset($subjects) && $subjects != 0){
                                                                foreach ($subjects as $subject) {
                                                                    if($subject->subject_id == $subjects_student->subject_id)
                                                                    {
                                                                        echo $subject->subject_name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="removeBtn" > 
                                                            <a href="#" >
                                                            <span class="badge bg-danger">Delete</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  End Here -->

            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <?php include('public/Admin/inc/foot.php'); ?>

</body>
<script>

    function AssignSubjectsFunctions(){
        getAsignStudents()
        getAsignSubjects()
    }
    function getAsignStudents()
    {
        var selectedClass = $('.selectedClass').find(':selected').val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getMyStudents');?>",
              data:{
                id:selectedClass
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    $('.fillStudents').text("")
                    alert('No Students in this grade !')
                  }else{
                  
                    $('.fillStudents').text("")
                    $('.fillStudents').append('<Option value="">Select Students here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillStudents').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }

    function getAsignSubjects()
    {
        var selectedClass = $('.selectedClass').find(':selected').val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getMySubjects');?>",
              data:{
                id:selectedClass
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    $('.fillSubjects').text("")
                    alert('No subjects with this student !')
                  }else{
                    $('.fillSubjects').text("")
                    $('.fillSubjects').append('<Option value="">Select Subjects here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillSubjects').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }
</script>
</html>