<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:loginpage.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>services list</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../bootstrap5/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="services_list.css">
</head>
<body>

<div class="services">
<?php
require "../all_files/header.php";
?>
<h2>our services</h2>
<ol type="">
<li><a href="#">financial service activities except insurence and pension funds</a></li>
<li><a href="#">trusts funds and other financial vehicle</a></li>
<li><a href="#">other financial activities</a></li>
<li><a href="#">fund management activities</a></li>
<li><a href="#">management of other investment funds</a></li>
</ol>
</div>
</body>
</html>