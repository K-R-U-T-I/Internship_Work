<?php

	include 'connect.php';

		// initializing variables
	$action=$_REQUEST['action'];	
	$id = $_POST['id'];
	$block = $_POST['block'];
	$devices = $_POST['noOfD'];
	$durationOfPeriod = $_POST['duOfP'];
	$noOfPeriod = $_POST['noOfP_ms_week'];
	$sub = implode(',',$_POST['sub'] );
	$med = $_POST['medium'];
	$scType = $_POST['sch_type'];
	$amName = $_POST['am_name'];
	$licName = $_POST['lic_name'];
	$epmName = $_POST['epm_name'];

	switch ($action) {

		case 'insert':
				
				/*Query for insert*/
				 $ins = "INSERT INTO educatio_mshindi.mshindi_areaMapping (`block`,`noOfDevices`,`durationOfPeriod`,`noOfPeriodMS`,`subject`,`medium`,`schoolType`,`amName`,`licName`,`epmName`) VALUES ('$block','$devices','$durationOfPeriod','$noOfPeriod','$sub','$med','$scType','$amName','$licName','$epmName')";
			
				 $insQuery = mysql_query($ins);

				if ($insQuery) 
				{
					$_SESSION['sp_success'] = "<h2>Data has been successfully inserted! </h2>";
					header('location:viewSchool.php');
				}
				else
				{
					echo "<h1> Couldn't insert data. </h1>" .mysql_error($conn);
				}

			break;

			case 'update':

					/*Query for update data */
					$upd = "UPDATE educatio_mshindi.mshindi_areaMapping SET `block`='$block', `noOfDevices`='$devices', `durationOfPeriod`='$durationOfPeriod', `noOfPeriodMS`='$noOfPeriod', `subject`='$sub', `medium`='$med', `schoolType`='$scType', `amName`='$amName', `licName`='$licName', `epmName`='$epmName' WHERE `schoolno`='$id'";

					$updQuery = mysql_query($upd);

						if($updQuery)
				 		{
				 			$_SESSION['us_success'] = "<h2> Data has been successfully updated.</h2>";
				 			header('location:viewSchool.php');	
				 		}
				 		else
				 		{
				 			echo "<h1> Could not update data. </h1>";
				 		}
				
			break;
	}
	
?>