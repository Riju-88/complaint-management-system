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
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" id="loginCont">
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
                  <a class="auth-link text-black" id="forgotPass">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
                <div class="text-center mt-4 font-weight-light" id="res">

                </div>
              </form>
            </div>

            <!-- Forgot pass div -->
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 hidden" id="forgotPassCont">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Forgot Password?</h4>
              <h6 class="font-weight-light">Your Password will be sent to the provided email</h6>
              <form class="pt-3" id="forgotPassForm">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="userEmail" name="email" placeholder="Email">
                </div>


                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="sendPass">Send Password</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Back to <a id="backToLogin" class="text-primary">Login</a>
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
    const loginCont = document.querySelector("#loginCont");
    const backToLogin = document.querySelector("#backToLogin");
    // let email = document.querySelector("#email");

    // let openFPassdlg = document.querySelector("#openFPassdlg");
    // let closeFPassdlg = document.querySelector("#closeFPassdlg");
    const forgotPass = document.querySelector("#forgotPass");
    const forgotPassCont = document.querySelector("#forgotPassCont");
    const sendPass = document.querySelector("#sendPass");
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
      fetch("control.php", {
        method: "post",
        body: formData
      }).then(data => data.text()).then(response => {
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


    // Forgot Password button hides the login form and shows the forgot password form
    forgotPass.addEventListener("click", () => {
      forgotPassCont.classList.remove("hidden");
      loginCont.classList.add("hidden");

    })

    //  Back To Login Button action
    backToLogin.addEventListener("click", () => {
      forgotPassCont.classList.add("hidden");
      loginCont.classList.remove("hidden");

    })

    // Send button sends password to provided email
    sendPass.addEventListener("click", () => {
      const forgotPassForm = document.querySelector("#forgotPassForm");
      const formData = new FormData(forgotPassForm);
      formData.append("button", "forgotPass");

      fetch("control.php", {
        method: "post",
        body: formData
      }).then(data => data.json()).then(response => {

        // console.log(response);
        if (response == "success") {
          console.log("Your Password has been sent to the provided email");
        } else {
          console.log(`Something went wrong. ${response}`);
        }

      })

    })
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