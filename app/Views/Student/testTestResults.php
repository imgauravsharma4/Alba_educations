<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test/Test Results - Alba Education</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/Admin/css/style.css')?>" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <?php include('public/Students/inc/topbar.php') ?>
    
    <main>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            <?php include('public/Students/inc/nav.php') ?>
          </div>

          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent mt-5">
              <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php if (session()->has('STUDENT')) {
                      echo session('STUDENT_NAME');
                    };  ?></h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin//images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 pe-5 ">
                  <div class="contentHeading2">
                    <h2>Test Downloads</h2>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Subject </th>
                        <th scope="col">File Download </th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($tests_results) && is_array($tests_results)) {
                        if (count($tests_results)>0){
                          foreach($tests_results as $tests_result)
                          {
                            ?>
                            <tr>
                              <th scope="row"></th>
                              <td><?php echo $tests_result->created_at; ?></td>
                              <td><?php  
                                if (isset($subjects) && $subjects != 0){
                                    foreach ($subjects as $subject) {
                                        if($subject->subject_id == $tests_result->subject)
                                        {
                                            echo $subject->subject_name;
                                            break;
                                        } 
                                    }
                                }
                              ?></td>
                              <td>
                                <a href="<?php echo base_url($tests_result->h_file) ?>" download>
                                  <span class="badge bg-danger">Download</span>
                                </a>
                              </td>
                              <td class="removeBtn" > 
                                <a href="#" >
                                  <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                </a>
                              </td>
                            </tr>
                            
                            <?php
                            ?>
                            <?php
                          }
                        }
                      } ?>
                    </tbody>
                  </table>

                  <div class="dash-shapeBox2">
                    <div class="dash-shape2">
                      <img src="<?php echo base_url('/public/Admin/images/kids-with-kite.png') ?>" alt="Shape Image">
                    </div>
                  </div>
                </div>
               
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      // for table row
      $(".removeBtn").click(function(){
        var verify = confirm("Are you sure ?");
        if (verify == true) {
          this.parentElement.style.display = "none"
          
        } else {}
      })
    </script>
  </body>
</html>
