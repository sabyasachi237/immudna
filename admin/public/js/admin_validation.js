function ValidAdminLogin()
{
	var err_msg=0;
	if(document.frm_login.user_name.value == "")
	{
		document.getElementById('user_name').style.border="1px solid red";
		err_msg = err_msg+1;
	}
	else
	{
		document.getElementById('user_name').style.border="1px solid green";
	}
	if(document.frm_login.password.value == "")
	{
		document.getElementById('password').style.border="1px solid red";
		err_msg = err_msg+1;
	}
	else
	{
		document.getElementById('password').style.border="1px solid green";
	}
	if(document.frm_login.admin_type.value == "")
	{
		document.getElementById('admin_type').style.border="1px solid red";
		err_msg = err_msg+1;
	}
	else
	{
		document.getElementById('admin_type').style.border="1px solid green";
	}
	if(err_msg > 0)
	{
		return false;
	}
}
function ValidateForgotPassword()
{
	var err_msg=0;
	
	if(document.frm_reset.email.value == "")
	{
		document.getElementById('email').style.border="1px solid red";
		err_msg = err_msg+1;
	}
	else
	{
		document.getElementById('email').style.border="1px solid green";
	}
	if(err_msg > 0)
	{
		return false;
	}
}
function validateChangePass()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_changepass.current_password.value == "")
	{ 
		document.getElementById('current_password').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('current_password').style.border="1px solid green";
	}
	if(document.frm_changepass.new_password.value == "")
	{ 
		document.getElementById('new_password').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('new_password').style.border="1px solid green";
	}
	
	if(document.frm_changepass.c_password.value == "")
	{ 
		document.getElementById('c_password').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('c_password').style.border="1px solid green";
	}
	if(document.frm_changepass.c_password.value != "")
	{
		if(document.frm_changepass.new_password.value == document.frm_changepass.c_password.value)
		{ 
			document.getElementById('c_password').style.border="1px solid green";
			document.getElementById('errbox').innerHTML = '';
			document.getElementById('valerrbox').style.display='none';
		}
		else
		{
			document.getElementById('c_password').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Verify Password should match with new password!';
			document.getElementById('valerrbox').style.display='block';
			return false;
		}
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}
}
function validate_reject()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_reject.reject_date.value == "")
	{ 
		document.getElementById('reject_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('reject_date').style.border="1px solid green";
	}
	if(document.frm_reject.location.value == "")
	{ 
		document.getElementById('select2-location-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-location-container').style.border="1px solid green";
	}
	if(document.frm_reject.otid.value == "")
	{ 
		document.getElementById('otid').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('otid').style.border="1px solid green";
	}
	if(document.frm_reject.specimenid.value == "")
	{ 
		document.getElementById('specimenid').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('specimenid').style.border="1px solid green";
	}
	if(document.frm_reject.patient_name.value == "")
	{ 
		document.getElementById('patient_name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('patient_name').style.border="1px solid green";
	}
	if(document.frm_reject.dob.value == "")
	{ 
		document.getElementById('dob').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('dob').style.border="1px solid green";
	}
	if(document.frm_reject.reject_reason.value == "")
	{ 
		document.getElementById('reject_reason').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('reject_reason').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_ot()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_ot.name.value == "")
	{ 
		document.getElementById('name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('name').style.border="1px solid green";
	}
	if(document.frm_ot.contact_person.value == "")
	{ 
		document.getElementById('contact_person').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('contact_person').style.border="1px solid green";
	}
	if(document.frm_ot.email.value == "")
	{ 
		document.getElementById('email').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('email').style.border="1px solid green";
	}
	if(document.frm_ot.phone.value == "")
	{ 
		document.getElementById('phone').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('phone').style.border="1px solid green";
	}
	if(document.frm_ot.address1.value == "")
	{ 
		document.getElementById('address1').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('address1').style.border="1px solid green";
	}
	if(document.frm_ot.city.value == "")
	{ 
		document.getElementById('city').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('city').style.border="1px solid green";
	}
	if(document.frm_ot.state.value == "")
	{ 
		document.getElementById('state').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('state').style.border="1px solid green";
	}
	if(document.frm_ot.zip.value == "")
	{ 
		document.getElementById('zip').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('zip').style.border="1px solid green";
	}
	if(document.frm_ot.created_date.value == "")
	{ 
		document.getElementById('created_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('created_date').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_location()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_location.otid.value == "")
	{ 
		document.getElementById('select2-otid-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-otid-container').style.border="1px solid green";
	}
	if(document.frm_location.name.value == "")
	{ 
		document.getElementById('name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('name').style.border="1px solid green";
	}
	if(document.frm_location.organization.value == "")
	{ 
		document.getElementById('select2-organization-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-organization-container').style.border="1px solid green";
	}
	if(document.frm_location.contact_person.value == "")
	{ 
		document.getElementById('contact_person').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('contact_person').style.border="1px solid green";
	}
	if(document.frm_location.email.value == "")
	{ 
		document.getElementById('email').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('email').style.border="1px solid green";
	}
	if(document.frm_location.phone.value == "")
	{ 
		document.getElementById('phone').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('phone').style.border="1px solid green";
	}
	if(document.frm_location.address1.value == "")
	{ 
		document.getElementById('address1').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('address1').style.border="1px solid green";
	}
	if(document.frm_location.city.value == "")
	{ 
		document.getElementById('city').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('city').style.border="1px solid green";
	}
	if(document.frm_location.state.value == "")
	{ 
		document.getElementById('state').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('state').style.border="1px solid green";
	}
	if(document.frm_location.zip.value == "")
	{ 
		document.getElementById('zip').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('zip').style.border="1px solid green";
	}
	if(document.frm_location.created_date.value == "")
	{ 
		document.getElementById('created_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('created_date').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_team_member()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_team_member.date_of_request.value == "")
	{ 
		document.getElementById('date_of_request').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('date_of_request').style.border="1px solid green";
	}
	if(document.frm_team_member.f_name.value == "")
	{ 
		document.getElementById('f_name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('f_name').style.border="1px solid green";
	}
	if(document.frm_team_member.l_name.value == "")
	{ 
		document.getElementById('l_name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('l_name').style.border="1px solid green";
	}
	if(document.frm_team_member.email.value == "")
	{ 
		document.getElementById('email').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('email').style.border="1px solid green";
	}
	if(document.frm_team_member.phone.value == "")
	{ 
		document.getElementById('phone').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('phone').style.border="1px solid green";
	}
	if(document.frm_team_member.location_code.value == "")
	{ 
		document.getElementById('select2-location_code-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-location_code-container').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_daily_sample()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_daily_sample.created_date.value == "")
	{ 
		document.getElementById('created_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('created_date').style.border="1px solid green";
	}
	if(document.frm_daily_sample.times.value == "")
	{ 
		document.getElementById('times').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('times').style.border="1px solid green";
	}
	if(document.frm_daily_sample.otid.value == "")
	{ 
		document.getElementById('select2-otid-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-otid-container').style.border="1px solid green";
	}
	if(document.frm_daily_sample.location.value == "")
	{ 
		document.getElementById('select2-location-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-location-container').style.border="1px solid green";
	}
	if(document.frm_daily_sample.quantity.value == "")
	{ 
		document.getElementById('quantity').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('quantity').style.border="1px solid green";
	}
	if(document.frm_daily_sample.temperature.value == "")
	{ 
		document.getElementById('temperature').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('temperature').style.border="1px solid green";
	}
	if(document.frm_daily_sample.courier.value == "")
	{ 
		document.getElementById('courier').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('courier').style.border="1px solid green";
	}
	if(document.frm_daily_sample.received_by.value == "")
	{ 
		document.getElementById('received_by').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('received_by').style.border="1px solid green";
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_supplies_shipped()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_supplies_shipped.created_date.value == "")
	{ 
		document.getElementById('created_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('created_date').style.border="1px solid green";
	}
	if(document.frm_supplies_shipped.otid.value == "")
	{ 
		document.getElementById('select2-otid-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-otid-container').style.border="1px solid green";
	}
	if(document.frm_supplies_shipped.location.value == "")
	{ 
		document.getElementById('select2-location-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('select2-location-container').style.border="1px solid green";
	}
	if(document.frm_supplies_shipped.quantity.value == "")
	{ 
		document.getElementById('quantity').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('quantity').style.border="1px solid green";
	}
	if(document.frm_supplies_shipped.tracking_number.value == "")
	{ 
		document.getElementById('tracking_number').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('tracking_number').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_organization()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_organization.name.value == "")
	{ 
		document.getElementById('name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('name').style.border="1px solid green";
	}
	if(document.frm_organization.doctor_name.value == "")
	{ 
		document.getElementById('doctor_name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('doctor_name').style.border="1px solid green";
	}
	if(document.frm_organization.doctor_npi.value == "")
	{ 
		document.getElementById('doctor_npi').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('doctor_npi').style.border="1px solid green";
	}
	if(document.frm_organization.email_id.value == "")
	{ 
		document.getElementById('email_id').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('email_id').style.border="1px solid green";
	}
	if(document.frm_organization.phone.value == "")
	{ 
		document.getElementById('phone').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('phone').style.border="1px solid green";
	}
	if(document.frm_organization.address1.value == "")
	{ 
		document.getElementById('address1').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('address1').style.border="1px solid green";
	}
	if(document.frm_organization.states.value == "")
	{ 
		document.getElementById('states').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('states').style.border="1px solid green";
	}
	if(document.frm_organization.city.value == "")
	{ 
		document.getElementById('city').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('city').style.border="1px solid green";
	}
	if(document.frm_organization.zip.value == "")
	{ 
		document.getElementById('zip').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('zip').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}
function validate_users()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_users.user_type.value == "")
	{ 
		document.getElementById('user_type').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('user_type').style.border="1px solid green";
	}
	if(document.frm_users.user_type.value == "4")
	{ 
		if(document.frm_users.otid.value == "")
		{ 
			document.getElementById('select2-otid-container').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{
			document.getElementById('select2-otid-container').style.border="1px solid green";
		}
		if(document.frm_users.organization.value == "")
		{ 
			document.getElementById('select2-organization-container').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{
			document.getElementById('select2-organization-container').style.border="1px solid green";
		}
	}
	
	if(document.frm_users.name.value == "")
	{ 
		document.getElementById('name').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('name').style.border="1px solid green";
	}
	if(document.frm_users.username.value == "")
	{ 
		document.getElementById('username').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('username').style.border="1px solid green";
	}
	if(document.frm_users.password.value == "")
	{ 
		document.getElementById('password').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('password').style.border="1px solid green";
	}
	if(document.frm_users.email_id.value == "")
	{ 
		document.getElementById('email_id').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('email_id').style.border="1px solid green";
	}
	if(document.frm_users.phone.value == "")
	{ 
		document.getElementById('phone').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('phone').style.border="1px solid green";
	}
	
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}	
	
}

function validation_banner()
{
	var error_msg = 0;
	if(document.frm_banner.title.value == "")
	{ 
		document.getElementById('short_title').style.border="1px solid red";
		document.getElementById('short_title_error').innerHTML = 'Short title should not be blank.';
		document.getElementById('short_title_error').style.display='block';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('short_title').style.border="1px solid green";
		document.getElementById('short_title_error').innerHTML = '';
		document.getElementById('short_title_error').style.display='none';
	}
	if(document.frm_banner.title.value == "")
	{ 
		document.getElementById('title').style.border="1px solid red";
		document.getElementById('title_error').innerHTML = 'Title should not be blank.';
		document.getElementById('title_error').style.display='block';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('title').style.border="1px solid green";
		document.getElementById('title_error').innerHTML = '';
		document.getElementById('title_error').style.display='none';
	}
	if(document.frm_banner.description.value == "")
	{ 
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('desc_error').innerHTML = 'Description should not be blank.';
		document.getElementById('desc_error').style.display='block';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('desc_error').innerHTML = '';
		document.getElementById('desc_error').style.display='none';
	}
	if(document.getElementById('image').value == "")
	{ 
		document.getElementById('image').style.border="1px solid red";
		document.getElementById('image_error').innerHTML="Please select banner image";
		error_msg = error_msg+1;
		
	}
	else
	{
		var fimage = document.getElementById('image').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage))
		{	
			document.getElementById('image').style.border="1px solid red";
			document.getElementById('image_error').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			document.getElementById('image_error').style.display='block';
			return false;
			
		}
		else
		{
			document.getElementById('image').style.border="1px solid green";
			document.getElementById('image_error').innerHTML="";
			document.getElementById('image_error').style.display='none';
			
		}
	} 
	if (error_msg > 0)
	{		
		return false;
	}
}
function validation_service()
{
	var error_msg = 0;
	if(document.frm_service.title.value == "")
	{ 
		document.getElementById('title').style.border="1px solid red";
		document.getElementById('title_error').innerHTML=" Title should not be blank.";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('title_error').innerHTML="";
		document.getElementById('title').style.border="1px solid green";
	}
	if(document.getElementById('image').value == "")
	{ 
		document.getElementById('image').style.border="1px solid red";
		document.getElementById('image_error').innerHTML="Please select service image";
		error_msg = error_msg+1;
		
	}
	else
	{
		var fimage = document.getElementById('image').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage))
		{	
			document.getElementById('image').style.border="1px solid red";
			document.getElementById('image_error').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			document.getElementById('image_error').style.display='block';
			return false;
			
		}
		else
		{
			document.getElementById('image').style.border="1px solid green";
			document.getElementById('image_error').innerHTML="";
			document.getElementById('image_error').style.display='none';
			
		}
	} 
	
	var cke_description = CKEDITOR.instances['description'].getData();
	if(cke_description.length ==  0)
	{ 
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('cke_description').style.border='1px solid red';
		document.getElementById('desc_error').style.display='block';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('desc_error').innerHTML='none';
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('cke_description').style.border='1px solid green';
		
	}
	if (error_msg > 0)
	{		
		return false;
	}
}

function validation_blog()
{
	var error_msg = 0;
	if(document.frm_blog.title.value == "")
	{ 
		document.getElementById('title').style.border="1px solid red";
		document.getElementById('title_error').innerHTML=" Title should not be blank.";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('title_error').innerHTML="";
		document.getElementById('title').style.border="1px solid green";
	}
	if(document.frm_blog.posted_by.value == "")
	{ 
		document.getElementById('posted_by').style.border="1px solid red";
		document.getElementById('posted_by_error').innerHTML="Posted By should not be blank.";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('posted_by_error').innerHTML="";
		document.getElementById('posted_by').style.border="1px solid green";
	}
	if(document.getElementById('image').value == "")
	{ 
		document.getElementById('image').style.border="1px solid red";
		document.getElementById('image_error').innerHTML="Please select service image";
		error_msg = error_msg+1;
		
	}
	else
	{
		var fimage = document.getElementById('image').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage))
		{	
			document.getElementById('image').style.border="1px solid red";
			document.getElementById('image_error').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			document.getElementById('image_error').style.display='block';
			return false;
			
		}
		else
		{
			document.getElementById('image').style.border="1px solid green";
			document.getElementById('image_error').innerHTML="";
			document.getElementById('image_error').style.display='none';
			
		}
	} 
	
	var cke_description = CKEDITOR.instances['description'].getData();
	if(cke_description.length ==  0)
	{ 
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('cke_description').style.border='1px solid red';
		document.getElementById('desc_error').style.display='block';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('desc_error').innerHTML='none';
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('cke_description').style.border='1px solid green';
		
	}
	if (error_msg > 0)
	{		
		return false;
	}
}
function validateelectronicmedia()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.getElementById('video').value == "")
	{ 
		document.getElementById('video_lbl').style.color="red";
		document.getElementById('video').style.border="1px solid red";
		document.getElementById('errimage').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		var fimage = document.getElementById('video').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage))
		{		
			document.getElementById('video').style.border="1px solid red";
			document.getElementById('errimage').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('video_lbl').style.color="green";
			document.getElementById('video').style.border="1px solid green";
			document.getElementById('errimage').style.border="1px solid green";
		}
	}
	if(document.frm_electronicmedia.url.value == "")
	{ 
		document.getElementById('s_url_lbl').style.color="red";
		document.getElementById('url').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_url_lbl').style.color="green";
		document.getElementById('url').style.border="1px solid green";
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}
}
function validatepartner()
{
	
	var error_msg = 0;
	var errconfirm = "";
	if(document.getElementById('image').value == "")
	{ 
		document.getElementById('image_lbl3').style.color="red";
		document.getElementById('image').style.border="1px solid red";
		document.getElementById('errimage').style.border="1px solid red";
		error_msg = error_msg+1;
		
	}
	else
	{
		var fimage3 = document.getElementById('image').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage3))
		{	
			document.getElementById('image').style.border="1px solid red";
			document.getElementById('errimage').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('image_lbl3').style.color="green";
			document.getElementById('image').style.border="1px solid green";
			document.getElementById('errimage').style.border="1px solid green";
		}
	}
	var cke_description = CKEDITOR.instances['description'].getData();
	if(cke_description.length ==  0)
	{ 
		document.getElementById('s_desc_lbl').style.color="red";
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('cke_description').style.border='1px solid red';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_desc_lbl').style.color="green";
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('cke_description').style.border='1px solid green';
		
	}
	var cke_short_description = CKEDITOR.instances['short_description'].getData();
	if(cke_short_description.length ==  0)
	{ 
		document.getElementById('s_desc_lbl1').style.color="red";
		document.getElementById('short_description').style.border="1px solid red";
		document.getElementById('cke_short_description').style.border='1px solid red';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_desc_lbl1').style.color="green";
		document.getElementById('short_description').style.border="1px solid green";
		document.getElementById('cke_short_description').style.border='1px solid green';
		
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}
}
function validatelatestupdate()
{
	var error_msg = 0;
	var errconfirm = "";
	if(document.frm_latestupdate.title.value == "")
	{ 
		document.getElementById('s_title_lbl').style.color="red";
		document.getElementById('title').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_title_lbl').style.color="green";
		document.getElementById('title').style.border="1px solid green";
	}
	var cke_short_description = CKEDITOR.instances['short_description'].getData();
	if(cke_short_description.length ==  0)
	{ 
		document.getElementById('s_name_lbl1').style.color="red";
		document.getElementById('short_description').style.border="1px solid red";
		document.getElementById('cke_short_description').style.border='1px solid red';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_name_lbl1').style.color="green";
		document.getElementById('short_description').style.border="1px solid green";
		document.getElementById('cke_short_description').style.border='1px solid green';
		
	}
	var cke_description = CKEDITOR.instances['description'].getData();
	if(cke_description.length ==  0)
	{ 
		document.getElementById('s_name_lbl2').style.color="red";
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('cke_description').style.border='1px solid red';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_name_lbl2').style.color="green";
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('cke_description').style.border='1px solid green';
		
	}
	if(document.getElementById('image1').value == "")
	{ 
		document.getElementById('image_lbl1').style.color="red";
		document.getElementById('image1').style.border="1px solid red";
		document.getElementById('errimage1').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		var fimage1 = document.getElementById('image1').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage1))
		{		
			document.getElementById('image1').style.border="1px solid red";
			document.getElementById('errimage1').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('image_lbl1').style.color="green";
			document.getElementById('image1').style.border="1px solid green";
			document.getElementById('errimage1').style.border="1px solid green";
		}
	}
	if(document.getElementById('image2').value == "")
	{ 
		document.getElementById('image_lbl2').style.color="red";
		document.getElementById('image2').style.border="1px solid red";
		document.getElementById('errimage2').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		var fimage2 = document.getElementById('image2').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage2))
		{		
			document.getElementById('image2').style.border="1px solid red";
			document.getElementById('errimage2').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('image_lbl2').style.color="green";
			document.getElementById('image2').style.border="1px solid green";
			document.getElementById('errimage2').style.border="1px solid green";
		}
	}
	if(document.frm_latestupdate.posted_on.value == "")
	{ 
		document.getElementById('s_post_lbl1').style.color="red";
		document.getElementById('posted_on').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_post_lbl1').style.color="green";
		document.getElementById('posted_on').style.border="1px solid green";
	}
	if(document.frm_latestupdate.posted_by.value == "")
	{ 
		document.getElementById('s_post_lbl2').style.color="red";
		document.getElementById('posted_by').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_post_lbl2').style.color="green";
		document.getElementById('posted_by').style.border="1px solid green";
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}
}
function validatephotogallery()
{
	var error_msg = 0;
	var errconfirm = "";
	var cke_description = CKEDITOR.instances['description'].getData();
	if(cke_description.length ==  0)
	{ 
		document.getElementById('s_name_lbl7').style.color="red";
		document.getElementById('description').style.border="1px solid red";
		document.getElementById('cke_description').style.border='1px solid red';
		error_msg = error_msg+1;
	}
	else
	{
		document.getElementById('s_name_lbl7').style.color="green";
		document.getElementById('description').style.border="1px solid green";
		document.getElementById('cke_description').style.border='1px solid green';
		
	}
	if(document.getElementById('image1').value == "")
	{ 
		document.getElementById('image_lbl5').style.color="red";
		document.getElementById('image1').style.border="1px solid red";
		document.getElementById('errimage1').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		var fimage1 = document.getElementById('image1').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage1))
		{		
			document.getElementById('image1').style.border="1px solid red";
			document.getElementById('errimage1').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('image_lbl5').style.color="green";
			document.getElementById('image1').style.border="1px solid green";
			document.getElementById('errimage1').style.border="1px solid green";
		}
	}
	if(document.getElementById('image2').value == "")
	{ 
		document.getElementById('image_lbl6').style.color="red";
		document.getElementById('image2').style.border="1px solid red";
		document.getElementById('errimage2').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{
		var fimage2 = document.getElementById('image2').value; 
		var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
		if(!re.exec(fimage2))
		{		
			document.getElementById('image2').style.border="1px solid red";
			document.getElementById('errimage2').style.border="1px solid red";
			document.getElementById('errbox').innerHTML = 'Image should be in jpg, gif, jpeg or png format.';
			return false;
			
		}
		else
		{
			document.getElementById('image_lbl6').style.color="green";
			document.getElementById('image2').style.border="1px solid green";
			document.getElementById('errimage2').style.border="1px solid green";
		}
	}
	if (error_msg > 0)
	{		
		document.getElementById('valerrbox').style.display = 'block';
		if(errconfirm != "")
		{
			document.getElementById('errbox').innerHTML = 'errconfirm';
		}
		else
		{
			document.getElementById('errbox').innerHTML = 'Highlighted fields should not be left blank!';
		}
		return false;
	}
}