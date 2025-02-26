<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addworkstream {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addworkstream:hover {
        background-color: #45a049;  
    }

.custom-modal.workstream, 
.custom-modal.workstreamedit {
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
                        <button class="addworkstream">Add Row</button>
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
                            <th style="width:10%">Action</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($workstreams as $workstream)
                            <tr class="user-row" id="workstream-{{ $workstream->id }}">
                                    <td>{{$counter}}</td>
                                    <td id="icon">
                                         <img height="80" width="80" src="{{ asset('images/' . $workstream->image) }}"/>
                                    </td>

                                    <td id="heading">{{$workstream->heading}}</td>  
                                    <td id="paragraph">{{$workstream->paragraph}}</td> 
                                    <td>
                                        <div class="form-button-action">
                                        <a data-workstream-id="{{ $workstream->id }}" class="btn btn-link btn-primary btn-lg edit-workstream-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <a data-workstream-id="{{ $workstream->id }}" class="btn btn-link btn-danger mt-2 delworkstream">
                                            <i class="fa fa-times"></i>                                                       
                                        </a>
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

       <!-- Add workstream data Modal -->
       <div style="display:none" class="custom-modal workstream" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Add workstream</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="workstreamform">
                    <input type="hidden" id="workstreamforminput_add" value=""/>
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
                        <button id="workstreamadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    


     <!-- Add workstream edit Modal -->
     <div style="display:none" class="custom-modal workstreamedit" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Edit workstream</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="workstreameditform">
                    <input type="hidden" id="workstreamforminput_edit" value=""/>
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
                        <button id="workstreameditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div id="loader" style="display: none">
        <div class="circle one"></div>
        <div class="circle two"></div>
        <div class="circle three"></div>
      </div>


   @include('adminpages.js')
   @include('adminpages.ajax')
   <script>
 $(document).ready(function () {


    $(document).ready(function() {
 $('.addworkstream').click(function() {
     $('.custom-modal.workstream').fadeIn();  
});

 $('.closeModal').click(function() {
    $('.custom-modal.workstream').fadeOut(); 
});

 $(document).click(function(event) {
    if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addworkstream')) {
        $('.custom-modal.workstream').fadeOut(); 
    }
});
});

//to del workstream
$(document).on('click', '.delworkstream', function() {
const workstreamId = $(this).data('workstream-id');
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
            url: '/delete-workstream',
            type: 'POST',
            data: { workstream_id: workstreamId },  
            dataType: 'json',
            success: function(response) {
                $('#loader').fadeOut(300);
                if (response.success) {
                    $('.addworkstream').show();
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

 $('#workstreamform').on('submit', function (e) {
e.preventDefault();   

let formData = new FormData(this);
$('#loader').show();
$.ajax({
    url: "{{ route('workstream.store') }}",
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
                $('#workstreamform')[0].reset();
                $('.custom-modal.workstream').fadeOut();

                const workstream = response.workstream;
                const newRow = `
                    <tr data-workstream-id="${workstream.id}">
                        <td>${$('.table tbody tr').length + 1}</td>
                        <td><img height="80" width="80" src="{{ asset('images/') }}/${workstream.image}" /></td>
                        <td>${workstream.heading}</td>
                        <td>${workstream.paragraph}</td>
                        <td>
                            <div class="form-button-action">
                            <a id="workstreamedit" data-workstream-id="${workstream.id}" class="btn btn-link btn-primary btn-lg edit-workstream-btn">
                               <i class="fa fa-edit"></i>
                            </a>
                        
                            <a data-workstream-id="${workstream.id}" class="btn btn-link btn-danger mt-2 delworkstream">
                               <i class="fa fa-times"></i>
                            </a>
                            </div>
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


// get workstream data
$(document).on('click', '.edit-workstream-btn', function () {
var workstreamId = $(this).data('workstream-id');
$('#loader').show();
$.ajax({
    url: "{{ route('workstream.show', '') }}/" + workstreamId, 
    type: "GET",  
    success: function (response) {
        console.log(response);
        $('#loader').hide();
        if (response.success) {
            $('#workstreameditform #workstreamforminput_edit').val(response.workstream.id);
            if (response.workstream.image) {
                $('#workstreameditform #icon_edit').attr('src', "{{ asset('images') }}/" + response.workstream.image);
            }
            
            $('#workstreameditform #heading_edit').val(response.workstream.heading);
            $('#workstreameditform #paragraph_edit').val(response.workstream.paragraph);
            $('.custom-modal.workstreamedit').fadeIn();
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


// Edit workstream 
$('#workstreameditform').on('submit', function (e) {
e.preventDefault();

var formData = new FormData(this); 
var workstreamId = $('#workstreamforminput_edit').val(); 
$('#loader').show();

$.ajax({
    url: "{{ route('workstream.update', '') }}/" + workstreamId,  
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
                $('#workstreameditform')[0].reset();
                $('.custom-modal.workstreamedit').fadeOut();

                const workstream = $(`a[data-workstream-id="${workstreamId}"]`).closest('tr');
                workstream.find('td:nth-child(2) img').attr('src', '/images/' + response.workstream.image);
                workstream.find('td:nth-child(3)').text(response.workstream.heading);
                workstream.find('td:nth-child(4)').text(response.workstream.paragraph);
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
$('.custom-modal.workstreamedit').fadeOut();
});
    </script>
  
  </body>
</html>
