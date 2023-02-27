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
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" id="loginForm">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">SIGN IN</a> -->
                  <button class="btn btn-block btn-primary" id="login">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
             
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
                <div class="text-center mt-4 font-weight-light" id="res">
                
                </div>
              </form>
            </div>

            <!-- Forgot pass div -->
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 hidden">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Forgot Password?</h4>
              <h6 class="font-weight-light">Your Password will be sent to the provided email</h6>
              <form class="pt-3">
                <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="userEmail" name="email" placeholder="Email">
                </div>
              
              
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="sendPass">Send Password</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Back to <a href="login.php" class="text-primary">Login</a>
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

  <script>
    // let register = document.querySelector("#register");
    let loginForm = document.querySelector("#loginForm");
    let login = document.querySelector("#login");
    // let email = document.querySelector("#email");
    // let pass = document.querySelector("#password");
    // let openFPassdlg = document.querySelector("#openFPassdlg");
    // let closeFPassdlg = document.querySelector("#closeFPassdlg");
    // let forgotPass = document.querySelector("#forgotPass");
    // let sendPass = document.querySelector("#sendPass");
    // let sendTo = document.querySelector("#sendTo");
    let res = document.querySelector("#res");

    // register.addEventListener("click", (e) => {
    //     e.preventDefault();
    //     window.location.href = "register.php";
    // })

    // login button action
    login.addEventListener("click", (e) => {
      e.preventDefault();

      const formData = new FormData(loginForm);
      // const newEmail = email.value.replace(/'/g, "''");
      // const newPass = pass.value.replace(/'/g, "''");
      // formData.append("email", newEmail);
      // formData.append("password", newPass);
      formData.append("button", "login");
      fetch("control_Admin.php", {
        method: "post",
        body: formData
      }).then(data => data.json()).then(response => {
        // display.innerHTML = response;
        console.log(response);
        if (response == "success") {
          window.location.href = "index.php";
        } else {
          res.innerHTML = `<label class="badge badge-danger">${response}</label>`;
        }
        // add_dlg.close();
        // // window.location.href="products.php";

      })
    })

    // on click Forgot Password opens dialog
    // openFPassdlg.addEventListener("click", () => {
    //   forgotPass.showModal();
    // })
    // // on click closeFPassdlg closes dialog
    // closeFPassdlg.addEventListener("click", () => {
    //   forgotPass.close();
    // })

    // Send button sends password to provided email and closes dialog
    // sendPass.addEventListener("click", () => {
    //   const formData = new FormData();
    //   formData.append("button", "forgotPass");
    //   formData.append("email", sendTo.value);
    //   fetch("process.php", {
    //     method: "post",
    //     body: formData
    //   }).then(data => data.text()).then(response => {

    //     console.log(response);
    //     if (response == "success") {
    //       res.innerHTML = "Your Password has been sent to the provided email"
    //     } else {
    //       res.innerHTML = `Something went wrong. ${response}`;
    //     }


    //   })
    //   forgotPass.close();
    // })
  </script>
  <!-- container-scroller -->
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
  <!-- endinject -->
</body>

</html>