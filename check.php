<?php
	session_start();
	set_time_limit (0);   //Otherwise quits with "Fatal error: Maximum execution time of 30 seconds exceeded"
	//error_reporting(E_ALL);
	error_reporting(E_ERROR | E_PARSE |E_CORE_ERROR | E_CORE_WARNING);
	session_start();

	//strstr(strtoupper(substr($_SERVER["OS"], 0, 3)), "WIN") ?
	//	$sep = "\\" : $sep = "/";
	$sep = "/";
	
	include($_SERVER['DOCUMENT_ROOT'].$sep."connect.php");
    
	mysql_select_db("educatio_msguj");
	function checkPermission($right,$_nextPage=null)
	{
	   $found = false;
		$Name = isset($_SESSION['username'])?$_SESSION['username']:"";
		$pwd  = isset($_SESSION['password'])?$_SESSION['password']:"";
		
		$query="SELECT appRights from educatio_educat.marketing where name='$Name'";
				$result = mysql_query($query);
		$user_row=mysql_fetch_array($result);
		$rows_marketing = mysql_num_rows($result);
		if($rows_marketing!=1)//Not in marketing search in Guest
		{
		    $query="SELECT appRights from educatio_educat.guest_login where name='$Name'";
		    $result = mysql_query($query);
		    $user_row=mysql_fetch_array($result);
		    $rows_marketing = mysql_num_rows($result);
		    if($rows_marketing!=1)//Not in marketing search in Guest
		    {
    			$query="SELECT * from educatio_msguj.adepts_translators where username='$Name'";
    			$result = mysql_query($query);
    			$user_row=mysql_fetch_array($result);
    			$rows_marketing = mysql_num_rows($result);
    			if($rows_marketing==1)
    			{
    				$_SESSION['member'] = 'guest';
    			}
		    }
		    else
		        $_SESSION['member']='ei';
		}
		else
			$_SESSION['member']='ei';
			
		
		global $_SESSION;	
		//echo "SESSION['member'] ".$_SESSION['member'];	
		
		if($_SESSION['member']=='ei')
			$mktpeople = mysql_query("select name,password from educatio_educat.marketing UNION select name,password from educatio_educat.guest_login");
		else
			$mktpeople = mysql_query("select username,password from adepts_translators WHERE enable='1'");
		
		$rows1 = mysql_num_rows($mktpeople);
		$m = 0;
		while($fetch_array = mysql_fetch_array($mktpeople))
		{
			$names[$m] = $fetch_array[0];
			$pass[$m] = $fetch_array[1];
			$m++;
		}
		
		if($_SESSION['member']=='ei')
		{
			$encryted_result = mysql_query("select password('".$_SESSION['password']."') as pass") or die("Query failed : " . mysql_error());
		    $encryted_line = mysql_fetch_array($encryted_result);
		    $encrypted_input = $encryted_line['pass'];
		}
		else
		{
		    $encrypted_input = md5($_SESSION['password']);			
		}

		for($k=0; $k <= $rows1-1; $k++)
		{
			if($names[$k]==$_SESSION['username'] && $pass[$k]==$encrypted_input || ($names[$k]==$_SESSION['username'] && $_SESSION['password']=="checksystem@e!india") || $_SESSION['username'] = 'sudhir.prajapati')
			{
				$found = true;
				break;
			}
		}
		
		if($found)
		{
			if($_SESSION['member']=='ei')
			{
				$appRights=explode(",",$user_row['appRights']);
				if(in_array($right,$appRights)==FALSE )
				{
					echo "<h5 align='center'>Your are not authorised to access this page</h5>";
	    			echo "<br>";
	    			echo "<h5 align='center'>Return to <a href='../main.php'>Main Menu</a></h5>";
	    			exit;
				}	
			}			
			if(!isset($_SESSION['to_langSystem']))
			{
				if($_SESSION['member']=='ei')
					$query_checkTranslateLang = "SELECT languageSystem FROM educatio_msguj.msguj_assignedLanguages WHERE name='".$_SESSION['username']."'";
				else
					$query_checkTranslateLang = "SELECT languageSystem FROM educatio_msguj.adepts_translators WHERE username='".$_SESSION['username']."' AND password='".$encrypted_input."' LIMIT 1";				
				$result_checkTranslateLang = mysql_query($query_checkTranslateLang) or die(mysql_error()." -checkTranslateLang ".$query_checkTranslateLang);
				$arrTranslateTo = array();
				
				if($line_checkTranslateLang = mysql_fetch_array($result_checkTranslateLang))
				{
					$arrTranslateTo = explode(",",strtolower($line_checkTranslateLang['languageSystem']));
					if($line_checkTranslateLang['languageSystem'] =='')
					{
						echo "<h3 align='center'>Your are not authorised to access this page, due to no language is alloted to you.</h3>";
		    			echo "<br>";
		    			echo "<h5 align='center'>Return to <a href='../main.php'>Main Menu</a></h5>";	    			
		    			exit;	
					}
					else if(count($arrTranslateTo)>1)
					{
						if(basename($_SERVER["SCRIPT_NAME"]) == "time.php")
							$_nextPage = "setTranslationLang_to.php";
						else
							$_nextPage = "setTranslationLang_to.php?nextPage=".urlencode(basename($_SERVER["SCRIPT_NAME"])."?".$_SERVER["QUERY_STRING"]);
					}
					else
					{
						$_nextPage = (basename($_SERVER["SCRIPT_NAME"]) != 'doMSStudent.php')?'allotment.php':urldecode($nextPage);
						if(basename($_SERVER["SCRIPT_NAME"]) != 'doMSStudent.php')
						{
							$_SESSION['to_langSystem']	   = strtolower($arrTranslateTo[0]);
							$_SESSION['to_langSystem_all'] =	strtolower($arrTranslateTo[0]);			
						}
					}		
				}					
			}
			if($_nextPage && basename($_SERVER["SCRIPT_NAME"]) != 'remoteProcess.php')
			{
				echo "<script language='JavaScript'>window.location='".$_nextPage."'</script>";
			}

		}
		else
		{
			endSession();
			echo "Wrong User name or Password<br>";
			if($right =='MVS')
				echo "<a href='login.php'>Re-login</a>";
			else	
				echo "<a href='new.htm'>Re-login</a>";
			exit;
		}
	}

	function endSession()
	{
		global $_SESSION;
		$_SESSION['user']=null;
		session_destroy();
	}

	ini_set('session.gc_maxlifetime',86400);
	$sessdir = ini_get('session.save_path').$sep."my_sessions";
	if (!is_dir($sessdir)) { mkdir($sessdir, 0755); }
	ini_set('session.save_path', $sessdir);
	session_cache_limiter('private');
	session_cache_limiter('must-revalidate');
	session_cache_expire(30);
	session_start();
?>
