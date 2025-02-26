<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addmember {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addmember:hover {
        background-color: #45a049;  
    }

.custom-modal.member, 
.custom-modal.memberedit {
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;              
    justify-content: center;   
    align-items: center; 
}


    .modal-dialog {
        max-width: 800px;
        animation: slideDown 0.5s ease;
    }

  
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes slideDown {
        0% { transform: translateY(-50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        height: auto;
        text-align: center;
    }
</style>
  </head>
  <body>
    <div class="wrapper">
    @include('adminpages.sidebar')

      <div class="main-panel">
        @include('adminpages.header')

        <div class="container">
          <div class="page-inner">
     
            <div class="row">
    
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="addmember">Add Row</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Paragraph</th>
                            <th>Name</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($members as $member)
                            <tr class="user-row" id="member-{{ $member->id }}">
                                <td>{{$counter}}</td>
                                <td id="icon">
                                     <img height="80" width="80" src="{{ asset('images/' . $member->image) }}"/>
                                </td>

                                <td id="heading">{{$member->heading}}</td>  
                                <td id="paragraph">{{$member->paragraph}}</td> 
                                <td id="name">{{$member->name}}</td>
                                <td>
                                    <div class="form-button-action">
                                    <a data-member-id="{{ $member->id }}" class="btn btn-link btn-primary btn-lg edit-member-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                
                                    <a data-member-id="{{ $member->id }}" class="btn btn-link btn-danger mt-2 delmember">
                                        <i class="fa fa-times"></i>                                                       
                                    </a>
                                    </div>
                                </td>
                                 
                            </tr>
                            @php $counter++; @endphp
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('adminpages.footer')
      </div>
    </div>

     

<div id="loader" style="display: none">
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
  </div>

  <!-- Add member data Modal -->
  <div style="display:none" class="custom-modal member" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add Member</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="memberform">
                <input type="hidden" id="memberforminput_add" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="icon_add">Image</label>
                            <input type="file" id="icon_add" name="image" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_add">Heading</label>
                            <input type="text" id="heading_add" name="heading" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_add">Paragraph</label>
                            <input type="text" id="paragraph_add" name="paragraph" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_add">Name</label>
                            <input type="text" id="name_add" name="name" class="form-control">
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="memberadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- Add member edit Modal -->
 <div style="display:none" class="custom-modal memberedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit Member</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="membereditform">
                <input type="hidden" id="memberforminput_edit" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="icon_edit">Image</label>
                            <input type="file" id="icon_edit" name="image" class="form-control">
                        </div>
                    </div>
                   
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_edit">Heading</label>
                            <input type="text" id="heading_edit" name="heading" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_edit">Paragraph</label>
                            <input type="text" id="paragraph_edit" name="paragraph" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_edit">Name</label>
                            <input type="text" id="name_edit" name="name" class="form-control">
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="membereditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

    @include('adminpages.js')
    @include('adminpages.ajax')
    <script>
        $(document).ready(function () {
       
   
           $(document).ready(function() {
        $('.addmember').click(function() {
            $('.custom-modal.member').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.member').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addmember')) {
               $('.custom-modal.member').fadeOut(); 
           }
       });
   });
   
   //to del member
   $(document).on('click', '.delmember', function() {
       const memberId = $(this).data('member-id');
       const csrfToken = $('meta[name="csrf-token"]').attr('content');
       const row = $(this).closest('tr');  
   
       Swal.fire({
           title: 'Are you sure?',
           text: "Do you want to delete this?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#d33',
           cancelButtonColor: '#3085d6',
           confirmButtonText: 'Yes, delete!'
       }).then((result) => {
           if (result.isConfirmed) {
               $('#loader').fadeIn(300);
               $.ajaxSetup({
                   headers: { 'X-CSRF-TOKEN': csrfToken }
               });
   
               $.ajax({
                   url: '/delete-member',
                   type: 'POST',
                   data: { member_id: memberId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addmember').show();
                           row.remove(); 
                           Swal.fire(
                               'Deleted!',
                               response.message,
                               'success'
                           );
                       } else {
                           Swal.fire(
                               'Error',
                               response.message,
                               'error'
                           );
                       }
                   },
                   error: function(xhr) {
                       $('#loader').fadeOut(300);
                       console.error(xhr);
                       Swal.fire(
                           'Error',
                           'An error occurred while deleting this.',
                           'error'
                       );
                   }
               });
           }
       });
   });
   
        $('#memberform').on('submit', function (e) {
       e.preventDefault();   
   
       let formData = new FormData(this);
       $('#loader').show();
       $.ajax({
           url: "{{ route('member.store') }}",
           type: "POST",
           data: formData,
           contentType: false,
           processData: false,
           success: function (response) {
               $('#loader').hide();
               if (response.success) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Added!',
                       text: response.message || 'Added successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#memberform')[0].reset();
                       $('.custom-modal.member').fadeOut();
   
                       const member = response.member;
                       const newRow = `
                           <tr data-member-id="${member.id}">
                               <td>${$('.table tbody tr').length + 1}</td>
                               <td><img height="80" width="80" src="{{ asset('images/') }}/${member.image}" /></td>
                               <td>${member.heading}</td>
                               <td>${member.paragraph}</td>
                               <td>${member.name}</td>
                               <td>
                                <div class="form-button-action">
                                   <a id="memberedit" data-member-id="${member.id}" class="btn btn-link btn-primary btn-lg edit-member-btn">
                                      <i class="fa fa-edit"></i>
                                   </a>
                              
                                   <a data-member-id="${member.id}" class="btn btn-link btn-danger mt-2 delmember">
                                      <i class="fa fa-times"></i>
                                   </a>
                               </td>
                           </tr>
                       `;
   
                       $('table tbody').append(newRow);
                    });
               }
           },
           error: function (xhr) {
               $('#loader').hide();
               let errors = xhr.responseJSON.errors;
               if (errors) {
                   let errorMessages = Object.values(errors)
                       .map(err => err.join('\n'))
                       .join('\n');
                   Swal.fire({
                       icon: 'error',
                       title: 'Error!',
                       text: errorMessages,
                       confirmButtonText: 'Ok'
                   });
               }
           }
       });
   });
   
   
   // get member data
   $(document).on('click', '.edit-member-btn', function () {
       var memberId = $(this).data('member-id');
       $('#loader').show();
       $.ajax({
           url: "{{ route('member.show', '') }}/" + memberId, 
           type: "GET",  
           success: function (response) {
               console.log(response);
               $('#loader').hide();
               if (response.success) {
                   $('#membereditform #memberforminput_edit').val(response.member.id);
                   if (response.member.image) {
                       $('#membereditform #icon_edit').attr('src', "{{ asset('images') }}/" + response.member.image);
                   }
                   
                   $('#membereditform #heading_edit').val(response.member.heading);
                   $('#membereditform #paragraph_edit').val(response.member.paragraph);
                   $('#membereditform #name_edit').val(response.member.name);
                   $('.custom-modal.memberedit').fadeIn();
               }
           },
           error: function (xhr) {
               $('#loader').hide();
               Swal.fire({
                   icon: 'error',
                   title: 'Error!',
                   text: 'Failed to fetch details.',
                   confirmButtonText: 'Ok'
               });
           }
       });
   });
   
   
   // Edit member 
   $('#membereditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var memberId = $('#memberforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('member.update', '') }}/" + memberId,  
           type: "POST",  
           data: formData,
           contentType: false, 
           processData: false, 
           success: function (response) {
               $('#loader').hide();
               if (response.success) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Updated!',
                       text: response.message || 'Updated successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#membereditform')[0].reset();
                       $('.custom-modal.memberedit').fadeOut();
   
                       const member = $(`a[data-member-id="${memberId}"]`).closest('tr');
                       member.find('td:nth-child(2) img').attr('src', '/images/' + response.member.image);
                       member.find('td:nth-child(3)').text(response.member.heading);
                       member.find('td:nth-child(4)').text(response.member.paragraph);
                       member.find('td:nth-child(5)').text(response.member.name);
                   });
               } else {
                   Swal.fire({
                       icon: 'error',
                       title: 'Error!',
                       text: response.message || 'An error occurred.',
                       confirmButtonText: 'Ok'
                   });
               }
           },
           error: function (xhr) {
               $('#loader').hide();
               let errors = xhr.responseJSON.errors;
               if (errors) {
                   let errorMessages = Object.values(errors)
                       .map(err => err.join('\n'))
                       .join('\n');
                   Swal.fire({
                       icon: 'error',
                       title: 'Error!',
                       text: errorMessages,
                       confirmButtonText: 'Ok'
                   });
               }
           }
       });
   });
   
   
   
   });
   
    $('.closeModal').on('click', function () {
       $('.custom-modal.memberedit').fadeOut();
   });
           </script>
  </body>
</html>
