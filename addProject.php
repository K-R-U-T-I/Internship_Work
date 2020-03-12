<?php
	include("check.php");
	header("Content-type: text/html; charset=utf-8");
	include("constants.php");
	checkPermission("MSG");

error_reporting(E_ERROR | E_PARSE |E_CORE_ERROR | E_CORE_WARNING);
	
	$keys = array_keys($_REQUEST);
	foreach ($keys as $key){
		${$key} = $_REQUEST[$key];
	}
	
    $id = $_GET['pro_id'];		/**/

    $projectQuery = "SELECT * FROM educatio_mshindi.project WHERE proID=$id";
    $projectResult = mysql_query($projectQuery);
    @$row = mysql_fetch_assoc($projectResult);
    
    if ($id==''){
        $action='insert';		/*Will Insert Data*/
    } 
    else{
        $action='update';		/*Will Update Data*/
    }    
?>

<html>
<head>
<title>Add Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link type="text/css" href="css/admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/validation.js"></script>
</head>

<body>

	<?php include("menu.php"); ?>				<!-- NAV -->

	<div class="container-fluid">					<!-- START Container -->
        <div class="card">
            <div class="card-body">

                <div class="row">						<!-- START row-->
                  	<div class="col-md-12">
                													<!-- START form -->
              		<form class="form-validate form-horizontal" action="addProject_action.php" method="post" enctype="multipart/form-data" onsubmit="return add_pro()" >	

						<input type="hidden" name="id" value="<?php echo $row['proID']; ?>" >
						<input type="hidden" name="action" value="<?php echo $action; ?>" >	
						<br>
                      
                    	<fieldset><legend>Add Project</legend></fieldset>

	                  	<fieldset>
		                    <div class="form-group">		                      
		                      	<label class="col-sm-2 control-label">Project Name<span>*</span>  </label>
		                        <div class="col-sm-6">
		                        	<input class="form-control" type="text" name="pname" id="pname" required="" value="<?php echo $row['proName']; ?>">
		                        </div>
		                    </div>
	                  	</fieldset>
                      
                      	<fieldset>
	                        <div class="form-group">
	                          	<label class="col-sm-2 control-label">State
		                      		<span>*</span>
	                          	</label>
	                          	<div class="col-sm-6">
	                            	<input class="form-control" type="text" name="state" id="pstate" required="" value="<?php echo $row['state']; ?>">
	                          	</div>
	                        </div>
                      	</fieldset>

                      	<fieldset>
	                        <div class="form-group">
	                          	<label class="col-sm-2 control-label">District
		                      		<span>*</span>
	                          	</label>
	                          	<div class="col-sm-6">
	                            	<input class="form-control" type="text" name="district" id="pdistrict" required="" value="<?php echo $row['district']; ?>">
	                          	</div>
	                        </div>
                      	</fieldset>

	                    <fieldset>
	                        <div class="form-group">
	                          	<label class="col-sm-2 control-label">List of School Codes
		                      		<span>*</span>
	                          	</label>
	                          	<div class="col-sm-6">
	                            	<input class="form-control" onblur="checkListSchoolCode(this.value)" type="text" name="list_schCode" id="list_schCode" required="" value="<?php echo $row['listSchCode']; ?>">
	                            	<div class="validSchoolCode" id="validMsg">
	                            		<a>Invalid School Code </a>
	                            	</div>
								</div>
	                        </div>
	                    </fieldset>

	                    <fieldset>
	                        <div class="form-group">
	                          	<label class="col-sm-2 control-label">Project Manager 
		                      		<span>*</span>
	                          	</label>
	                            <div class="col-sm-6">
		                          	<select class="form-control" name="manager" id="pmanager"> 	
		                              	<option value="">Select</option>	
		                        <?php
									$vernaTeamQuery = "SELECT * FROM educatio_mshindi.vernacularTeam WHERE `post` = 'PM'";
									$vernaTeamResult = mysql_query($vernaTeamQuery);
									while ($row1 = mysql_fetch_assoc($vernaTeamResult)) {
								?>
		                              	<option value="<?php echo $row1['memberID']; ?>">
		                              		<?php echo $row1['userName']; ?>		                              		
		                              	</option>						
		                              <?php 	}	?>
		                            </select>
	                            </div>
	                        </div>
	                    </fieldset>

	                    <fieldset>
	                        <div class="form-group">
	                          	<label class="col-sm-2 control-label">Project Funder 
		                      		<span>*</span>
	                          	</label>
	                            <div class="col-sm-6">
	                    			<select class="form-control" name="funder" id="pfunder">
		                              	<option value="">Select</option>						
		                              	<?php
		                              				$funderQuery = "SELECT * FROM educatio_mshindi.funder WHERE active=1 ";
		                              				$funderResult = mysql_query($funderQuery);
		                              				while ($row2 = mysql_fetch_assoc($funderResult)) {
		                              	?>		
		                              	<option value="<?php echo $row2['funderID']; ?>">
		                              		<?php echo $row2['funderName']; ?></option>
		                              	<?php }	?>
		                            </select>              
	                            </div>
	                        </div>
	                    </fieldset>

		                <fieldset>
		                    <div class="form-group">
								<label class="col-sm-2 control-label">Project Duration 
		                      		<span>*</span>
								</label>
		                        <div class="col-sm-6">

					                    <div class="duration_start">
					                      	<input class="form-control" type="date" name="start" id="pd_start" required="" value="<?php echo $row['proStart']; ?>"> 
					                      	<span id="pdst"></span>
					                      	<div class="mda-form-control-line"></div>
					                    </div>

					                    <div class="label-to">
					                    	<label class="col-sm-2">To </label>
					                    </div>
					                    
					                    <div class="duration_end">
				                            <input class="form-control" type="date" name="end" id="pd_end" required="" value="<?php echo $row['proStart']; ?>" >
						                    <span id="pden"></span>
						                    <div class="mda-form-control-line"></div>
					                    </div>
			                	</div>
							</div>
		                </fieldset>

			           	<div class="submit-button">
			               <button class="btn btn-primary" name="submit" type="submit">Submit
			               </button>
			            </div>                      
                    </form>									<!-- END form-->
                  	</div>
                </div>											<!-- END row-->
            </div>
        </div>
    </div>														<!-- END Container -->
</body>

<script type="text/javascript">

function checkListSchoolCode(schoolCode) {

	var schoolCode = schoolCode;

	$.ajax({ 
    url: 'makeDropDown.php?type=checkListSchoolCode&schoolCode='+schoolCode,
    type: 'get',
    async: false,
    success: function(output) {
      
    var arrSchoolCode = JSON.parse(output);

	    if(jQuery.isEmptyObject(arrSchoolCode) === false){
	        $('#validMsg').show();
	        $('#validMsg').append(arrSchoolCode);
	    }
  	}
});	
}
</script>
</html>

