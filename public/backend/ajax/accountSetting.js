$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function viewToggle(idName){
	$('#'+idName+'').toggle();
}

$('.fullName_submit').on('click', function(e){
	var fullName = $('input[name="fullName"]').val();

	$.ajax({
		url:'fullName/'+fullName,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('input[name="fullName"]').val('');
			$('.fullName').html(data.name);
			viewToggle('fullName');
			toastr.success('Name Change Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Name Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.phoneNo_submit').on('click', function(e){
	var phoneNo = $('input[name="phoneNo"]').val();

	$.ajax({
		url:'phoneNo/'+phoneNo,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('input[name="phoneNo"]').val('');
			$('.phoneNo').html(data.phoneNo);
			viewToggle('phoneNo');
			toastr.success('Phone Number Change Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Phone Number Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.email_submit').on('click', function(e){
	var email = $('input[name="email"]').val();
	var password = $('input[name="email_password"]').val();

	$.ajax({
		url:'change_email/',
		type:'POST',
		dataType:'json',
		data:{email:email, password:password},
		success:function(data){
			console.log(data);
			if(data == 0){
				toastr.error('Email Address And Password Not Match .', 'Error Alert', {timeOut: 5000});
			}else{
				$('input[name="email"]').val('');
				$('.email').html(data.email);
				viewToggle('email');
				toastr.success('Email Address Change Successfully.', 'Success Alert', {timeOut: 5000});
			}
			
		},
		error:function(error){
			console.log(error);
			toastr.error('Email Address Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});



$('.bio_submit').on('click', function(e){
	var bio = $('textarea[name="bio"]').val();

	$.ajax({
		url:'bio_status/',
		type:'POST',
		dataType:'json',
		data:{bio:bio},
		success:function(data){
			console.log(data);
			$('textarea[name="bio"]').val('');
			viewToggle('bio');
			$('.bio').html(data.bio);
			toastr.success('Bio Info Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Bio  Not Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.password_submit').on('click', function(e){
	var old_password = $('input[name="old_password"]').val();
	var password = $('input[name="password"]').val();
	var con_password = $('input[name="con_password"]').val();

	if(password == con_password){
		$.ajax({
			url:'password/change/',
			type:'POST',
			dataType:'json',
			data:{old_password:old_password, password:password},
			success:function(data){
				console.log(data);
				if(data == 0){
					$('input[name="old_password"]').val('');
					$('input[name="password"]').val('');
					$('input[name="con_password"]').val('');
					viewToggle('password');
					toastr.error(' Current Password  Not Match .', 'Error Alert', {timeOut: 5000});
				}else{
					$('input[name="old_password"]').val('');
					$('input[name="password"]').val('');
					$('input[name="con_password"]').val('');
					viewToggle('password');
					toastr.success('Email Address Change Successfully.', 'Success Alert', {timeOut: 5000});
				}
				
			},
			error:function(error){
				console.log(error);
				toastr.error('Email Address Not Change Successfully.', 'Error Alert', {timeOut: 5000});
			}
		});
	}else{
		$('input[name="password"]').val('');
		$('input[name="con_password"]').val('')
		toastr.error('Pawword and Confirm Pawword Not Match .', 'Error Alert', {timeOut: 5000});
	}

	
});


// user Account Setting 

$('.user_fullName_submit').on('click', function(e){
	var user_fullName = $('input[name="user_fullName"]').val();

	$.ajax({
		url:'fullName/'+user_fullName,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('input[name="user_fullName"]').val('');
			$('.user_fullName').html(data.name);
			viewToggle('user_fullName');
			toastr.success('Name Change Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Name Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.user_bio_submit').on('click', function(e){
	var bio = $('textarea[name="bio"]').val();

	$.ajax({
		url:'bio_status/',
		type:'POST',
		dataType:'json',
		data:{bio:bio},
		success:function(data){
			console.log(data);
			$('textarea[name="bio"]').val('');
			viewToggle('bio');
			$('.bio').html(data.bio);
			toastr.success('Bio Info Updated Successfully.', 'Success Alert', {timeOut: 5000});
		
		},
		error:function(error){
			console.log(error);
			toastr.error('Bio  Not Updated Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.user_phoneNo_submit').on('click', function(e){
	var phoneNo = $('input[name="phoneNo"]').val();

	$.ajax({
		url:'phoneNo/'+phoneNo,
		type:'GET',
		dataType:'json',
		success:function(data){
			console.log(data);
			$('input[name="phoneNo"]').val('');
			$('.phoneNo').html(data.phoneNo);
			viewToggle('phoneNo');
			toastr.success('Phone Number Change Successfully.', 'Success Alert', {timeOut: 5000});
		},
		error:function(error){
			console.log(error);
			toastr.error('Phone Number Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.user_email_submit').on('click', function(e){
	var email = $('input[name="email"]').val();
	var password = $('input[name="email_password"]').val();

	$.ajax({
		url:'change_email/',
		type:'POST',
		dataType:'json',
		data:{email:email, password:password},
		success:function(data){
			console.log(data);
			if(data == 0){
				toastr.error('Email Address And Password Not Match .', 'Error Alert', {timeOut: 5000});
			}else{
				$('input[name="email"]').val('');
				$('.email').html(data.email);
				viewToggle('email');
				toastr.success('Email Address Change Successfully.', 'Success Alert', {timeOut: 5000});
			}
			
		},
		error:function(error){
			console.log(error);
			toastr.error('Email Address Not Change Successfully.', 'Error Alert', {timeOut: 5000});
		}
	});
});

$('.user_password_submit').on('click', function(e){
	var old_password = $('input[name="old_password"]').val();
	var password = $('input[name="password"]').val();
	var con_password = $('input[name="con_password"]').val();

	if(password == con_password){
		$.ajax({
			url:'password/change/',
			type:'POST',
			dataType:'json',
			data:{old_password:old_password, password:password},
			success:function(data){
				console.log(data);
				if(data == 0){
					$('input[name="old_password"]').val('');
					$('input[name="password"]').val('');
					$('input[name="con_password"]').val('');
					viewToggle('password');
					toastr.error(' Current Password  Not Match .', 'Error Alert', {timeOut: 5000});
				}else{
					$('input[name="old_password"]').val('');
					$('input[name="password"]').val('');
					$('input[name="con_password"]').val('');
					viewToggle('password');
					toastr.success('Email Address Change Successfully.', 'Success Alert', {timeOut: 5000});
				}
				
			},
			error:function(error){
				console.log(error);
				toastr.error('Email Address Not Change Successfully.', 'Error Alert', {timeOut: 5000});
			}
		});
	}else{
		$('input[name="password"]').val('');
		$('input[name="con_password"]').val('')
		toastr.error('Pawword and Confirm Pawword Not Match .', 'Error Alert', {timeOut: 5000});
	}

	
});
