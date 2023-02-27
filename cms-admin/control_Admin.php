<?php
require "model_Admin.php";


    // if ($_POST['button'] == "register") {
    //     register();
    // }
    // else
    if ($_POST['button'] == "login") {
        login();
    }
    // elseif ($_POST['button'] == "updateProfile") {
    //     updateProfile();
    // }
    // elseif ($_POST['button'] == "addComplaint") {
    //     addComplaint();
    // }
    elseif ($_POST['button'] == "displayBasicTable") {
        displayBasicTable();
    }
    elseif ($_POST['button'] == "displayTable") {
        displayTable();
    }
    elseif ($_POST['button'] == "updateComplaint") {
        updateComplaint();
    }
    elseif ($_POST['button'] == "deleteComplaint") {
        deleteComplaint();
    }
    elseif ($_POST['button'] == "pending") {
        statusPending();
    }
    elseif ($_POST['button'] == "fulfilled") {
        statusFulfilled();
    }
    elseif ($_POST['button'] == "rejected") {
        statusRejected();
    }
    elseif ($_POST['button'] == "viewRequested") {
        viewRequested();
    }
    elseif ($_POST['button'] == "viewPending") {
        viewPending();
    }
    elseif ($_POST['button'] == "viewRejected") {
        viewRejected();
    }
    elseif ($_POST['button'] == "viewFulfilled") {
        viewFulfilled();
    }
    elseif ($_POST['button'] == "addStaff") {
        addStaff();
    }
    elseif ($_POST['button'] == "displayAllStaff") {
        displayAllStaff();
    }
    elseif ($_POST['button'] == "updateStaff") {
        updateStaff();
    }
    elseif ($_POST['button'] == "removeStaff") {
        removeStaff();
    }
    elseif ($_POST['button'] == "filterStaffList") {
        filterStaffList();
    }
    elseif ($_POST['button'] == "assignStaff") {
        assignStaff();
    }
    elseif ($_POST['button'] == "updateStaffStatus") {
        updateStaffStatus();
    }
    if ($_POST['button'] == "totalNumbers") {
        totalNumbers();
    }

