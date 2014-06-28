<?php
include('connection.php');
if($_SESSION['user_name']=='')
		{
			header("location:index.php");
		}
require_once 'page.php';
 $s_id=$_REQUEST['s_id'];
 $pin_code=$_REQUEST['pin'];
 $as_id=$_REQUEST['asm_id'];
 //query for showing whole assembly list from a particuler state 
$result=mysql_query("select m.tool_constituency_id,m.tool_constituency_name,p.tool_pname from map_constituencies m,parliamentary_constituency p where        (p.tool_pconstituency_id=m.tool_pconstituency_id) and p.tool_state_district='$s_id' order by p.tool_pname ");
if(isset($_POST['submit']))
{
	$tool_id=$_POST['tool_id'];
	 $update_query="update insert_pin set tool_constituency_id='$tool_id' where pincode='$pin_code' ";
	$updateresult=mysql_query($update_query);
    if($updateresult)
		{
		echo "Pincode updated Successfully";
		}
}
while(list($ac_id,$ac_name,$pc_name)=mysql_fetch_array($result))
   {
   if($as_id==$ac_id)
        {
	$options.="<option value='$ac_id' selected='selected'>$pc_name - $ac_name </option>";
	    }
      $options.="<option value='$ac_id' >$pc_name - $ac_name </option>";
		
   }

$body = <<< EOD
<center>
<h1>Tool  For Updating Pin Code</h1>
<form name='edit_pin' action='' method='post'>
<h3>Pin code-- $pin_code</h3>
<select name='tool_id' id='tool_id'>
<option value=''> Select Assembly Constituency</option>
 $options
</select>
<input type='submit' name='submit' value='Update Pin' />
</form>
</center>
EOD;
sendPage($body);
?>