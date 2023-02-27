<?php
require "model.php";


    if ($_POST['button'] == "register") {
        register();
    }
    elseif ($_POST['button'] == "login") {
        login();
    }
    elseif ($_POST['button'] == "forgotPass") {
        forgotPass();
    }
    elseif ($_POST['button'] == "profile") {
        profile();
    }
    elseif ($_POST['button'] == "updateProfile") {
        updateProfile();
    }
    elseif ($_POST['button'] == "deleteProfile") {
        deleteProfile();
    }
    elseif ($_POST['button'] == "addComplaint") {
        addComplaint();
    }
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
    if ($_POST['button'] == "notifications") {
        notifications();
    }
    if ($_POST['button'] == "totalNumbers") {
        totalNumbers();
    }

