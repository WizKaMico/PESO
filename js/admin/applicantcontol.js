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
   function GetEmployerUpdateDetails(id) {
       // Add User ID to the hidden field for furture usage
       $("#hidden_aid").val(id);
   
       $.post("../../php-func/admin/ApplicantReadDetails.php", {
               id: id
           },
           function (data, status) {
               // PARSE json data
               var users = JSON.parse(data);
               var applicant_profile = JSON.parse(data);
               // Assing existing values to the modal popup fields 
               $("#UpdateEmail").val(applicant_profile.email);
               $("#UpdateUsername").val(users.username);
               $("#UpdateCurrentPassword").val(users.password);
           }
       );
       // Open modal popup
       $("#EditModal").modal("show");
   }
   
   //DELETE
   function GetDeleteDetails(id) {
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
       window.location = "../../php-func/admin/ApplicantDeleteFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //LOCK
   function GetUserStatusLockDetails(id) {
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
       window.location = "../../php-func/admin/ApplicantLockFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //UNLOCK
   function GetUserStatusUnlockDetails(id) {
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
       window.location = "../../php-func/admin/ApplicantUnlockFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //ARCHIVED
   function GetUserStatusArchivedDetails(id) {
       {swal({
       title: "Are you sure?",
       text: "You want to Archived this Account?",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#FF0000",
       confirmButtonText: "Archived",
       cancelButtonText: "Cancel",
       closeOnConfirm: false,
       closeOnCancel: false
       },
       function(isConfirm){
       if (isConfirm) {
       window.location = "../../php-func/admin/ApplicantArchivedFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //DEARCHIVED
   function GetUserStatusDeArchivedDetails(id) {
      {swal({
       title: "Are you sure?",
       text: "You want to DeArchived this Account?",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#008000",
       confirmButtonText: "DeArchived",
       cancelButtonText: "Cancel",
       closeOnConfirm: false,
       closeOnCancel: false
       },
       function(isConfirm){
       if (isConfirm) {
       window.location = "../../php-func/admin/ApplicantDeArchivedFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }