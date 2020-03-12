<?php
$keys = array_keys($_REQUEST);
foreach($keys as $key)
{
	${$key} = $_REQUEST[$key] ;
}



header("Content-type: text/html; charset=utf-8");
include("check.php");

/* Added for ms as student page where we post the language name instead of taking from session */
/* So Database is to be changed accordingly.. */
	if(isset($to_lang))
	{
		$_SESSION['to_langSystem'] = $to_lang;
		$unset = true;
	}
	else
		$unset = false;
	
/* Ends here... */
include("constants.php");
include(CLASSFILES_PATH."/clsPassage.php");
include(CLASSFILES_PATH."/clsQuestion.php");
include(CLASSFILES_PATH."/clsQtype.php");
include(CLASSFILES_PATH."/clsSkill.php");

ini_set('mbstring.internal_encoding', 'UTF-8');
checkPermission("MNU");

mysql_query("SET NAMES 'utf8'");

if($unset)
	unset($_SESSION['to_langSystem']);


function utf8_urldecode($str)
{
	$str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
	return html_entity_decode($str,null,'UTF-8');;
}


if($class == "passage")
{
	$obj = new passage();
	
	$passageIdArr = array();
	$passageIdStr = "";
	$passageIdStr = $obj->getPassageOfGrade($grade,$type); 	
	echo $passageIdStr;
	//echo json_encode($passageIdArr);//$obj->getPrevComments();
}
else if($class == "qtype")
{
	$obj = new qtypeList();
	
	$qtypeIdArr = array();
	$qtypeIdStr = "";
	$qtypeIdStr = $obj->getQtypesOfCategory($queCategory,$quesType); 	
	//echo json_encode($qtypeIdArr);	
	echo $qtypeIdStr;
}
else if($type=='makeSubSkill')
{
	$subSkillArr = array();	
	$objSkill = new skill();
	$subSkillArr = $objSkill->getSubskill($skill);
	echo json_encode($subSkillArr);
}
else if($type=='skill')
{
	$skillArr = array();	
	$objSkill = new skill();
	$skillArr = $objSkill->getSkill('freeTypeQues','msAsStudent');
	$skillArrStr = implode(',',$skillArr);
	print_r($skillArr);
}
else if($type=='getSkillByLevel')
{
	$skillArr = array();	
	$objSkill = new skill();
	$skillArr = $objSkill->getSkillByLevel($levelNo, $queType ,$skill);		
	print_r(json_encode($skillArr));
}
else if($type=='getChildSkills')
{
	$skillArr = array();	
	$objSkill = new skill();
	if(!empty($skill)){
		$skillArr = $objSkill->getSkillByLevel($levelNo, $queType ,$skill);
	}
		
	print_r(json_encode($skillArr));
}

else if($type=='get_pm_name')
{
	$objPmName = mysql_query("select proManager from educatio_mshindi.project");

	while ($row=mysql_fetch_array($objPmName)) {
		$pmName['pmanager'] = $row['proManager'];
	}		
	print_r(json_encode($pmName));
}

else if($type=='get_school_info')
{
	$objResultSet = mysql_query("select schoolNo, schoolName,city,pincode,state,address,contact_no_1,email,contact_person_1,mobile_no_1,contact_mail_1,total_teachers,highest_class,lowest_class,board,mediums from educatio_educat.schools where schoolno =".$schoolCode);

	while ($rw=mysql_fetch_array($objResultSet))
    	{
    		$schoolInfo['schoolCode'] = $rw['schoolNo'];
    		$schoolInfo['sname'] = $rw['schoolName'];
    		$schoolInfo['saddr'] = $rw['address'];
    		$schoolInfo['spcode'] = $rw['pincode'];
    		$schoolInfo['state'] = $rw['state'];
    		$schoolInfo['district	'] = $rw['city'];
    		$schoolInfo['spno'] = $rw['contact_no_1'];
    		$schoolInfo['smail'] = $rw['email'];
    		$schoolInfo['spname'] = $rw['contact_person_1'];
    		$schoolInfo['pcno'] = $rw['mobile_no_1'];
    		$schoolInfo['pmail'] = $rw['contact_mail_1'];
    		$schoolInfo['sstr'] = $rw[''];
    		$schoolInfo['noOfTeach'] = $rw['total_teachers'];
    		$schoolInfo['hclass'] = $rw['highest_class'];
    		$schoolInfo['lclass'] = $rw['lowest_class'];
    		$schoolInfo['board'] = $rw['board	'];
    		$schoolInfo['medium'] = $rw['mediums'];
    		$schoolInfo['pr_start'] = $rw[''];
    		$schoolInfo['pr_end'] = $rw[''];
    		$schoolInfo['block'] = $rw['block'];
    	}

    	print_r(json_encode($schoolInfo));
}

elseif ($type=='checkListSchoolCode') 
{
	$arrInpSchoolCode = explode(',', $schoolCode);

	$query = mysql_query("SELECT schoolno from educatio_educat.schools");
	
	$arrSchoolCode = array();
	while($row=mysql_fetch_assoc($query)){
	$arrSchoolCode[] = $row['schoolno'];
	}

	$result = array_diff($arrSchoolCode, $arrInpSchoolCode);

	$invalSchoolCode = array();
	foreach ($arrInpSchoolCode as $key => $value) {
		if (!in_array($value, $arrSchoolCode)) {
			array_push($invalSchoolCode, $value);
		}
	}

	$res = implode(',', $invalSchoolCode);

    print_r(json_encode($res));
}
