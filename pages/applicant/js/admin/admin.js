//CONFIRMATION

//ADD CONFIRMATION
$(".add-confirm").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Add the Record!",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#FF0000",
 confirmButtonText: "Confirm",
 cancelButtonText: "Cancel",
 closeOnConfirm: false,
 closeOnCancel: true
 },
 function(isConfirm){
 if (isConfirm) {
   if (isConfirm) form.submit();
 }
});
});

//UPDATE CONFIRMATION
$(".update-confirm").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update the Record!",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#FF0000",
 confirmButtonText: "Confirm",
 cancelButtonText: "Cancel",
 closeOnConfirm: false,
 closeOnCancel: true
 },
 function(isConfirm){
 if (isConfirm) {
   if (isConfirm) form.submit();
 }
});
});

//UPDATE
function GetUpdateDetails(c_id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_c_id").val(c_id);

    $.post("../../php-func/admin/CoordinatorReadDetails.php", {
            c_id: c_id
        },
        function (data, status) {
            // PARSE json data
            var users = JSON.parse(data);
            var userprofiles = JSON.parse(data);
            // Assing existing values to the modal popup fields 
			$("#UpdateFirstName").val(users.fname);
            $("#UpdateLastName").val(users.lname);
            $("#UpdateMiddleName").val(users.mname);
            $("#UpdateUsername").val(users.username);
            $("#UpdatePassword1").val(users.password);
            $("#UpdatePassword2").val(users.password);
            $("#UpdateEmail").val(userprofiles.user_email);
            $("#UpdateStudioName").val(userprofiles.user_studio);
            $("#UpdateStudioLocation").val(userprofiles.user_studioaddress);
            $("#UpdatePayCharge").val(userprofiles.user_salary);	
        }
    );
    // Open modal popup
    $("#UpdateUserModal").modal("show");
}

//DELETE
function GetDeleteDetails(c_id) {
   {swal({
	title: "Are you sure?",
	text: "You want to Delete this Record!",
	type: "warning",
	showCancelButton: true,
	confirmButtonColor: "#FF0000",
	confirmButtonText: "Delete",
	cancelButtonText: "Cancel",
	closeOnConfirm: false,
	closeOnCancel: false
	},
	function(isConfirm){
	if (isConfirm) {
	window.location = "../../php-func/admin/AccountDeleteFunction.php?id="+c_id;							  
	} else {
	swal("Cancelled", "The Record is safe :)", "error");
	}
	});		
}
}

//LOCK
function GetUserStatusLockDetails(c_id) {
    {swal({
	title: "Are you sure?",
	text: "You want to Lock this Account?",
	type: "warning",
	showCancelButton: true,
	confirmButtonColor: "#FF0000",
	confirmButtonText: "Lock",
	cancelButtonText: "Cancel",
	closeOnConfirm: false,
	closeOnCancel: false
	},
	function(isConfirm){
	if (isConfirm) {
	window.location = "../../php-func/admin/AccountLockFunction.php?id="+c_id;							  
	} else {
	swal("Cancelled", "The Record is safe :)", "error");
	}
	});		
}
}

//UNLOCK
function GetUserStatusUnlockDetails(c_id) {
   {swal({
	title: "Are you sure?",
	text: "You want to Unlock this Account?",
	type: "warning",
	showCancelButton: true,
	confirmButtonColor: "#008000",
	confirmButtonText: "Unlock",
	cancelButtonText: "Cancel",
	closeOnConfirm: false,
	closeOnCancel: false
	},
	function(isConfirm){
	if (isConfirm) {
	window.location = "../../php-func/admin/AccountUnlockFunction.php?id="+c_id;							  
	} else {
	swal("Cancelled", "The Record is safe :)", "error");
	}
	});		
}
}