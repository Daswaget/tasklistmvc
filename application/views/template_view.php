<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tasklist";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Task list</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
	<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
</head>
<body>
    <div class="container" style="background-color: #DCDCDC; width: 600px" ;>
        <div class='block'>Task list</div>
        <?php include 'application/views/'.$content_view; ?>
    </div>
</body>
</html>