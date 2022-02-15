//CONFIRMATION

    //ADD CONFIRMATION
    $(".add-confirm").on("click", function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({		
    title: "Are you sure?",
    text: "You want to this add Job List?",
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

   //POST ANNOUNCEMENT CONFIRMATION
   $(".post-confirm").on("click", function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({		
    title: "Are you sure?",
    text: "You want to Post this Announcement?",
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
   
   //UPDATE
   function GetUpdateDetails(eid) {
       // Add User ID to the hidden field for furture usage
       $("#hidden_eid").val(eid);
   
       $.post("../../php-func/employer/EmployerReadDetails.php", {
               eid: eid
           },
           function (data, status) {
               // PARSE json data
               var applicant_profile = JSON.parse(data);// Assing existing values to the modal popup fields 
               $("#UpdateFirstName").val(applicant_profile.fname);
               $("#UpdateLastName").val(applicant_profile.lname);
               $("#UpdateMiddleName").val(applicant_profile.mname);
               $("#UpdateSuffix").val(applicant_profile.suffix);
               $("#UpdateEmail").val(applicant_profile.email);
               $("#UpdatePrimary").val(applicant_profile.primary_contact_number);
               $("#UpdateSecondary").val(applicant_profile.secondary_contact_number);
           }
       );
       // Open modal popup
       $("#UpdateJobListModal").modal("show");
   }

   //UPDATE
   function GetJoblistUpdateDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_eid").val(id);

    $.post("../../php-func/employer/EmployerReadDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var employer_vacancy_profile = JSON.parse(data);// Assing existing values to the modal popup fields 
            $("#UpdateFirstName").val(employer_vacancy_profile.job_title);
            $("#UpdateLastName").val(employer_vacancy_profile.job_summary);
            $("#UpdateMiddleName").val(employer_vacancy_profile.job_description);
            $("#UpdateUsername").val(employer_vacancy_profile.job_requirements);
        }
    );
    // Open modal popup
    $("#UpdateJobListModal").modal("show");
}

 //UPDATE
 function GetUpdateAnnouncementDetails(eid) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_eid").val(eid);

    $.post("../../php-func/employer/EmployerReadDetails2.php", {
            eid: eid
        },
        function (data, status) {
            // PARSE json data
            var employer_vacancy_profile = JSON.parse(data);// Assing existing values to the modal popup fields 
            $("#UpdateFirstName").val(employer_vacancy_profile.job_title);
            $("#UpdateLastName").val(employer_vacancy_profile.job_summary);
            $("#UpdateMiddleName").val(employer_vacancy_profile.job_description);
            $("#UpdateUsername").val(employer_vacancy_profile.job_requirements);
        }
    );
    // Open modal popup
    $("#UpdateAnnouncementModal").modal("show");
}
   
   //DELETE
   function GetDeleteDetails(u_id) {
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
       window.location = "../../php-func/admin/ClientAccountDeleteFunction.php?id="+u_id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //LOCK
   function GetUserStatusLockDetails(u_id) {
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
       window.location = "../../php-func/admin/ClientAccountLockFunction.php?id="+u_id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //UNLOCK
   function GetUserStatusUnlockDetails(u_id) {
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
       window.location = "../../php-func/admin/ClientAccountUnlockFunction.php?id="+u_id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //ARCHIVED
   function GetUserStatusArchivedDetails(u_id) {
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
       window.location = "../../php-func/admin/ClientAccountArchivedFunction.php?id="+u_id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }
   
   //DEARCHIVED
   function GetUserStatusDeArchivedDetails(u_id) {
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
       window.location = "../../php-func/admin/ClientAccountDeArchivedFunction.php?id="+u_id;							  
       } else {
       swal("Cancelled", "The Record is safe :)", "error");
       }
       });		
   }
   }

      //DELETE
      function GetJobDeleteDetails(id) {
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
         window.location = "../../php-func/employer/DeleteJobListEmployer.php?id="+id;							  
         } else {
         swal("Cancelled", "The Record is safe :)", "error");
         }
         });		
     }
     }
    
      //HIRING
      function GetJobHiringStatusDetails(id) {
        {swal({
        title: "Are you sure?",
        text: "You want to set to Hired this Job?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF0000",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
        window.location = "../../php-func/employer/HiringJobListEmployer.php?id="+id;							  
        } else {
        swal("Cancelled", "The Record is safe :)", "error");
        }
        });		
    }
    }
    
    //HIRED
    function GetJobHiredStatusDetails(id) {
       {swal({
        title: "Are you sure?",
        text: "You want to Set to Hiring this Job?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#008000",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
        window.location = "../../php-func/employer/HiredJobListEmployer.php?id="+id;							  
        } else {
        swal("Cancelled", "The Record is safe :)", "error");
        }
        });		
    }
    }

    //APPLIED
    function GetJobHiringStatusDetails(id) {
        {swal({
        title: "Are you sure?",
        text: "You want to set to Hired this Job?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF0000",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
        window.location = "../../php-func/employer/HiringJobListEmployer.php?id="+id;							  
        } else {
        swal("Cancelled", "The Record is safe :)", "error");
        }
        });		
    }
    }
    
    //FIRED
    function GetJobHiredStatusDetails(id) {
       {swal({
        title: "Are you sure?",
        text: "You want to Set to Hiring this Job?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#008000",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
        window.location = "../../php-func/employer/HiredJobListEmployer.php?id="+id;							  
        } else {
        swal("Cancelled", "The Record is safe :)", "error");
        }
        });		
    }
    }


    //DELETE
   function GetPostDeleteDetails(eid) {
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
     window.location = "../../php-func/employer/AnnouncementDeleteEmployer.php?id="+eid;							  
     } else {
     swal("Cancelled", "The Record is safe :)", "error");
     }
     });		
 }
 }