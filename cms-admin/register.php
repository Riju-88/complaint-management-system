<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    .hidden {
      display: none;
    }

  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" id="regForm">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="name" placeholder="Full Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" id="exampleInputPhone1" name="phone" placeholder="Phone no">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputAddress1" name="address" placeholder="Address">
                </div>
                <!-- <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <!-- <div class="form-group">
                  <input type="file" class="form-control form-control-lg" id="formImage" name="image" placeholder="Profile Picture">
                </div> -->

                <!-- file -->
                <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Profile Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                <!--  -->
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree that all the information above is true
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="register">SIGN UP</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
                <div class="text-center mt-4 font-weight-light" id="regStatus">
                
                </div>
              </form>
            </div>

            <!-- otp div -->
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 hidden">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>OTP has been sent to the provided email</h4>
              <h6 class="font-weight-light">Enter your OTP below</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="otpCheck" name="otp" placeholder="OTP">
                </div>
              
              
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="registerxxx">SIGN UP</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
                <div class="text-center mt-4 font-weight-light" id="regStatus">
                
                </div>
              </form>
            </div>
            <!--  -->
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script>
    let register = document.querySelector("#register");
    let form = document.querySelector("#regForm");
    let regStatus = document.querySelector("#regStatus");

    register.addEventListener("click", (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      formData.append("button", "register");

      fetch("control_Admin.php", {
          method: "post",
          body: formData
      }).then(data => data.text()).then(response => {
          // res.innerHTML = response;
          console.log(response);
          if (response=="success") {
           regStatus.innerHTML=`<label class="badge badge-success">Registered Successfully! Go to Login</label>`;
          } else if (response=="failed"){
             regStatus.innerHTML=`<label class="badge badge-danger">Couldn't Register</label>`;
          }
          else{
            regStatus.innerHTML=`<label class="badge badge-warning">${response}</label>`;
          }
          
          // otp_dlg.close();
          // add_dlg.close();
          // // window.location.href="products.php";
          // window.location.reload(this);
      })
      
          });
  </script>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- endinject -->
</body>

</html>