<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stdtheme.css">
			<link rel="stylesheet" href="jquery/css/base/jquery.ui.all.css">
			<script src="jquery/js/jquery-1.10.2.min.js"></script>
			<script src="jquery/js/jquery-ui.js"></script>
			<script>
				$(document).ready(function()
				{
					$("#submit").click(function()
					{
						var x= validate();
						if(x)
						{
						$('link[href="stdtheme.css"]').attr('href','stdtheme1.css');
						$("#submit").hide();
						$("#reset").hide();
						$("#tab1 *").prop("disabled", true );
						$("#edit").show();
						$("#save").show();
						}
					});
				});
				function goback()
				{
					$('link[href="stdtheme1.css"]').attr('href','stdtheme.css');
					$("#submit").show();
					$("#reset").show();
					$("#edit").hide();
					$("#save").hide();				
					$("#tab1 *").prop("disabled", false );
				}
				function validate()
				{
					$("#fname").text("");
					$("#mname").text("");
					$("#lname").text("");
					$("#date").text("");
					var pattern=/[0-9]/g;
					var firstname= $.trim($("input[name=fname]").val());
					var middlename= $.trim($("input[name=mname]").val());
					var lastname= $.trim($("input[name=lname]").val());
					//var dateFormat=/^\d{4}(\/)(0?[1-9]|1[012])(\/)(0?[1-9]|[12][0-9]|3[01])$/;
			 	        var bdate=$.trim($('#txt_date').val());

					var flag=true;
					//var date_var=true;	
		
					if (firstname=="")
					{
						$("#fname").text("First Name must be filled out");
						flag=false;
					}
					if(pattern.test(firstname))
					{
						document.getElementById("fname").innerHTML="Name cannot contain digits";
						flag=false;
					}
					if(/\d/.test(middlename))
					{
						document.getElementById("mname").innerHTML="Name cannot contain digits";
						flag=false;
					}
					if(pattern.test(lastname))
					{
						document.getElementById("lname").innerHTML="Name cannot contain digits";
						flag=false;
					}
					
					if(flag==true && isValidDate(bdate))
					{
						$("#fname").text("");
						$("#mname").text("");
						$("#lname").text("");
						$("#date").text("");
						return true;
					}
					else 
						return false;
				}
				function isValidDate(date)
				{
					var splitdate = date.split('/');
					var d = parseInt(splitdate[2]);
					var m = parseInt(splitdate[1]);
					var y = parseInt(splitdate[0]);
					var date = new Date(y,m-1,d);
					if (date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d)
					{
						return true;
					}
					else
					{
						document.getElementById("date").innerHTML="Please enter a valid date";
						return false;
					}
				}
				function saveData()
				{
					$("#tab1 *").prop("disabled", false );	
				}
			</script>
		<title> Customer Registration Form </title>
	</head>
	<body>
			<center>
				<h1>CUSTOMER FORM</h1>
				<form action="saveData.php" method="POST">
					
					<table id="tab1">

							<tr>
							<th>First Name: </th>
							<td><input type="text" name="fname" placeholder="Enter your first name" class="test" autofocus><p id="fname"></p></td>
						</tr>
						<tr>
							<th>Middle Name: </th>
							<td><input type="text" name="mname" class="test" placeholder="Enter your middle name">
<p id="mname"></p></td>
						</tr>
						<tr>
							<th>Last Name: </th>
							<td><input type="text" name="lname" class="test" placeholder="Enter your last name">
<p id="lname"></p></td>
						</tr>
						<tr>
							<th>Age: </th>
							<td>
							<input type="number" name="age" class="test" placeholder="Enter your age" min="18" max="60" title="18<Age<60" value="22" required="required">	
							</td>
						</tr>
						<tr>
							<th>Gender: </th>
							<td>
								<input type="radio" name="gender" value="Female" class="test" checked>Female
								<input type="radio" name="gender" value="Male" class="test">Male
							</td>
						</tr>	
						<tr>
							<th>Date of Birth: </th>
							<td>
								<input type="text" id="txt_date" name="dob" class="test" placeholder="YYYY-MM-DD">
								<p id="date"></p>
							</td>
						</tr>
						<tr>
							<th>Language Known: </th>
							<td>
								<input type="checkbox" name="lang[]" class="test" value="English">English
								<input type="checkbox" name="lang[]" class="test" value="Hindi">Hindi
								<input type="checkbox" name="lang[]" class="test" value="Punjabi">Punjabi
							</td>
						</tr>
						<tr>
							<th>Qualifications: </th>
							<td>
								<select name="qual" class="test">
									<option value="Doctorate">Doctorate</option>
									<option value="Post Graduation" selected="selected">Postgraduate</option>
									<option value="Graduation">Graduate</option>
									<option value="12 Class">12<sup>th</sup><pre> class</pre></option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan=2>
								<label id="alertmessage" ></label>
							</td>
						</tr>
				</table>
				<input type="button" id="submit" value="Submit" class="sub">
				<input type="reset" value="Reset" id="reset">
				<input type="button" value="Edit" id="edit" onclick="goback()" hidden>
				<input type="submit" value="Save" id="save" onclick="saveData()" hidden>
 		</form></center>
	</body>
<html>
