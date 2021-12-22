
<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM patients_list";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Age</th>
		<th>City</th>
		<th>State</th>
		<th>Country</th>
		<th>Date of Birth</th>
		<th>Blood Group</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row["Name"].'</td>
			<td>'.$row["Age"].'</td>
			<td>'.$row["City"].'</td>
			<td>'.$row["State"].'</td>
			<td>'.$row["Country"].'</td>
			<td>'.$row["Date_of_birth"].'</td>
			<td>'.$row["Blood_Group"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["id"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>
