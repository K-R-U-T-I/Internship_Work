<?php
header("Content-type: text/html; charset=utf-8");
include("check.php");
include("constants.php");
//include("commonFunctions.php");
//include(CLASSFILES_PATH."/clsPassage.php");
checkPermission("MSG");

	$keys = array_keys($_REQUEST);
	foreach ($keys as $key){
		${$key} = $_REQUEST[$key];
	}

    $id = $_GET['s_id'];

    $sel = "SELECT * FROM `mshindi_areaMapping` WHERE mapping_id=$id";
    $qry = mysql_query($sel);
    @$row = mysql_fetch_assoc($qry);
    
    if ($id==''){
        $action='insert';
    } 
    else{
        $action='update';
    }

    $schoolCode = $_POST['scode'];

    $sel2 = "SELECT * FROM `educatio_educat.schools` WHERE `schoolno`='$schoolCode";
    $qry2 = mysql_query($conn,$sel2);
    $row2 = mysql_fetch_assoc($qry2);

?>

<html>
<head>
<title>Add School</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link type="text/css" href="css/admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/validation.js"></script>
</head>

<body>

	<?php include("menu.php"); ?>          <!-- Nav -->

  <div class="container-fluid">                 <!-- START container-->           
    <div class="card">
      <div class="card-body">
        <div class="row">                       <!-- START row-->
            <div class="col-md-12">
                                                        <!-- START form -->
              <form class="form-validate form-horizontal" action="addSchool_action.php" 
                	method="post" enctype="multipart/form-data"
                     onsubmit="" >

        						<input type="hidden" name="id" value="<?php echo $row2['schoolno']; ?>" >
        						<input type="hidden" name="action" value="<?php echo $action; ?>" ><br>

                      <fieldset><legend>Add School</legend></fieldset>

                    <fieldset>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">School Code [EI]</label>
                          <div class="col-sm-6">
                            <div class="scodeEI">
                              <input class="form-control" type="text" name="scode" id="scode" required="" >
                              <button class="btn" type="button" name="goBtn" id="goBtn" 
                                onclick="return getSchoolInfo($('#scode').val())">	Submit </button>
                            </div>
                          </div>
                        </div>
                    </fieldset>

              <div id="schoolinfo">       <!-- START schoolInfo -->

              <fieldset>
                <div class="form-group">
                  <label class="col-sm-2 control-label">School Name</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="text" name="sch_name" id="sname" required="" disabled="" value="<?php echo $row2['schoolName']; ?>">
                  </div>
                  <label class="col-sm-2 control-label">DISE Code</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="" name="dicode" id="dcode" required=""
                    	disabled="">
                  </div>
                </div>
              </fieldset>

              <fieldset>
		              <div class="form-group">
		                  <label class="col-sm-2 control-label">School Address</label>
		                  <div class="col-sm-6" style="width: 16%; float: left;">
		                    <!-- <input class="form-control" type="text" name="sch_adr" id="sadr" required="" 	disabled="" value="<?php //echo $row['']; ?>"> -->
		                    <textarea style="width: 100%; height: 10%;" disabled="" id="saddr">
                          <?php echo $row2['address']; ?></textarea>
		                  </div>		                
                        <label class="col-sm-2 control-label">School Pin Code </label>
                        <div class="col-sm-6" style="width: 16%; float: left;">
                          <input class="form-control" type="text" name="spcode" id="spcode" required="" 
                          	disabled="" value="<?php echo $row2['pincode']; ?>">
                        </div>
                    </div>
              </fieldset>

              <fieldset>
                <div class="form-group">
                  <label class="col-sm-2 control-label">State</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="text" name="state" id="state" required="" 
                            disabled="">
                  </div>  

                  <label class="col-sm-2 control-label">District</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="text" name="district" id="district" required="" disabled="" value="<?php echo $row2['city'];  ?>">
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <div class="form-group">
                  <label class="col-sm-2 control-label">School Phone No.</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="number" name="sno" id="spno" required="" disabled="">
                  </div>
                
                  <label class="col-sm-2 control-label">School Email ID</label>
                  <div class="col-sm-6" style="width: 16%; float: left;">
                    <input class="form-control" type="email" name="smail" id="smail" required="" disabled>
                  </div>
                </div>
              </fieldset>

              <fieldset>
	                <div class="form-group">
	                  <label class="col-sm-2 control-label">School Principal Name</label>
	                  <div class="col-sm-6" style="width: 16%;">
	                    <input class="form-control" type="text" name="sp_name" id="spname" required="" disabled="">
	                  </div>
	                </div>
	            </fieldset>

		            <fieldset>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Principal Contact No.</label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="number" name="pcno" id="pcno" required=""		disabled >
                      </div>
                    
                      <label class="col-sm-2 control-label">Principal Email ID </label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="email" name="pmail" id="pmail" required=""
                        		disabled>
                      </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">School Strength</label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="number" name="sch_stren" id="sstr" required="" disabled>
                      </div>

                      <label class="col-sm-2 control-label">No. of Teachers</label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="number" name="noOfTeach" id="noOfTeach" required="" disabled>
                      </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Highest Class</label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="text" name="hclass" id="hclass" required="" disabled value="<?php echo $row2['highest_class']; ?>">
                      </div>
                    
                      <label class="col-sm-2 control-label">Lowest Class</label>
                      <div class="col-sm-6" style="width: 16%; float: left;">
                        <input class="form-control" type="text" name="lclass" id="lclass" required="" disabled value="<?php echo $row2['lowest_class']; ?>">
                      </div>
                    </div>
                </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Board</label>
		                  <div class="col-sm-6">
		                    <input class="form-control" type="text" name="board" id="board" required="" disabled value="<?php echo $row2['board']; ?>">
		                  </div>
		                </div>
		            </fieldset>

                <fieldset>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Medium</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" name="medium" id="medium" required="" disabled="">
                      </div>
                    </div>
                </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Program Start Date</label>
		                  <div class="col-sm-6" style="width: 16%; float: left;">
                      		<input class="form-control" type="text" name="start" id="pr_start" required=""		disabled> 
		                  </div>
		                
		                  <label class="col-sm-2 control-label">Program End Date</label>
		                  <div class="col-sm-6" style="width: 16%; float: left;">
                      		<input class="form-control" type="text" name="end" id="pr_end" required=""
                      			disabled> 
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Block
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6" >
		                    <input class="form-control" type="text" name="block" id="block" required="" >
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">No. of Devices
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6" style="width: 100px; float: left;">
		                    <input class="form-control" type="number" name="noOfD" id="noOfD" required="" >
		                  </div>
		                
		                  <label class="col-sm-2 control-label" style="padding:7px 15px 0; width:120px;">Duration of Period <span>*</span>
                      </label>
		                  <div class="col-sm-6" style="width: 110px; float: left;">
		                  <input class="form-control" type="text" name="duOfP" id="dur_per" required="" >
		                  </div>

		                  <label class="col-sm-2 control-label" style="padding:7px 15px 0; width:170px;">No. of Periods For Mindspark in week
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6" style="width: 100px; float: left;">
		                    <input class="form-control" type="number" name="noOfP_ms_week" id="noOfP_ms_week" required="" >
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Subjects
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6" style="width: 200px; float: left;">
		                    <div class="checkbox c-checkbox" >
                          <label>
                            <input type="checkbox" class="chk-sub" name="sub[]" id="sub" value="Maths">
                            <span class="ion-checkmark-round"></span> Maths
                           </label>
                        </div>  
                        <div class="checkbox c-checkbox">
                            <label>
                              <input type="checkbox" class="chk-sub" name="sub[]" id="sub" value="Language">
                              <span class="ion-checkmark-round"></span> Language
                            </label>
                        </div>
                        <div class="checkbox c-checkbox">
                            <label>
                              <input type="checkbox" class="chk-sub" name="sub[]" id="sub" value="EnglishSL">
                                <span class="ion-checkmark-round"></span> English [SL]
                            </label>
                        </div>
		                  </div>

                        <div class="col-sm-6" style="margin: 0 0 6px 0;">
                            <label class="col-sm-2 control-label">Medium
                            <span>*</span>
                            </label>
                        </div>
                          <div class="col-sm-6">
                            <select class="form-control" name="medium" id="medium" required="" 
                            		style="width: 100px;">
                              	<option value="">Select</option>
                								<option value="English">English</option>
                								<option value="Gujarati">Gujarati</option>
                								<option value="Hindi">Hindi</option>
                								<option value="Telugu">Telugu</option>
                            </select>
                          </div>
		                </div>
                </fieldset>

					      <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Academic year details
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6">
		                    <input class="form-control" type="date" name="academicDet" id="aca_yr_det" required="" style="width: 200px; float: left;" >
		                    <input class="form-control" type="date" name="academicDet" id="aca_yr_det" required="" style="width: 200px; float: left; margin: 0 0 0 15px;" >
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Schools Type
                        <span>*</span>
                      </label>
                      <div class="col-sm-6">                            
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Adarsh" id="sch_type">
                            <span class="ion-record"></span> Adarsh
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Model" id="sch_type">
                            <span class="ion-record"></span> Model
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Himachal" 
                                id="sch_type">
                            <span class="ion-record"></span> Himachal
                          </label>
                        </div>                        
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Demo" id="sch_type">
                            <span class="ion-record"></span> Demo
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Chhattisgarh" 
                                id="sch_type">
                            <span class="ion-record"></span> Chhattisgarh
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Uttarakhand" 
                                  id="sch_type">
                            <span class="ion-record"></span> Uttarakhand
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Madhya Pradesh" 
                                id="sch_type">
                            <span class="ion-record"></span> Madhya Pradesh
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="HZL" id="sch_type">
                            <span class="ion-record"></span> HZL
                          </label>
                        </div>
                        <div class="radio c-radio c-radio-nofont">
                          <label>
                            <input type="radio" required="" name="sch_type" value="Andhra Pradesh"  
                                id="sch_type">
                            <span class="ion-record"></span> Andhra Pradesh
                          </label>
                        </div>
                      </div>
                  </div>
                </fieldset>		            

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Associate Manager Name
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6">
		                    <input class="form-control" type="text" name="am_name" id="am_name" 
                            required="" >
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">LIC Name
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6">
		                    <input class="form-control" type="text" name="lic_name" id="lic_name" 
                              required="" >
		                  </div>
		                </div>
		            </fieldset>

		            <fieldset>
		                <div class="form-group">
		                  <label class="col-sm-2 control-label">EPM Name
                        <span>*</span>
                      </label>
		                  <div class="col-sm-6">
		                    <input class="form-control" type="text" name="epm_name" id="epm_name" required="" >
		                  </div>
		                </div>
		            </fieldset>  

                <div class="submit-btn-sch">
                  <button class="btn btn-primary" type="submit" id="btnSubmitSch" onclick="return validateChkBox()">Submit</button>
                </div>

              </div>               <!-- END schoolInfo -->
                      
              </form>         <!-- END form-->

          </div>
        </div>        <!-- END row-->
      </div>
    </div>
  </div>          <!-- END container-->

