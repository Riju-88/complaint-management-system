<?php
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['email'])) {
    header(('location:login.php'));
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="butcont"><button id="logout">Login</button></div>
    <script>
            let login=document.querySelector("#login");
         login.addEventListener("click",(e)=>{
            e.preventDefault();
            window.location.href="login.php";
         })
    </script>
</body>
</html> -->