<?php
include('databaseConnection.php');
$EmailError=$IDError=$first_nameError=$last_nameError=$PasswordError=true;
$type='';
$IDM='';

if(isset($_POST["ID"], $_POST["Password"], $_POST["type"])) 
    {     

        $type= $_POST["type"];
        $ID = stripslashes($_POST["ID"]); 
		$ID = mysqli_real_escape_string($conn,$_POST["ID"]);

		$password = stripslashes($_POST["Password"]); 
		$password = mysqli_real_escape_string($conn,$_POST["Password"]); 
		$pass= hash('ripemd160', $password);
		if($type=="Student"){
        $res = mysqli_query("SELECT ID, Password FROM Student WHERE ID = '".$ID."' AND  Password = '".$pass."'");
    	}
    	if($type=="Teacher"){
        $res = mysqli_query("SELECT ID, Password FROM Teacher WHERE ID = '".$ID."' AND  Password = '".$pass."'");
    	}
        if($res){
        	if(mysqli_num_rows($res) ==1 )
        	{   echo "1";
        		session_start();
            	$_SESSION["user"] = $ID; 
            	//header("location: Edit.php");
        	}
        	else{echo "0";}
		}
		else{echo "0";
		return false;}
}


?>