function get_location(val)
{
	if(val != '')
	{
		$.ajax({ 
			url: "get_location.php",
			type: "GET",
			data: {val : val},
			success: function(data){
				//alert(data);
				$('#location').html(data);
			}
		});
	}
}
function get_outreach(val)
{
	if(val != '')
	{
		$.ajax({ 
			url: "get_outreach.php",
			type: "GET",
			data: {val : val},
			success: function(data){
				//alert(data);
				$('#otid').val(data);
			}
		});
	}
}
function get_orglink(val)
{
	if(val != '')
	{
		$.ajax({ 
			url: "get_patient_link.php",
			type: "GET",
			data: {val : val},
			success: function(data){
				//alert(data);
				$('#precise_result_link').val(data);
			}
		});
	}
}
function get_user(val)
{
	if(val == '4')
	{
		document.getElementById('outreach_ctr').style.display = 'flex';
	}
	else
	{
		document.getElementById('outreach_ctr').style.display = 'none';
	}
}
function get_dailysample()
{
	var otid = document.getElementById('otid').value;
	var locations = document.getElementById('location').value;
	var created_date = document.getElementById('created_date').value;
	$.ajax({ 
		url: "get_dailysamplesreceived.php",
		type: "GET",
		data: {otid : otid, locations : locations, created_date : created_date},
		success: function(data){
			//alert(data);
			$('#show-ctr').html(data);
			$('.table').bootstrapTable();
		}
	});
	
}
function get_supplies()
{
	var otid = document.getElementById('otid').value;
	var created_date = document.getElementById('created_date').value;
	$.ajax({ 
		url: "get_suppliesorders.php",
		type: "GET",
		data: {otid : otid, created_date : created_date},
		success: function(data){
			//alert(data);
			$('#show-ctr').html(data);
			$('.table').bootstrapTable();
		}
	});
}
function get_reject_order()
{
	var otid = document.getElementById('otid').value;
	var patient_name = document.getElementById('patient_name').value;
	var reject_date = document.getElementById('reject_date').value;
	$.ajax({ 
		url: "get_reject_order.php",
		type: "GET",
		data: {otid : otid, patient_name : patient_name, reject_date : reject_date},
		success: function(data){
			//alert(data);
			$('#show-ctr').html(data);
			$('.table').bootstrapTable();
		}
	});
	
}

function get_yesterday()
{
	var yesterday = document.getElementById('yesterday').value;
	var date_type = 'yesterday';

	$.ajax({ 
		url: "get_dashboard-dtr.php",
		type: "GET",
		data: {yesterday : yesterday, date_type : date_type},
		success: function(data){
			//alert(data);
			var fields = data.split('||');
			var sample_received = fields[0];
			var plate_map = fields[1];
			var sample_resulted = fields[2];
			var suplies_shipped = fields[3];
			var order_list = fields[4];
			var sample_resulted_rt_pcr = fields[5];
            var sample_resulted_rapid = fields[6];
			$('#sample_received').html(sample_received);
			$('#plate_map').html(plate_map);
			$('#sample_resulted').html(sample_resulted);
			$('#suplies_shipped').html(suplies_shipped);
			$('#order_list').html(order_list);
			$('#sample_resulted_rt_pcr').html(sample_resulted_rt_pcr);
            $('#sample_resulted_rapid').html(sample_resulted_rapid);
			$('[data-plugin="counterup"]').counterUp({delay: 10,time: 1000});
		}
	});
}
function get_today()
{
	var totay = document.getElementById('totay').value;
	var date_type = 'totay';

	$.ajax({ 
		url: "get_dashboard-dtr.php",
		type: "GET",
		data: {totay : totay, date_type : date_type},
		success: function(data){
			//alert(data);
			var fields = data.split('||');
			var sample_received = fields[0];
			var plate_map = fields[1];
			var sample_resulted = fields[2];
			var suplies_shipped = fields[3];
			var order_list = fields[4];
			var sample_resulted_rt_pcr = fields[5];
            var sample_resulted_rapid = fields[6];
			$('#sample_received').html(sample_received);
			$('#plate_map').html(plate_map);
			$('#sample_resulted').html(sample_resulted);
			$('#suplies_shipped').html(suplies_shipped);
			$('#order_list').html(order_list);
			$('#sample_resulted_rt_pcr').html(sample_resulted_rt_pcr);
            $('#sample_resulted_rapid').html(sample_resulted_rapid);
			$('[data-plugin="counterup"]').counterUp({delay: 10,time: 1000});
		}
	});
	
}

