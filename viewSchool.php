<?php
	include 'connect.php';

	@include("check.php");
	error_reporting(E_ERROR | E_PARSE |E_CORE_ERROR | E_CORE_WARNING);
	include("constants.php");
	checkPermission("MSG");
	
	$keys = array_keys($_REQUEST);
	foreach ($keys as $key){
		${$key} = $_REQUEST[$key];
	}
	
?>

<html>
<head>
<title>School List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link type="text/css" href="css/admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

	<?php include("menu.php"); ?>

		<h2 align="center">School List</h2><BR>

		<div class="add_pro">
		  		<a type="button" class="btn btn-primary" href="addSchool.php"> Add New </a>
		</div>

		<table id="project">

			  <tr>
			    <th>School Name</th>
			    <th>DISE Code</th>
			    <th>School Code [EI]</th>
			    <th>State</th>
			    <th>District</th>
			    <th>Action</th>
			    <th></th>
			  </tr>

			<?php

				$select = "SELECT * FROM educatio_educat.schools WHERE `schoolNo`=311402";
			    $qry = mysql_query($select);
			      
			    while(@$row=mysql_fetch_assoc($qry)){

			?>

			<tr>
			    <td><?php echo $row['schoolName']; ?></td>
			    <td>123</td>
			    <td><?php echo $row['schoolNo'];	?></td>
			    <td><?php echo $row['state']; ?></td>
			    <td><?php echo $row['city']; ?></td>
			    <td><a type="button" class="btn btn-success">Edit</a></td>
			  	<td>
			  		<button type="button" class="btn btn-primary">Approve</button>
			  		<button type="button" class="btn btn-warning">Reject</button>
			  	</td>		  	
			</tr>

			<?php } ?>
			  
		</table>

</body>
</html>