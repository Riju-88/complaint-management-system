<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function dbConnect()
{
    $hostName = "localhost";
    $userName = "root";
    $pass = "";
    $dbName = "cms";

    $connection = mysqli_connect($hostName, $userName, $pass, $dbName);
    return $connection;
}

// not in use here
// function register()
// {

//     // $hostName = "localhost";
//     // $userName = "root";
//     // $pass = "";
//     // $dbName = "cms";

//     // $con = mysqli_connect($hostName, $userName, $pass, $dbName);

//     $conn = dbConnect();
//     if (!$conn) {
//         echo json_encode("Not Connected");
//     } else {
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         $phone = $_POST['phone'];
//         $address = $_POST['address'];
//         $password = $_POST['password'];
//         // $arr = [$name, $email, $phone, $address, $password];

//         // get email name 

//         $parts = explode('@', $email);
//         $emailName = $parts[0];

//         // 
//         $target_dir = "images/users/$emailName/profilePicture/";
//         // create folder
//         $folder = $target_dir;

//         if (!file_exists($folder)) {
//             mkdir($folder, 0777, true);
//         }

//         // 
//         // $target_dir = "images/users/$emailName/profilePicture/";
//         $target_file = $target_dir . basename($_FILES["image"]["name"]);
//         move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

//         $sql = "insert into users (email,userName,password,phone,address,image) values('$email','$name','$password','$phone','$address','$target_file')";

//         // echo json_encode($arr);
//         $response = mysqli_query($conn, $sql);

//         if ($response == 1) {
//             echo "success";
//             // mysqli_close($conn);
//         } else {
//             echo "failed";
//         }
//     }
//     mysqli_close($conn);
// }

function login()
{
    $conn = dbConnect();
    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $email = $_POST['email'];
        // $phone = $_POST['phone'];
        // $address = $_POST['address'];
        $password = $_POST['password'];

        $sql = "SELECT * from cms_Admin WHERE email='$email' and password='$password'";


        // mysqli_query() sends the above insert command to database. mysqli_query() takes 2 parameters the connection variable and the query(command and data values)
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $data = mysqli_fetch_assoc($response);

            //session
            session_start();

            $_SESSION['name'] = $data["name"];
            // $_SESSION['status'] = $data["status"];
            $_SESSION['profile_image'] = $data["profile_image"];
            $_SESSION['email'] = $data["email"];

            echo json_encode("success");
        } else {
            echo json_encode("Invalid email or password");
        }
    }
    mysqli_close($conn);
}

// function updateProfile()
// {
// }

// not in use here
// function addComplaint()
// {
//     $conn = dbConnect();
//     if (!$conn) {
//         echo json_encode("Not Connected");
//     } else {
//         $subject = $_POST['subject'];
//         $description = $_POST['description'];
//         $email = $_POST['email'];
//         $status = $_POST['status'];
//         $location = $_POST['location'];
//         $category = $_POST['category'];


//         // get email name 

//         $parts = explode('@', $email);
//         $emailName = $parts[0];

//         // 
//         $target_dir = "images/users/$emailName/evidence/";
//         // create folder
//         $folder = $target_dir;

//         if (!file_exists($folder)) {
//             mkdir($folder, 0777, true);
//         }

//         // 
//         // $target_dir = "images/users/$emailName/profilePicture/";
//         $target_file = $target_dir . basename($_FILES["image"]["name"]);
//         move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

//         $sql = "insert into complaint (email,subject,description,category,status,location,evidenceImage) values('$email','$subject','$description','$category','$status','$location','$target_file')";

//         // echo json_encode($arr);
//         $response = mysqli_query($conn, $sql);

//         if ($response > 0) {
//             // $data = mysqli_fetch_assoc($response);

//             //session
//             // session_start();

//             // $_SESSION['userName'] = $data["userName"];
//             // // $_SESSION['status'] = $data["status"];
//             // $_SESSION['image'] = $data["image"];
//             // $_SESSION['email'] = $data["email"];

//             echo "success";
//         } else {
//             echo "Couldn't add your complaint";
//         }
//     }
//     mysqli_close($conn);
// }

