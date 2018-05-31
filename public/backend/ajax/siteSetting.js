
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function viewToggle(idName){
	$('#'+idName+'').toggle();
}

$('.siteName_submit').on('click', function(e){
	var siteName = $('input[name="siteName"]').val();

	$.ajax({
		url:'siteName/'+siteName,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('input[name="siteName"]').val('');
			$('.sName').html(data.setting_value);
			viewToggle('siteName');
			toastr.success('Site Name Change Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Site Name Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.about_submit').on('click', function(e){
	var aboutUs = $('textarea[name="aboutUs"]').val();

	$.ajax({
		url:'aboutUs/',
		type:'POST',
		dataType:'json',
		data:{'aboutUs':aboutUs},
		success:function(data){
			console.log(data);
			$('textarea[name="aboutUs"]').val('');
			viewToggle('aboutUs');
			$('.aboutUs').html(data.setting_value);
			toastr.success('About Us Info Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('About Us Not Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.address_submit').on('click', function(e){
	var address = $('textarea[name="address"]').val();

	$.ajax({
		url:'address/',
		type:'POST',
		dataType:'json',
		data:{'address':address},
		success:function(data){
			console.log(data);
			$('textarea[name="address"]').val('');
			viewToggle('address');
			$('.address').html(data.setting_value);
			toastr.success('Address Info Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Address Not Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});


$('.phone_submit').on('click', function(e){
	var phone = $('input[name="phone"]').val();

	$.ajax({
		url:'phoneNo/'+phone,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('.phone').html(data.setting_value);
			viewToggle('phnNo');
			$('input[name="phone"]').val('');
			toastr.success('Phone Number Updated Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Phone Number Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.email_submit').on('click', function(e){
	var email = $('input[name="email"]').val();

	$.ajax({
		url:'email/'+email,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('.email').html(data.setting_value);
			viewToggle('email');
			$('input[name="email"]').val('')
			toastr.success('Site Email Updated Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('$site Email Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});


$('.fbUrl_submit').on('click', function(e){
	var fbUrl = $('input[name="fbUrl"]').val();

	$.ajax({
		url:'facebook/',
		type:'POST',
		dataType:'json',
		data:{'fbUrl':fbUrl},
		success:function(data){
			console.log(data);
			$('input[name="fbUrl"]').val('');
			viewToggle('fbUrl');
			$('.fbUrl').html(data.setting_value);
			toastr.success('Facebook Page Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Facebook Page Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.tUrl_submit').on('click', function(e){
	var tUrl = $('input[name="tUrl"]').val();

	$.ajax({
		url:'twitter/',
		type:'POST',
		dataType:'json',
		data:{'tUrl':tUrl},
		success:function(data){
			console.log(data);
			$('input[name="tUrl"]').val('');
			viewToggle('tUrl');
			$('.tUrl').html(data.setting_value);
			toastr.success('Twitter Page Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Twitter Page Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.insUrl_submit').on('click', function(e){
	var insUrl = $('input[name="insUrl"]').val();

	$.ajax({
		url:'instagram/',
		type:'POST',
		dataType:'json',
		data:{'insUrl':insUrl},
		success:function(data){
			console.log(data);
			$('input[name="insUrl"]').val('');
			viewToggle('insUrl');
			$('.insUrl').html(data.setting_value);
			toastr.success('Instagram Page Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Instagram Page Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});