function get_sample_report()
{
	var error_msg = 0;
	var from_date = document.getElementById('from_date').value;
	var to_date = document.getElementById('to_date').value;
	
	if(from_date == '' || to_date =='')
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if((from_date !='' && to_date =='') || (from_date =='' && to_date !=''))
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if(from_date !='' && to_date !='')
	{
		if ((Date.parse(from_date) >= Date.parse(to_date))) {
			document.getElementById('from_date').style.border="1px solid red";
			document.getElementById('to_date').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{	
			document.getElementById('from_date').style.border="1px solid green";
			document.getElementById('to_date').style.border="1px solid green";
		}
	
	}
	if (error_msg > 0)
	{	
		return false;
	}
	else
	{
		$.ajax({ 
			url: "get_sample_result_report.php",
			type: "GET",
			data: {from_date : from_date, to_date : to_date},
			success: function(data){
				//alert(data);
				$('#show-ctr').html(data);
				$('.table').bootstrapTable();
			}
		});
	}
}
function get_resulting_verification_report()
{
	var error_msg = 0;
	var from_date = document.getElementById('from_date').value;
	var to_date = document.getElementById('to_date').value;
	
	if(from_date == '' || to_date =='')
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if((from_date !='' && to_date =='') || (from_date =='' && to_date !=''))
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if(from_date !='' && to_date !='')
	{
		if ((Date.parse(from_date) >= Date.parse(to_date))) {
			document.getElementById('from_date').style.border="1px solid red";
			document.getElementById('to_date').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{	
			document.getElementById('from_date').style.border="1px solid green";
			document.getElementById('to_date').style.border="1px solid green";
		}
	
	}
	if (error_msg > 0)
	{	
		return false;
	}
	else
	{
		$.ajax({ 
			url: "get_resulting_verification_report.php",
			type: "GET",
			data: {from_date : from_date, to_date : to_date},
			success: function(data){
				//alert(data);
				$('#show-ctr').html(data);
				$('.table').bootstrapTable();
			}
		});
	}
}
function get_outreachteam_report()
{
	var error_msg = 0;
	var from_date = document.getElementById('from_date').value;
	var to_date = document.getElementById('to_date').value;
	
	if(from_date == '' || to_date =='')
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if((from_date !='' && to_date =='') || (from_date =='' && to_date !=''))
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if(from_date !='' && to_date !='')
	{
		if ((Date.parse(from_date) >= Date.parse(to_date))) {
			document.getElementById('from_date').style.border="1px solid red";
			document.getElementById('to_date').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{	
			document.getElementById('from_date').style.border="1px solid green";
			document.getElementById('to_date').style.border="1px solid green";
		}
	
	}
	if (error_msg > 0)
	{	
		return false;
	}
	else
	{
		$.ajax({ 
			url: "get_outreach_team_report.php",
			type: "GET",
			data: {from_date : from_date, to_date : to_date},
			success: function(data){
				//alert(data);
				$('#show-ctr').html(data);
				$('.table').bootstrapTable();
			}
		});
	}
}

function get_pre_post_report()
{
	var error_msg = 0;
	var testtype = document.getElementById('testtype').value;
	var from_date = document.getElementById('from_date').value;
	var to_date = document.getElementById('to_date').value;
	if (document.getElementById('testtype').value == '') 
	{
		document.getElementById('select2-testtype-container').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else
	{	
		document.getElementById('select2-testtype-container').style.border="1px solid green";
	}
	if(from_date == '' || to_date =='')
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if((from_date !='' && to_date =='') || (from_date =='' && to_date !=''))
	{
		document.getElementById('from_date').style.border="1px solid red";
		document.getElementById('to_date').style.border="1px solid red";
		error_msg = error_msg+1;
	}
	else if(from_date !='' && to_date !='')
	{
		if ((Date.parse(from_date) >= Date.parse(to_date))) {
			document.getElementById('from_date').style.border="1px solid red";
			document.getElementById('to_date').style.border="1px solid red";
			error_msg = error_msg+1;
		}
		else
		{	
			document.getElementById('from_date').style.border="1px solid green";
			document.getElementById('to_date').style.border="1px solid green";
		}
	
	}
	if (error_msg > 0)
	{	
		return false;
	}
	else
	{
		$.ajax({ 
			url: "get_pre_post_report.php",
			type: "GET",
			data: {from_date : from_date, to_date : to_date, testtype : testtype},
			success: function(data){
				//alert(data);
				$('#show-ctr').html(data);
				$('.table').bootstrapTable();
			}
		});
	}
}

function get_bio(val)
{
	if(val !='')
	{
		$.ajax({ 
			url: "get_bio.php",
			type: "GET",
			data: {val : val},
			success: function(data){
				//alert(data);
				$('#bio').html(data);
				$('.custom-select2').select2();
			}
		});
	}
}