function displayBasicTable()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {

        // $email = $_POST['email'];

        // $sql = "SELECT * from complaint WHERE email='$email'";
        $sql = "SELECT * FROM complaint ORDER BY creationDate DESC LIMIT 5";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {

                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];

                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status,  "image" => $image));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}

function totalNumbers(){
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * FROM complaint";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {

                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];

                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status,  "image" => $image));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}

function displayTable()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {

        // $email = $_POST['email'];

        $sql = "SELECT * from complaint";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["id"];
                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];
                $email = $data["email"];
                $location = $data["location"];
                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status, "location" => $location, "image" => $image, "id" => $id, "email" => $email));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}

function updateComplaint()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['id'];
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $email = $_POST['email'];
        // $status = $_POST['status'];
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $category = $_POST['category'];

        // get email name 
        $parts = explode('@', $email);
        $emailName = $parts[0];

        // 
        $target_dir = "images/users/$emailName/evidence/";
        // create folder
        $folder = $target_dir;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);



        // need to add id along with email(or else every complaint from the same user will be updated)
        // $sql = "UPDATE complaint SET subject='$subject', description='$description',location='$location',category='$category'
        //      WHERE email='$email'";
        // Start building the UPDATE statement
        $sql = "UPDATE complaint SET ";

        // Add the fields that are always included in the UPDATE statement
        $sql .= "subject='$subject', description='$description', location='$location', category='$category'";

        // If the image file is not empty, add the evidenceImage field to the UPDATE statement
        if (!empty($_FILES["image"]["name"])) {
            $sql .= ", evidenceImage='$target_file'";
        }

        // Add the WHERE clause to the UPDATE statement
        $sql .= " WHERE email='$email' AND id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("update_success");
            // header(('location:manageComplaint.php'));
        }

        // echo json_encode([$subject, $description, $location]);
    }

    mysqli_close($conn);
}

function deleteComplaint()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['id'];

        $email = $_POST['email'];

        $sql = "DELETE FROM complaint WHERE email='$email' AND id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("delete_success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}

function statusPending()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['id'];

        // $email = $_POST['email'];

        $sql = "UPDATE complaint SET status='pending' WHERE id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {

               // 2nd query to get data from complaint table
               $sql2 = "SELECT * FROM complaint WHERE id='$id'";
            
               $response2 = mysqli_query($conn, $sql2);
   
               if (mysqli_num_rows($response2) > 0) {
   
                   // complaint table
                   $complaintdata = mysqli_fetch_assoc($response2);
   
                   $useremail = $complaintdata["email"];
                   $subject = $complaintdata["subject"];
                   $complaintID= $complaintdata["id"];
                   // $description= $complaintdata["description"];
                   // $category = $complaintdata["category"];
                
   
                   // adding notification
                   $message="The following complaint: <strong>{$subject}</strong> is being reviewed";
   
               // 3rd query to set notification
                   $sql3 = "INSERT into notifications (complaint_id,email,status,subject,message) values('$complaintID','$useremail','pending','$subject','$message')";
   
                   // execute notification query
                   mysqli_query($conn, $sql3);
               }

            echo json_encode("success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}
function statusFulfilled()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['id'];

        // $email = $_POST['email'];

        $sql = "UPDATE complaint SET status='fulfilled' WHERE id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {

               // 2nd query to get data from complaint table
               $sql2 = "SELECT * FROM complaint WHERE id='$id'";
            
               $response2 = mysqli_query($conn, $sql2);
   
               if (mysqli_num_rows($response2) > 0) {
   
                   // complaint table
                   $complaintdata = mysqli_fetch_assoc($response2);
   
                   $useremail = $complaintdata["email"];
                   $subject = $complaintdata["subject"];
                   $complaintID= $complaintdata["id"];
                   // $description= $complaintdata["description"];
                   // $category = $complaintdata["category"];
                
   
                   // adding notification
                   $message="The following complaint: <strong>{$subject}</strong> has been resolved";
   
               // 3rd query to set notification
                   $sql3 = "INSERT into notifications (complaint_id,email,status,subject,message) values('$complaintID','$useremail','fulfilled','$subject','$message')";
   
                   // execute notification query
                   mysqli_query($conn, $sql3);
               }

            echo json_encode("success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}
function statusRejected()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['id'];

        // $email = $_POST['email'];

        $sql = "UPDATE complaint SET status='rejected' WHERE id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {

            // 2nd query to get data from complaint table
            $sql2 = "SELECT * FROM complaint WHERE id='$id'";
            
            $response2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($response2) > 0) {

                // complaint table
                $complaintdata = mysqli_fetch_assoc($response2);

                $useremail = $complaintdata["email"];
                $subject = $complaintdata["subject"];
                $complaintID= $complaintdata["id"];
                // $description= $complaintdata["description"];
                // $category = $complaintdata["category"];
             

                // adding notification
                $message="The following complaint: <strong>{$subject}</strong> has been rejected by the administrator";

            // 3rd query to set notification
                $sql3 = "INSERT into notifications (complaint_id,email,status,subject,message) values('$complaintID','$useremail','rejected','$subject','$message')";

                // execute notification query
                mysqli_query($conn, $sql3);
            }

          
            
            echo json_encode("success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}

function viewPending()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * from complaint WHERE status='pending'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["id"];
                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];
                $location = $data["location"];
                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status, "location" => $location, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}
