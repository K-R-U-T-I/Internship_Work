<?php
	
	@include("check.php");
	include("constants.php");
	checkPermission("MSG");
	
	$keys = array_keys($_REQUEST);
	foreach ($keys as $key){
		${$key} = $_REQUEST[$key];
	}
	
?>

<html>
<head>
<title>Project List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link type="text/css" href="css/admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body bgcolor="#FFFFFF">
	<?php include("menu.php"); ?>

		<h2 align="center">Project List</h2><BR>

		<div class="add_pro">
		  		<a type="button" class="btn btn-primary" href="addProject.php"> Add New </a>
		</div>

		<table id="project" class="info">
			  <tr>
			    <th>Project Name</th>
			    <th>Manager</th>
			    <th>List of School Code</th>
			    <th>Funder</th>
			    <th>Status</th>
			    <th>Action</th>
			    <th></th>
			  </tr>

			<?php

				$projectQuery = "SELECT * FROM educatio_mshindi.project";
			    @$projectRes = mysql_query($projectQuery);
			      
			    while(@$row=mysql_fetch_assoc($projectRes)){

	     	?>

			<tr>
			    <td><?php echo $row['proName']; ?></td>
			    <td>
			    	<?php 

			    		$managerQuery = "SELECT * FROM educatio_mshindi.vernacularTeam WHERE memberID=".$row['proManagerID']." "; 
			    		$managerQueryRes = mysql_query($managerQuery);
			    		$result1 = mysql_fetch_assoc($managerQueryRes);

			    		echo $result1['fullName']; 
			    	?>
				</td>
			    <td><?php echo $row['listSchCode']; ?></td>
			    <td>
			    	<?php 

						 	$funderQuery = "SELECT * FROM educatio_mshindi.funder WHERE 
										funderID=".$row['proFunderID']." AND active= '1'";
			    			$funderQueryRes = mysql_query($funderQuery);
			    			$result2 = mysql_fetch_assoc($funderQueryRes);

			    			echo $result2['funderName']; 
			    	?>
			    </td>
			    <td>Active</td>
			  	<td><a type="button" class="btn btn-success" href="http://verna/MSLang_guj/addProject.php?pro_id=<?php echo $row['proID']; ?>">Edit</a></td>
			  	<td>
			  		<button type="button" class="btn btn-primary">Approve</button>
			  		<button type="button" class="btn btn-warning">Reject</button>
			  	</td>
			</tr>
			  
	        <?php }?>

		</table>

</body>
</html>