//PROFILE UPDATE CONFIRMATION
$(".profile-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Profile!",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//ACCOUNT UPDATE CONFIRMATION
$(".account-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Account?",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//ACCOUNT UPDATE CONFIRMATION
$(".account-secure-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Account?",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//GALLERY ADD CONFIRMATION
$(".add-photo-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Upload Your Photo?",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//GALLERY UPDATE CONFIRMATION
$(".update-photo-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Photo?",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//GALLERY DELETE CONFIRMATION
$(".delete-photo-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Delete Your Photo?",
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

//SALARY UPDATE CONFIRMATION
$(".salary-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Payment?!",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

//STUDIO UPDATE CONFIRMATION
$(".studio-submit").on("click", function(e) {
 e.preventDefault();
 var form = $(this).parents('form');
 swal({		
 title: "Are you sure?",
 text: "You want to Update Your Studio?!",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#2980B9",
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

