<?php

	include ("connect.php");

	// initializing variables
	$action=$_REQUEST['action'];	
	$id = $_POST['id'];
	$pro_name = $_POST['pname'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$sch_code = $_POST['list_schCode'];
	$pro_man = $_POST['manager'];
	$pro_fun = $_POST['funder'];
	$pro_start = $_POST['start'];
	$pro_end = $_POST['end'];

	switch ($action) {

		case 'insert':
				
				/*Query for insert*/
				$insertProject = "INSERT INTO educatio_mshindi.project (`proName`,`state`,`district`,`listSchCode`,`proManagerID`,`proFunderID`,`proStart`,`proEnd`) VALUES ('$pro_name','$state','$district','$sch_code','$pro_man','$pro_fun','$pro_start','$pro_end')";
			
				$insertProjectRes = mysql_query($insertProject);

				if ($insertProjectRes) 
				{
					header('location:projectList.php');
				}
				else
				{
					echo "<h1> Couldn't insert data. </h1>" .mysql_error();
				}

			break;

			case 'update':

					/*Query for update data */
					$updateProject = "UPDATE educatio_mshindi.project SET `proName`='$pro_name', `state`='$state', `district`='$district', `listSchCode`='$sch_code', `proManagerID`='$pro_man', `proFunderID`='$pro_fun', `proStart`='$pro_start', `proEnd`='$pro_end' WHERE `proID`='$id'";

					$updateProjectRes = mysql_query($updateProject);

						if($updateProjectRes)
				 		{
				 			header('location:projectList.php');	
				 		}
				 		else
				 		{
				 			echo "<h1> Could not update data. </h1>" .mysql_error();
				 		}
				
				break;		
	}
		
?>