
<?php include("header.php");?>

    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Patients List</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<div class="table-responsive" id="user_data">
				
			</div>
			<br />
		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="Name" id="Name" class="form-control" />
					<span id="error_Name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Age</label>
					<input type="text" name="Age" id="Age" class="form-control" />
					<span id="error_Age" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label>City</label>
					<Select name="City" id="City" class="form-control">
					  <option>Select</option>
					  <option>Pune</option>
					  <option>Jalna</option>
					<select>
					<span id="error_City" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label>State</label>
					<Select name="State" id="State" class="form-control">
					  <option>Select</option>
					  <option>Karnataka</option>
					  <option>Maharashtra</option>
					<select>
					<span id="error_State" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label>Country</label>
					<Select name="Country" id="Country" class="form-control">
					  <option>Select</option>
					  <option>Australia</option>
					  <option>India</option>
					<select>
					<span id="error_Country" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Date Of Birth</label>
					<input type="Date" name="Date_of_birth" id="Date_of_birth" class="form-control" />
					<span id="error_Date_of_birth" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label>Blood Group</label>
					<Select name="Blood_Group" id="Blood_Group" class="form-control">
					  <option>Select</option>
					  <option>A</option>
					  <option>A+</option>
					  <option>B</option>
					  <option>B+</option>
					  <option>O</option>
					  <option>O+</option>
					<select>
					<span id="error_Blood_Group" class="text-danger"></span>
				</div>

				<!-- <div class="form-group">
					<label>Blood Group</label>
					<input type="text" name="Blood_Group" id="Blood_Group" class="form-control" />
					<span id="error_Blood_Group" class="text-danger"></span>
				</div> -->
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		


		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>
		
    </body>  
</html>  




<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_Name = '';
		var error_Age = '';
		var error_City = '';
		var error_State = '';
		var error_Country = '';
		var error_Date_of_birth = '';
		var error_Blood_Group = '';
		if($('#Name').val() == '')
		{
			error_Name = 'First Name is required';
			$('#error_Name').text(error_Name);
			$('#Name').css('border-color', '#cc0000');
		}
		else
		{
			error_Name = '';
			$('#error_Name').text(error_Name);
			$('#Name').css('border-color', '');
		}
		if($('#Age').val() == '')
		{
			error_Age = 'Last Name is required';
			$('#error_Age').text(error_Age);
			$('#Age').css('border-color', '#cc0000');
		}
		else
		{
			error_Age = '';
			$('#error_Age').text(error_Age);
			$('#Age').css('border-color', '');
		}
		if($('#City').val() == 'Select')
		{
			error_City = 'Select city';
			$('#error_City').text(error_City);
			$('#City').css('border-color', '#cc0000');
		}
		else
		{
			error_City = '';
			$('#error_City').text(error_City);
			$('#City').css('border-color', '');
		}
		if($('#State').val() == 'Select')
		{
			error_State = 'Select State';
			$('#error_State').text(error_State);
			$('#State').css('border-color', '#cc0000');
		}
		else
		{
			error_State = '';
			$('#error_State').text(error_State);
			$('#State').css('border-color', '');
		}
		if($('#Country').val() == 'Select')
		{
			error_Country = 'Select Country';
			$('#error_Country').text(error_Country);
			$('#Country').css('border-color', '#cc0000');
		}
		else
		{
			error_Country = '';
			$('#error_Country').text(error_Country);
			$('#Country').css('border-color', '');
		}
		if($('#Date_of_birth').val() == '')
		{
			error_Date_of_birth = 'Date of birth is required';
			$('#error_Date_of_birth').text(error_Date_of_birth);
			$('#Date_of_birth').css('border-color', '#cc0000');
		}
		else
		{
			error_Date_of_birth = '';
			$('#error_Date_of_birth').text(error_Date_of_birth);
			$('#Date_of_birth').css('border-color', '');
		}
		if($('#Blood_Group').val() == 'Select')
		{
			error_Blood_Group = 'Blood Group is required';
			$('#error_Blood_Group').text(error_Blood_Group);
			$('#Blood_Group').css('border-color', '#cc0000');
		}
		else
		{
			error_Blood_Group = '';
			$('#error_Blood_Group').text(error_Blood_Group);
			$('#Blood_Group').css('border-color', '');
		}
		if(error_Name != '' || error_Age != '' || error_City != '' || error_State != '' || error_Country != '' || error_Date_of_birth != '' || error_Blood_Group != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#Name').val(data.Name);
				$('#Age').val(data.Age);
				$('#City').val(data.City);
				$('#State').val(data.State);
				$('#Country').val(data.Country);
				$('#Date_of_birth').val(data.Date_of_birth);
				$('#Blood_Group').val(data.Blood_Group);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  
</script>
