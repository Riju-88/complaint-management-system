<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        if (name_dlg_temp.value != "") {
            if (/[^\w\d]/g.test(name_dlg_temp.value)) {
                console.log("Name can only contain letters and numbers" + name_dlg_temp.value);
                // res.innerHTML = "Name can only contain letters and numbers";
            } else {

            }
        }


        // fetch
        let storedData;

// Add an event listener to the element that listens for the "click" event
document.getElementById("my-button").addEventListener("click", function() {
  async function getData() {
    // Make the fetch request
    const response = await fetch('https://example.com/api/data');

    // Wait for the response to be returned, and then get the data
    const data = await response.json();

    // Assign the value of the "name" property to the storedData variable
    storedData = data.name;
  }

  // Call the getData function when the "click" event occurs
  getData();
});

// You can access the storedData variable outside of the click event function here
console.log(storedData);


    </script>
    <?php
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $email = $_POST['email'];
    
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
    
    // Start building the UPDATE statement
    $sql = "UPDATE complaint SET ";
    
    // Add the fields that are always included in the UPDATE statement
    $sql .= "subject='$subject', description='$description', location='$location', category='$category'";
    
    // If the image file is not empty, add the evidenceImage field to the UPDATE statement
    if (!empty($_FILES["image"]["name"])) {
        $sql .= ", evidenceImage='$target_file'";
    }
    
    // Add the WHERE clause to the UPDATE statement
    $sql .= " WHERE email='$email'";
    


    // admin overview
    $sql = "SELECT * from complaint ORDER BY DESC LIMIT 5";

    // Total complaints of each type in admin panel
    // Admin panel will be separate(CMS_Admin folder)
    // Overview will show recent 5 complaints desc order
    // each type of total complaints box will open a page containing the list of that type of complaints(table)
    // add view button on that list
    // View button should fill the data in a form
    // Add 4 buttons in that form
    // Cancel, Assign staff, move to pending, move to completed/fulflled, move to rejected
    ?>
</body>

</html>