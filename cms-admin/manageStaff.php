<?php
session_start();

if (!isset($_SESSION['adminemail'])) {
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
            <img src="<?php echo $_SESSION['admin_profile_image'] ?>" alt="profile"/>
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
              <i class="mdi mdi-clipboard-text menu-icon"></i>
              <span class="menu-title">Manage Complaints</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category-list">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="manageComplaint.php">Manage existing</a></li>
                <li class="nav-item"> <a class="nav-link" href="requested.php">View Requests</a></li>
                <li class="nav-item"> <a class="nav-link" href="pending.php">View Pending</a></li>
                <li class="nav-item"> <a class="nav-link" href="fulfilled.php">View Fulfilled</a></li>
                <li class="nav-item"> <a class="nav-link" href="rejected.php">View Rejected</a></li>
              </ul>
            </div>
          </li>
          <!--  -->

          <!-- Staff section -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#staff-section" aria-expanded="false" aria-controls="staff-section">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Staff</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="staff-section">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_Staff.php">Add Staff</a></li>
                <li class="nav-item"> <a class="nav-link" href="manageStaff.php">Manage Staff</a></li>

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
         
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- update form -->
          <div class="row hidden" id="updateFormCont">

            <!-- update staff form -->
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Staff Details</h4>
                  <p class="card-description">
                    Update / Modify the details of Staff
                  </p>
                  <form class="pt-3" id="updateStaff">
                    <!-- Staff Name -->
                    <div class="form-group">
                      <label for="staffName">Staff Name</label>
                      <input type="text" class="form-control form-control-lg" id="staffName" name="staffName" placeholder="Staff Name" required>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-lg-12 grid-margin stretch-card">
                        <select class="form-control form-control-lg" name="category" id="category">
                        <option value="Water Department">Water Department</option>
                          <option value="Sanitation Department">Sanitation Department</option>
                          <option value="Road Department">Road Department</option>
                          <option value="Transit Department">Transit Department</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="contact">Contact</label>
                      <input type="text" class="form-control form-control-lg" id="contact" name="contact" placeholder="Contact">
                    </div>

                    <div class="form-group">
                      <label for="staffId">Staff ID</label>
                      <input type="text" class="form-control form-control-lg" id="staffId" name="staffId" placeholder="Staff ID" readonly>
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

                    <!-- status -->
                    <div class="form-group">
                      <div class="form-check form-check-success">
                        <label class="form-check-label text-success" for="available">
                          <input type="radio" class="form-check-input" name="status" id="statAvailable" value="available" checked>
                          Available
                          <i class="input-helper"></i></label>
                      </div>


                      <div class="form-check form-check-warning">
                        <label class="form-check-label text-warning" for="busy">
                          <input type="radio" class="form-check-input" name="status" id="statBusy" value="busy">
                          Busy
                          <i class="input-helper"></i></label>
                      </div>
                    </div>

                    <div class="mt-3">
                      <a class="btn btn-danger btn-lg font-weight-medium auth-form-btn" id="cancelUpdate">Cancel</a>
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

          <!-- delete form cont -->
          <div class="row hidden" id="deleteFormCont">

            <!-- delete staff form -->
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Remove Staff</h4>
                  <p class="card-description">
                    Remove an existing Staff
                  </p>
                  <form class="pt-3" id="removeStaff">

                    <div class="form-group">
                      <label for="staffName">Staff Name</label>
                      <input type="text" class="form-control form-control-lg" id="deletestaffName" name="staffName" placeholder="Staff Name" readonly>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="category">Category</label>
                      <div class="col-lg-12 grid-margin stretch-card">
                        <input type="text" class="form-control form-control-lg" name="category" id="deletecategory" readonly>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="contact">Contact</label>
                      <input type="text" class="form-control form-control-lg" id="deletecontact" name="contact" placeholder="contact" readonly>
                    </div>


                    <div class="form-group">
                      <label for="deletestaffId">Staff ID</label>
                      <input type="text" class="form-control form-control-lg" id="deletestaffId" name="deletestaffId" placeholder="Staff ID" readonly>
                    </div>


                    <div class="mb-4">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          Confirm deletion
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                      <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" id="cancelDelete">Cancel</a>
                      <a class="btn btn-danger btn-lg font-weight-medium auth-form-btn" id="remove">Remove</a>
                    </div>

                    <div class="text-center mt-4 font-weight-light" id="deleteStatus">

                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!--  -->
          <div class="row" id="tableCont">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Staff</h4>

                  <div class="table-responsive" id="table-cont">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Staff Name</th>
                          <th>Category</th>
                          <th>Contact</th>
                          <th>Image</th>
                          <th>Staff ID</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Remove</th>
                        </tr>
                      </thead>
                      <tbody id="tableData">
                        <!-- <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td class="py-1"><img src="" alt=""></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td class="py-1"><img src="" alt=""></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                          <td class="py-1"><img src="" alt=""></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                          <td class="py-1"><img src="" alt=""></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                          <td class="py-1"><img src="" alt=""></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
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

  <script src="sweetalert2.all.min.js"></script>
  <script>
    // display table on load

    window.addEventListener("load", () => {

      const tableData = document.querySelector("#tableData");
      const form = new FormData();

      form.append("button", "displayAllStaff");
      fetch("control_Admin.php", {
        method: "POST",
        body: form
      }).then(resp => resp.json()).then(data => {
        console.log(data);
        if (data == "empty") {
          tableData.innerHTML = "";
        } else {
          const mappedData = data.map(obj => `
                      <tr>
                        <td class="fixTd">${obj.staffName}</td>
                        
                        <td>${obj.category}</td>

                        <td class="fixTd">${obj.contact}</td>

                        <td class="py-1"><img src="${obj.image}" alt="image"></td>
                        <td class="fixTd">${obj.id}</td>
                        <td><label class="badge ${obj.status=="available"?"badge-success":"badge-warning"}">${obj.status}</label></td>
                        <td><button class="btn btn-primary updateButton">Edit</button></td>
                        <td><button class="btn btn-danger deleteButton">Remove</button></td>
                      </tr>`);

          // remove commas
          const finalData = mappedData.join("");
          tableData.innerHTML = finalData;

          // select buttons
          // Get all buttons with class 'btn'
          const updateButtons = document.querySelectorAll('.updateButton');
          const deleteButtons = document.querySelectorAll('.deleteButton');

          // Add a click event listener to each update button
          updateButtons.forEach(button => {
            button.addEventListener('click', event => {
              // remove hidden from updateCont
              document.querySelector("#updateFormCont").classList.remove("hidden");


              // add hidden to tableCont
              document.querySelector("#tableCont").classList.add("hidden");

              // Get the parent element of the clicked button (the 'tr' element)
              // const row = event.target.parentElement.parentElement;

              // alt way1
              const row = event.target.closest('tr');
              //
              // Get the values of the first and second 'td' elements in the row
              const staffName = row.children[0].textContent;

              const cat = row.children[1].textContent;
              const contact = row.children[2].textContent;
              const staffID = row.children[4].textContent;
              const status = row.children[5].textContent;

              const statAvailable = document.querySelector("statAvailable");
              const statBusy = document.querySelector("statBusy");

              // Update the table
              // const img = row.children[4].textContent;

              // Set the values of the form inputs
              document.getElementById('staffName').value = staffName;

              document.getElementById('category').value = cat;
              document.getElementById('contact').value = contact;
              document.getElementById('staffId').value = staffID;

              if (status == "available") {
                statAvailable.setAttribute('selected', 'true');
              } else {
                statBusy.setAttribute('selected', 'true');
              }
              // document.getElementById('img').value = img;
            });
          });

          // Add a click event listener to each delete button
          deleteButtons.forEach(button => {
            button.addEventListener('click', event => {
              // remove hidden from updateCont
              document.querySelector("#deleteFormCont").classList.remove("hidden");


              // add hidden to tableCont
              document.querySelector("#tableCont").classList.add("hidden");

              // Get the parent element of the clicked button (the 'tr' element)
              // const row = event.target.parentElement.parentElement;



              // alt way1
              const row = event.target.closest('tr');
              //
              // Get the values of the first and second 'td' elements in the row
              const staffName = row.children[0].textContent;

              const cat = row.children[1].textContent;
              const contact = row.children[2].textContent;
              const staffID = row.children[4].textContent;
              // const img = row.children[4].textContent;

              // Set the values of the form inputs
              document.getElementById('deletestaffName').value = staffName;

              document.getElementById('deletecategory').value = cat;
              document.getElementById('deletecontact').value = contact;
              document.getElementById('deletestaffId').value = staffID;
              // document.getElementById('img').value = img;
            });
          });
        }

      })
    })

    // on click cancel update button
    const cancelUpdate = document.querySelector("#cancelUpdate");
    cancelUpdate.addEventListener("click", () => {
      // remove hidden from  tableCont
      document.querySelector("#tableCont").classList.remove("hidden");


      // add hidden to updateCont
      document.querySelector("#updateFormCont").classList.add("hidden");
    })

    // on click cancel delete button
    const cancelDelete = document.querySelector("#cancelDelete");
    cancelDelete.addEventListener("click", () => {
      // remove hidden from  tableCont
      document.querySelector("#tableCont").classList.remove("hidden");


      // add hidden to updateCont
      document.querySelector("#deleteFormCont").classList.add("hidden");
    })

    // update button updates complaint
    const update = document.querySelector("#update");
    update.addEventListener("click", () => {
      const updateStaff = document.querySelector("#updateStaff");
      const form = new FormData(updateStaff);
      form.append("button", "updateStaff");

      fetch("control_Admin.php", {
        method: "POST",
        body: form
      }).then(res => res.json()).then(data => {
        console.log(data);
        if (data === "update_success") {

           Swal.fire({
            title: 'Staff data has been updated Successfully!',
            icon: 'success',
          }).then(result => window.location.reload());
        }
      })
    })

    // delete button deletes complaint
    const removeBtn = document.querySelector("#remove");
    removeBtn.addEventListener("click", () => {
      const removeStaff = document.querySelector("#removeStaff");
      const form = new FormData(removeStaff);
      form.append("button", "removeStaff");

      // swal
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to undo this process",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            // fetch
            fetch("control_Admin.php", {
              method: "POST",
              body: form
            }).then(res => res.json()).then(data => {
              console.log(data);
              if (data === "delete_success") {

                swal("Staff removed Successfully!")
                  .then((value) => {

                    window.location.href = "manageStaff.php";
                  });

              }
            })

          } else {
            swal("Action cancelled by Admin");
          }
        });
      // 
      // fetch("control.php", {
      //   method: "POST",
      //   body: form
      // }).then(res => res.json()).then(data => {
      //   console.log(data);
      //   if (data==="delete_success") {
      //     // window.location.reload();
      //   }
      // })
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
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>