<?php
session_start();

if (!isset($_SESSION['email'])) {
  header(('location:login.php'));
} else {
  // echo $_SESSION['name'];
  // echo $_SESSION['email'];
  // echo $_SESSION['status'];
}
?>
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
  <!-- mdi icons -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .hidden {
      display: none;
    }

    .fixTd {

      overflow: hidden;
      max-width: 10rem;

    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo $_SESSION['image'] ?>" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <!-- <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a> -->
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- Complaint management items -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-list" aria-expanded="false" aria-controls="category-list">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Complaints</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category-list">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="addComplaint.php">Add</a></li>

                <li class="nav-item"> <a class="nav-link" href="manageComplaint.php">Manage existing</a></li>

              </ul>
            </div>
          </li>
          <!--  -->

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Account</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <!-- Profile Link -->
          <li class="nav-item">
            <a class="nav-link" href="profile.php">

              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">Manage Profile</span>
            </a>
          </li>


        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- profile form -->
          <div class="row" id="profileCont">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Profile</h4>
                  <p class="card-description">
                    Manage Profile
                  </p>
                  <form class="pt-3" id="profileForm">
                    <!-- User Name -->
                    <div class="form-group">
                      <label for="name">User Name</label>
                      <input type="text" class="form-control form-control-lg" id="fill-name" name="name" placeholder="User Name" required>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control form-control-lg" id="fill-password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control form-control-lg" id="fill-email" name="email" placeholder="Email" readonly>
                    </div>

                    <div class="form-group">
                      <label for="id">Phone No</label>
                      <input type="number" class="form-control form-control-lg" id="fill-phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="fill-address" rows="4" name="address" required></textarea>
                    </div>


                    <!-- file -->
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Profile Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="mb-4">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          I agree that all the information above is true
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                      <!-- <a class="btn btn-danger btn-lg font-weight-medium auth-form-btn" id="cancelUpdate">Cancel</a> -->

                      <a class="btn btn-danger btn-lg font-weight-medium auth-form-btn" id="delete">Delete</a>
                      <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" id="update">Update</a>
                    </div>

                    <div class="text-center mt-4 font-weight-light" id="updateStatus">

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <input type="hidden" id="hiddenEmail" value="<?php echo $_SESSION["email"] ?>">
  <!-- <script src="sweetalert2.all.min.js"></script> -->
  <script>
    // display table on load
    const hiddenEmail = document.querySelector("#hiddenEmail");
    window.addEventListener("load", () => {

      const profileCont = document.querySelector("#profileCont");
      const form = new FormData();
      form.append("email", hiddenEmail.value);
      form.append("button", "profile");
      fetch("control.php", {
          method: "POST",
          body: form
        })
        .then(resp => resp.json())
        .then(data => {
          console.log(data);
          if (data == "empty") {
            profileCont.innerHTML = "";
          } else {
            const fillName = data[0].name;
            const fillPassword = data[0].password;
            const fillEmail = data[0].email;
            const fillPhone = data[0].phone;
            const fillAddress = data[0].address;

            document.querySelector("#fill-name").value = fillName;
            document.querySelector("#fill-password").value = fillPassword;
            document.querySelector("#fill-email").value = fillEmail;
            document.querySelector("#fill-phone").value = fillPhone;
            document.querySelector("#fill-address").innerHTML = fillAddress;
            // const mappedData = data.map(obj => ``);

            // remove commas
            // const finalData = mappedData.join("");
            // profileCont.innerHTML = finalData;

            // select buttons
            // Get all buttons with class 'btn'
            const updateButton = document.querySelector('#update');
            const deleteButton = document.querySelector('#delete');

            // Add a click event listener to update button

            updateButton.addEventListener('click', () => {

              Swal.fire({
                title: 'Update Profile?',
                showCancelButton: true,
                icon: 'info',
                confirmButtonColor: '#30d659',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Update',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  const profileForm = document.querySelector('#profileForm');
                  const form = new FormData(profileForm);
                  form.append("email", hiddenEmail.value);
                  form.append("button", "updateProfile");
                  fetch("control.php", {
                      method: "POST",
                      body: form
                    })
                    .then(resp => resp.json())
                    .then(data => {
                      if (data === "update_success") {
                        Swal.fire({
                          icon: 'success',
                          title: 'Profile Updated!',
                          text: 'Your profile has been updated successfully!',
                          // timer: 1500
                        }).then((result) => {
                          if (result) {

                            window.location.reload();
                          }
                        });
                      }
                    })
                }
              })
            });


            // Add a click event listener to delete button

            deleteButton.addEventListener('click', () => {

              Swal.fire({
                title: 'Delete Account?',
                text: "You won't be able to revert this action!",
                showCancelButton: true,
                icon: 'warning',
                confirmButtonColor: '#d41111',
                // cancelButtonColor: '#4d33dd',
                confirmButtonText: 'Delete',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  const profileForm = document.querySelector('#profileForm');
                  const form = new FormData(profileForm);
                  form.append("email", hiddenEmail.value);
                  form.append("button", "deleteProfile");
                  fetch("control.php", {
                      method: "POST",
                      body: form
                    })
                    .then(resp => resp.json())
                    .then(data => {
                      if (data === "delete_success") {
                        Swal.fire({
                          icon: 'success',
                          title: 'Account has been deleted!',
                          text: 'Your Account has been deleted successfully!',
                          // timer: 1500
                        }).then((result) => {
                          if (result) {

                            window.location.href = "logout.php";
                          }
                        });
                      }
                    })
                }
              })

            });

          }

        })
    })
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js" defer></script>
  <!-- End custom js for this page-->
</body>

</html>