function viewRequested()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * from complaint WHERE status='requested'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["id"];
                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];
                $location = $data["location"];
                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status, "location" => $location, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}
function viewRejected()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * from complaint WHERE status='rejected'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["id"];
                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];
                $location = $data["location"];
                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status, "location" => $location, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}
function viewFulfilled()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * from complaint WHERE status='fulfilled'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["id"];
                $subject = $data["subject"];
                $description = $data["description"];
                $category = $data["category"];
                $status = $data["status"];
                $location = $data["location"];
                $image = $data["evidenceImage"];

                array_push($alldata, array("subject" => $subject, "description" => $description, "category" => $category, "status" => $status, "location" => $location, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}

function addStaff()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $staffName = $_POST['staffName'];
        $contact = $_POST['contact'];

        $status = 'available';

        $category = $_POST['category'];



        // 
        $target_dir = "images/staff/$staffName$contact/";
        // create folder
        $folder = $target_dir;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // 
        // $target_dir = "images/users/$emailName/profilePicture/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "insert into cms_staff (name,category,contact,image,status) values('$staffName','$category','$contact','$target_file','$status')";

        // echo json_encode($arr);
        $response = mysqli_query($conn, $sql);

        if ($response > 0) {

            echo json_encode("success");
        } else {
            echo json_encode("Couldn't add Staff");
        }
    }
    mysqli_close($conn);
}

function displayAllStaff()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $sql = "SELECT * from cms_staff";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["staff_id"];
                $staffName = $data["name"];
                $category = $data["category"];
                $status = $data["status"];
                $contact = $data["contact"];
                $image = $data["image"];

                array_push($alldata, array("staffName" => $staffName,  "category" => $category, "status" => $status, "contact" => $contact, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}

function updateStaff()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['staffId'];

        $staffName = mysqli_real_escape_string($conn, $_POST['staffName']);


        // $status = $_POST['status'];
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $category = $_POST['category'];
        $status = $_POST['status'];

        // 
        $target_dir = "images/staff/$staffName$contact/";
        // create folder
        $folder = $target_dir;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // 
        // $target_dir = "images/users/$emailName/profilePicture/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "UPDATE cms_staff SET ";

        // Add the fields that are always included in the UPDATE statement
        $sql .= "name='$staffName', category='$category',  contact='$contact', status='$status'";

        // If the image file is not empty, add the evidenceImage field to the UPDATE statement
        if (!empty($_FILES["image"]["name"])) {
            $sql .= ", image='$target_file'";
        }

        // Add the WHERE clause to the UPDATE statement
        $sql .= " WHERE staff_id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("update_success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}

function removeStaff()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $id = $_POST['deletestaffId'];

        $sql = "DELETE FROM cms_staff WHERE staff_id='$id'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("delete_success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}

