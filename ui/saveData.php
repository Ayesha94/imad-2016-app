<?php
require_once "connection.php";
	//create short var names
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$qual=$_POST['qual'];
	$lang=$_POST['lang'];
	$dob=$_POST['dob'];

	$conn = new ConnPDO();

	$query = "insert into formdata(FirstName, MiddleName, LastName, Age, Gender, DateOfBirth, LanguageKnown, Qualifications) values(:firstname, :middlename, :lastname, :age, :gender, :DateOfBirth, :languages, :qualification)";

	$conn->Execute($query,array(':firstname'=>$fname,':middlename'=>$mname,':lastname'=>$lname,':age'=>$age,':gender'=>$gender,':DateOfBirth'=>$dob,':languages'=>"$lang[0] $lang[1] $lang[2]",':qualification'=>$qual));

	echo "Form has been submitted";
?>
