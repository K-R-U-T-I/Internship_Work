function add_pro()
{
	var pro_name=document.getElementById('pname');	
	var pro_duration_start = document.getElementById('pd_start');
	var pro_duration_end = document.getElementById('pd_end');

	if(pro_name.value=='')
	{
		//alert('Enter Name');
		document.getElementById('valid_pname').style.display='none';
		pro_name.focus();
		return false;	
	}
	else if(pro_name.value.search(/^[A-Za-z ]+$/))
	{
		document.getElementById('valid_pname').style.display='';
		pro_name.focus();
		return false;
	}
	else
	{
		document.getElementById('valid_pname').style.display='none';
	}

	if (pro_duration_start.value=='0000-00-00' || pro_duration_start.value=='')
	{
		document.getElementById('valid_pdst').style.display='';
		pro_duration_start.focus();
		return false;
	}
	else
	{
		document.getElementById('valid_pdst').style.display='none';
	}

	if (pro_duration_end.value=='0000-00-00' || pro_duration_end.value=='')
	{
		document.getElementById('valid_pden').style.display='';
		pro_duration_end.focus();
		return false;
	}
	else
	{
		document.getElementById('valid_pden').style.display='none';
	}

	return true;
}




$(document).ready(function() {
 
$('#pname').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('#pmanager').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});	


 });