function filterStaffList()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $complaintCategory = $_POST['complaintCategory'];
        // $complaintID= $_POST['complaintID'];

        $sql = "SELECT * FROM cms_staff WHERE category='$complaintCategory' AND status='available'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                // add email as well(after modifying table)
                $id = $data["staff_id"];
                $staffName = $data["name"];
                $category = $data["category"];
                $status = $data["status"];
                $contact = $data["contact"];
                $image = $data["image"];

                array_push($alldata, array("staffName" => $staffName,  "category" => $category, "status" => $status, "contact" => $contact, "image" => $image, "id" => $id));
            }
            echo json_encode($alldata);
        } else {
            echo json_encode("");
        }
    }
    mysqli_close($conn);
}

function assignStaff()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {
        $complaintID = $_POST['complaintID'];
        $staffID = $_POST['staffID'];

        $sql = "INSERT into cms_assign (complaintID,staffID,status) values('$complaintID','$staffID','assigned')";


        $response = mysqli_query($conn, $sql);

        // if assign success
        if ($response > 0) {



            // on success get user email with complaint id
            $sql = "SELECT * FROM complaint WHERE id='$complaintID'";
            // 2nd query to get staff information
            $sql2 = "SELECT * FROM cms_staff WHERE staff_id='$staffID'";

            

            $response = mysqli_query($conn, $sql);
            $response2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($response) > 0 && mysqli_num_rows($response2) > 0) {
                // complaint table
                $data = mysqli_fetch_assoc($response);

                // cms staff table
                $data2 = mysqli_fetch_assoc($response2);

                $email = $data["email"];
                $subject = $data["subject"];
                // $description= $data["description"];
                $category = $data["category"];
                $creationDate = $data["creationDate"];

                $staffName = $data2["name"];
                $staffContact = $data2["contact"];

                // adding notification
                $message="Our staff <strong>{$staffName}</strong> has been assigned for the following complaint: <strong>{$subject}</strong>";
            // 3rd query to set notification
            $sql3 = "INSERT into notifications (complaint_id,email,status,subject,message) values('$complaintID','$email','info','$subject','$message')";

            // execute query
            mysqli_query($conn, $sql3);

            // Currently not checking if the notification is added or not
            // $notifResp = mysqli_query($conn, $sql3);

            // if ($notifResp > 0) {

            //      json_encode("success");
            // } 
                // email on success
                $mail = new PHPMailer(true);

                try {
                    //Server settings

                    $mail->isSMTP();
                    //Send using SMTP

                    $mail->Host       = 'smtp.gmail.com';
                    //Set the SMTP server to send through

                    $mail->SMTPAuth   = true;
                    //Enable SMTP authentication

                    $mail->Username   = 'undefinedvoid404@gmail.com';
                    //SMTP username
                    $mail->Password   = 'tkzvvdsvzshvdzvx';
                    //SMTP password

                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    //Enable implicit TLS encryption

                    $mail->Port       = 465;
                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                    //Recipients
                    $mail->setFrom('undefinedvoid404@gmail.com', 'Complaint Management System Admin');
                    $mail->addAddress($email, "user");
                    //Add a recipient

                    //Name is optional

                    $mail->addReplyTo('undefinedvoid404@gmail.com', 'Information');

                    //Content
                    $mail->isHTML(true);
                    //Set email format to HTML
                    $mail->Subject = 'Assigned Staff CMS';
                    $mail->Body    = "
                <p>Our Staff {$staffName} has been assigned for the following complaint:</p>
                <p><b>Complaint ID: {$complaintID}</b></p>
                <p><b>Subject: </b>{$subject}</p>
                <p><b>Category: </b>{$category}</p>
                <p><b>Created on: </b>{$creationDate}</p>
                <p>For any further assist, here is the contact info of our staff: <b>{$staffContact}</b></p>
                ";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo json_encode("success");
                } catch (Exception $e) {
                    echo json_encode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
                }
            }
        } else {
            echo json_encode("Couldn't assign Staff");
        }
    }

    mysqli_close($conn);
}

function updateStaffStatus()
{
    $conn = dbConnect();

    if (!$conn) {
        echo json_encode("Not Connected");
    } else {

        $staffID = $_POST['staffID'];
        $sql = "UPDATE cms_staff SET status='busy' WHERE staff_id='$staffID'";
        $response = mysqli_query($conn, $sql);

        if ($response > 0) {

            echo json_encode("success");
        } else {
            echo json_encode("Couldn't assign Staff");
        }
    }

    mysqli_close($conn);
}
