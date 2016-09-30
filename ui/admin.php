<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stdtheme.css">
			<link rel="stylesheet" href="jquery/css/base/jquery.ui.all.css">
			<script src="jquery/js/jquery-1.10.2.min.js"></script>
			<script src="jquery/js/jquery-ui.js"></script>
			<script src="jquery/media/js/jquery.dataTables.min.js"></script>
			<!--<style type='text/css'>
				.dataTables_length{ display:none; }
				.dataTables_filter{display:none;}
			</style>-->
			<script>
				$(document).ready(function()
				{
					$('#example').DataTable
					({
				         "order": [[ 0, "asc" ]],
					//"lengthMenu": [[-1], ["All"]],
					});
				});
			</script>
		</head>
		<body>
			<center>
				<table id="example">
					<thead><th>ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th>
					<th>Age</th><th>Gender</th><th>Date Of Birth</th><th>Language(s)</th><th>Qualification</th></thead><tbody>
					<?php
						require_once "connection.php";
						$conn = new ConnPDO();
						$query="select * from formdata";

						$result = $conn->Execute($query,array());

						$num_results = $result->rowCount();

						$records = array();
						while($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
						{
							$records[$row["id"]]['FirstName'] = $row["FirstName"];
							$records[$row["id"]]['MiddleName'] = $row["MiddleName"];
							$records[$row["id"]]['LastName'] = $row["LastName"];
							$records[$row["id"]]['Age'] = $row["Age"];
							$records[$row["id"]]['Gender'] = $row["Gender"];
							$records[$row["id"]]['DateOfBirth'] = $row["DateOfBirth"];
							$records[$row["id"]]['LanguageKnown'] = $row["LanguageKnown"];
							$records[$row["id"]]['Qualifications'] = $row["Qualifications"];
						}

					?>
					<?php foreach($records as $id=>$data){ ?>
						<tr><td> <?=$id?> </td>
					<?php foreach($data as $value){ ?>
						<td><?=$value?></td>
					<?php }	?>
					</tr>
					<?php } ?>
				</tbody></table>
			</center>
		</body>
</html>

