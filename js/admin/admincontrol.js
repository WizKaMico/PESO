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
   function GetAnnouncementUpdateDetails(id) {
       // Add User ID to the hidden field for furture usage
       $("#hidden_aid").val(id);
   
       $.post("../../php-func/admin/AdminReadDetails.php", {
               id: id
           },
           function (data, status) {
               // PARSE json data
               var announcement = JSON.parse(data);
               // Assing existing values to the modal popup fields 
               $("#UpdateTitle").val(announcement.title_announcement);
               $("#postannouncement_textarea").val(announcement.description);
           }
       );
       // Open modal popup
       $("#EditModal").modal("show");
   }
   
   //DELETE
   function GetApplicantDeleteDetails(id) {
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

   //DELETE
   function GetEmployerDeleteDetails(id) {
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
       window.location = "../../php-func/admin/EmployerDeleteFunction.php?id="+id;							  
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
       window.location = "../../php-func/admin/AdminAnnouncementArchivedFunction.php?id="+id;							  
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
       window.location = "../../php-func/admin/AdminAnnouncementDeArchivedFunction.php?id="+id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }

   //DELETE
   function GetPostDeleteDetails(id) {
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
     window.location = "../../php-func/admin/AdminAnnouncementDeleteFunction.php?id="+id;							  
     } else {
     swal("Cancelled", "The Record is safe :)", "error");
     }
     });		
 }
 }

   //LOCK
   function GetPostLockDetails(id) {
    {swal({
    title: "Are you sure?",
    text: "You want to Unpost this Announcement?",
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
function GetPostUnlockDetails(id) {
   {swal({
    title: "Are you sure?",
    text: "You want to Post this Announcement?",
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
function GetPostArchivedDetails(id) {
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
    window.location = "../../php-func/admin/AdminAnnouncementArchivedFunction.php?id="+id;							  
    } else {
    swal("Cancelled", "The Record is safe :)", "error");
    }
    });		
}
}

//DEARCHIVED
function GetPostDeArchivedDetails(id) {
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
    window.location = "../../php-func/admin/AdminAnnouncementDeArchivedFunction.php?id="+id;							  
    } else {
    swal("Cancelled", "The Record is safe :)", "error");
    }
    });		
}
}
   