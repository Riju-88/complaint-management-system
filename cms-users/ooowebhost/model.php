<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function dbConnect()
{
    // $hostName = "localhost";
    // $userName = "root";
    // $pass = "";
    // $dbName = "cms";


    // 000webhost
    $hostName = "localhost";
    $userName = "id20681970_root";
    $pass = "vFV71T9]PV_R5tZ!";
    $dbName = "id20681970_cms";

    $connection = mysqli_connect($hostName, $userName, $pass, $dbName);
    return $connection;
}

function register()
{

    // $hostName = "localhost";
    // $userName = "root";
    // $pass = "";
    // $dbName = "cms";

    // $con = mysqli_connect($hostName, $userName, $pass, $dbName);

    $conn = dbConnect();
    if (!$conn) {
        echo "Not Connected";
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        // get email name 

        $parts = explode('@', $email);
        $emailName = $parts[0];

        // 
        $target_dir = "images/users/$emailName/profilePicture/";
        // create folder
        $folder = $target_dir;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // 
        // $target_dir = "images/users/$emailName/profilePicture/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "insert into users (email,userName,password,phone,address,image) values('$email','$name','$password','$phone','$address','$target_file')";

        // echo json_encode($arr);
        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo "success";
            // mysqli_close($conn);
        } else {
            echo "failed";
        }
    }
    mysqli_close($conn);
}

// vulnerable to SQL injection
// function login()
// {
//     $conn = dbConnect();
//     if (!$conn) {
//         echo "Not Connected";
//     } else {
//         $email = $_POST['email'];
//         // $phone = $_POST['phone'];
//         // $address = $_POST['address'];
//         $password = $_POST['password'];

//         $sql = "SELECT * from users WHERE email='$email' and password='$password'";


//         // mysqli_query() sends the above insert command to database. mysqli_query() takes 2 parameters the connection variable and the query(command and data values)
//         $response = mysqli_query($conn, $sql);


//         if (mysqli_num_rows($response) > 0) {
//             $data = mysqli_fetch_assoc($response);

//             //session
//             session_start();

//             $_SESSION['userName'] = $data["userName"];
//             // $_SESSION['status'] = $data["status"];
//             $_SESSION['image'] = $data["image"];
//             $_SESSION['email'] = $data["email"];

//             echo "success";
//         } else {
//             echo "Invalid email or password";
//         }
//     }
//     mysqli_close($conn);
// }

function login()
{
    $conn = dbConnect();
    if (!$conn) {
        echo "Not Connected";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare the SQL statement using a parameterized query
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=? AND password=?");
        // ss is the format string for the parameters being bound. In this case, there are two parameters being bound, both strings, hence the ss format string.
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            //session
            session_start();

            $_SESSION['userName'] = $data["userName"];
            $_SESSION['image'] = $data["image"];
            $_SESSION['email'] = $data["email"];

            echo "success";
        } else {
            echo "Invalid email or password";
        }

        // Clean up the resources
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}


function forgotPass(){
    $conn = dbConnect();
    if (!$conn) {
        echo "Not Connected";
    } else {
        $email = $_POST['email'];

        $sql = "SELECT * from users WHERE email='$email'";

        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $data = mysqli_fetch_assoc($response);
            $pass= $data['password'];

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
                $mail->Subject = 'Forgot Password CMS';
                $mail->Body    = "
            <p>Here's your Password for CMS <strong>$pass</strong></p>
            ";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo json_encode("success");
            } catch (Exception $e) {
                echo json_encode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            } 
        }
        else{
            echo json_encode("Could not find the specified email in the database");
        }
    }
    mysqli_close($conn);
}

function addComplaint()
{
    $conn = dbConnect();
    if (!$conn) {
        echo "Not Connected";
    } else {

        $email = $_POST['email'];
        $status = $_POST['status'];
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
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

        // 
        // $target_dir = "images/users/$emailName/profilePicture/";
        $target_file = $target_dir . mysqli_real_escape_string($conn,basename($_FILES["image"]["name"]));
        move_uploaded_file(mysqli_real_escape_string($conn,$_FILES["image"]["tmp_name"]), $target_file);

        $sql = "insert into complaint (email,subject,description,category,status,location,evidenceImage) values('$email','$subject','$description','$category','$status','$location','$target_file')";

        // echo json_encode($arr);
        $response = mysqli_query($conn, $sql);

        if ($response > 0) {

            echo "success";
        } else {
            echo "Couldn't add your complaint";
        }
    }
    mysqli_close($conn);
}

function displayBasicTable()
{
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
    } else {

        $email = $_POST['email'];

        $sql = "SELECT * from complaint WHERE email='$email' ORDER BY creationDate DESC LIMIT 5";
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

        $email = $_POST['email'];
        $sql = "SELECT * FROM complaint WHERE email='$email'";
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
        echo "Not Connected";
    } else {

        $email = $_POST['email'];

        $sql = "SELECT * from complaint WHERE email='$email'";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
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

function updateComplaint()
{
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
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
        echo "Not Connected";
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

function profile()
{
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
    } else {
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email='$email'";


        $response = mysqli_query($conn, $sql);

        if (mysqli_num_rows($response) > 0) {

            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {

                $name = $data['userName'];
                $email = $data['email'];
                $phone = $data['phone'];
                $address = $data['address'];
                $password = $data['password'];

                $image = $data["image"];

                array_push($alldata, array("name" => $name, "email" => $email, "phone" => $phone, "address" => $address,  "password" => $password,  "image" => $image));
            }
            echo json_encode($alldata);
        }
    }
    mysqli_close($conn);
}

function updateProfile()
{
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
    } else {
      
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
       
        $address = mysqli_real_escape_string($conn, $_POST['address']);
       

        // get email name 
        $parts = explode('@', $email);
        $emailName = $parts[0];

        // 
        $target_dir = "images/users/$emailName/profilePicture/";
        // create folder
        $folder = $target_dir;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

       
        // Start building the UPDATE statement
        $sql = "UPDATE users SET ";

        // Add the fields that are always included in the UPDATE statement
        $sql .= "userName='$name', password='$password', address='$address', phone='$phone'";

        // If the image file is not empty, add the evidenceImage field to the UPDATE statement
        if (!empty($_FILES["image"]["name"])) {
            $sql .= ", image='$target_file'";
        }

        // Add the WHERE clause to the UPDATE statement
        $sql .= " WHERE email='$email'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("update_success");
            // header(('location:manageComplaint.php'));
        }

        // echo json_encode([$subject, $description, $location]);
    }

    mysqli_close($conn);
}

function deleteProfile()
{
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
    } else {
        

        $email = $_POST['email'];

        $sql = "DELETE FROM users WHERE email='$email'";


        $response = mysqli_query($conn, $sql);

        if ($response == 1) {
            echo json_encode("delete_success");
            // header(('location:manageComplaint.php'));
        }
    }
    mysqli_close($conn);
}
function notifications(){
    $conn = dbConnect();

    if (!$conn) {
        echo "Not Connected";
    } else {
        

        $email = $_POST['email'];

        
        $sql = "SELECT * from notifications WHERE email='$email' ORDER BY creation_time DESC LIMIT 10";
        $response = mysqli_query($conn, $sql);


        if (mysqli_num_rows($response) > 0) {
            $alldata = array();
            while ($data = mysqli_fetch_assoc($response)) {
                $complaintID = $data["complaint_id"];
                // $email = $data["email"];
                $message = $data["message"];
                // $category = $data["category"];
                $status = $data["status"];
                // $creationTime = $data["creation_time"];

                array_push($alldata, array("complaint_id" => $complaintID, "message" => $message, "status" => $status));
            }
            echo json_encode($alldata);
        }
        else{
            echo json_encode("empty");
        }
    }
    mysqli_close($conn);
}