<script type="text/javascript">

function validateChkBox() {

  $('#btnSubmitSch').click(function(event) {
        if($('.chk-sub:checked').length > 0)
        {
          return true;
        }else{ 
        alert('You must check at least one subject Maths, Language or English');
          return false;
        }
}
</script>

</body>

<script type="text/javascript">

	var block = $('#block').val();
	var noOfDevice = $('#noOfD').val();
	var period_duration = $('#dur_per').val();
	var noOfPeri_week = $('#noOfP_ms_week').val();
	var medium = $('#med_instr').val();
	var sch_type = $('#sch_type').val();
	var academic_Detail = $('#aca_yr_det').val();
	var package = $('#package').val();
	var am_name = $('#am_name').val();
	var lic_name = $('#lic_name').val();
	var epm_name = $('#epm_name').val();

function getSchoolInfo(schoolCode){

if(schoolCode == "" || schoolCode == null){
  alert('Please enter schoolCode'); return false;
}
  $.ajax({ 
    url: 'makeDropDown.php?type=get_school_info&schoolCode='+schoolCode,
    type: 'get',
    async: false,
    success: function(output) {
      
      console.log(output);

      var arrSkillInfo = JSON.parse(output);

      if(jQuery.isEmptyObject(arrSkillInfo) === false){
        $('#schoolinfo').show();

        $.each(arrSkillInfo, function(key, value) {   
          $('#'+key).val(value); 
        });
      }
      else{
        alert('Incorrect School Code');
      }
  }
  });
}

				
		function add_school(block,noOfDevice,period_duration,noOfPeri_week,medium,sch_type,academic_Detail,package,am_name,lic_name,epm_name) 
		{					
          $.ajax({
					url:'http://verna/MSLang_guj/addPro.php',
					type:'post',
					data:{Block:block,NoOfDevice:noOfDevice,Distinct:distinct,NOS:number,Pman:manager,Pfunder:funder,Duration_start:start,Duration_end:end},
					/*dataType:'text',*/

					success: function(data){
      		      window.location="http://verna/MSLang_guj/pro_management.php";
      		},

        	error: function(errorThrown){
   				       alert('request failed');
	    		}
				});
    }
</script>
</html>