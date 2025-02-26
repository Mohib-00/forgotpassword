<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addbanner {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addbanner:hover {
        background-color: #45a049;  
    }

    .custom-modal.banner, 
.custom-modal.banneredit {
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
                            <button class="addbanner">Add Row</button>
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
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($banners as $banner)
                                <tr class="user-row" id="banner-{{ $banner->id }}">
                                        <td>{{$counter}}</td>
                                        <td id="icon">
                                             <img height="80" width="80" src="{{ asset('images/' . $banner->image) }}"/>
                                        </td>

                                        <td id="heading">{{$banner->heading}}</td>  
                                        <td id="paragraph">{{$banner->paragraph}}</td> 
                                        <td>
                                            <div class="form-button-action">
                                            <a data-banner-id="{{ $banner->id }}"class="btn btn-link btn-primary btn-lg edit-banner-btn">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                       
                                            <a data-banner-id="{{ $banner->id }}" class="btn btn-link btn-danger delbanner mt-2">
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

   <!-- Add banner data Modal -->
   <div style="display:none" class="custom-modal banner" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add Banner</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="bannerform">
                <input type="hidden" id="bannerforminput_add" value=""/>
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
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="banneradd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- Add banner edit Modal -->
 <div style="display:none" class="custom-modal banneredit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit Banner</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="bannereditform">
                <input type="hidden" id="bannerforminput_edit" value=""/>
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
                  
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="bannereditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addbanner').click(function() {
            $('.custom-modal.banner').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.banner').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addbanner')) {
               $('.custom-modal.banner').fadeOut(); 
           }
       });
   });
   
   //to del banner
   $(document).on('click', '.delbanner', function() {
       const bannerId = $(this).data('banner-id');
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
                   url: '/delete-banner',
                   type: 'POST',
                   data: { banner_id: bannerId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addbanner').show();
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
   
        $('#bannerform').on('submit', function (e) {
       e.preventDefault();   
   
       let formData = new FormData(this);
       $('#loader').show();
       $.ajax({
           url: "{{ route('banner.store') }}",
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
                       $('#bannerform')[0].reset();
                       $('.custom-modal.banner').fadeOut();
   
                       const banner = response.banner;
                       const newRow = `
                           <tr data-banner-id="${banner.id}">
                               <td>${$('.table tbody tr').length + 1}</td>
                               <td><img height="80" width="80" src="{{ asset('images/') }}/${banner.image}" /></td>
                               <td>${banner.heading}</td>
                               <td>${banner.paragraph}</td>
                               <td>
                                <div class="form-button-action">
                                   <a id="banneredit" data-banner-id="${banner.id}" class="btn btn-link btn-primary btn-lg edit-banner-btn">
                                       <i class="fa fa-edit"></i>
                                   </a>
                               
                                   <a data-banner-id="${banner.id}" class="btn btn-link btn-danger mt-2 delbanner">
                                        <i class="fa fa-times"></i>        
                                   </a>
                                   </div>
                               </td>
                           </tr>
                       `;
   
                       $('table tbody').append(newRow);
                       $('.addbanner').hide();
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
   
   
   // get banner data
   $(document).on('click', '.edit-banner-btn', function () {
       var bannerId = $(this).data('banner-id');
       $('#loader').show();
       $.ajax({
           url: "{{ route('banner.show', '') }}/" + bannerId, 
           type: "GET",  
           success: function (response) {
               console.log(response);
               $('#loader').hide();
               if (response.success) {
                   $('#bannereditform #bannerforminput_edit').val(response.banner.id);
                   if (response.banner.image) {
                       $('#bannereditform #icon_edit').attr('src', "{{ asset('images') }}/" + response.banner.image);
                   }
                   
                   $('#bannereditform #heading_edit').val(response.banner.heading);
                   $('#bannereditform #paragraph_edit').val(response.banner.paragraph);
                   $('.custom-modal.banneredit').fadeIn();
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
   
   
   // Edit banner 
   $('#bannereditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var bannerId = $('#bannerforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('banner.update', '') }}/" + bannerId,  
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
                       $('#bannereditform')[0].reset();
                       $('.custom-modal.banneredit').fadeOut();
   
                       const banner = $(`a[data-banner-id="${bannerId}"]`).closest('tr');
                       banner.find('td:nth-child(2) img').attr('src', '/images/' + response.banner.image);
                       banner.find('td:nth-child(3)').text(response.banner.heading);
                       banner.find('td:nth-child(4)').text(response.banner.paragraph);
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
       $('.custom-modal.banneredit').fadeOut();
   });
           </script>

  </body>
</html>
