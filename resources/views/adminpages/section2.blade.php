<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsection2 {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsection2:hover {
        background-color: #45a049;  
    }

.custom-modal.section2, 
.custom-modal.section2edit {
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
                        <button class="addsection2">Add Row</button>
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
                            @foreach($section2s as $section2)
                            <tr class="user-row" id="section2-{{ $section2->id }}">
                                    <td>{{$counter}}</td>
                                    <td id="icon">
                                         <img height="80" width="80" src="{{ asset('images/' . $section2->image) }}"/>
                                    </td>

                                    <td id="heading">{{$section2->heading}}</td>  
                                    <td id="paragraph">{{$section2->paragraph}}</td> 
                                    <td>
                                        <div class="form-button-action">
                                        <a data-section2-id="{{ $section2->id }}" class="btn btn-link btn-primary btn-lg edit-section2-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <a data-section2-id="{{ $section2->id }}" class="btn btn-link btn-danger mt-2 delsection2">
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

       <!-- Add section2 data Modal -->
       <div style="display:none" class="custom-modal section2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Add section2</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="section2form">
                    <input type="hidden" id="section2forminput_add" value=""/>
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
                        <button id="section2add" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    


     <!-- Add section2 edit Modal -->
     <div style="display:none" class="custom-modal section2edit" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Edit section2</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="section2editform">
                    <input type="hidden" id="section2forminput_edit" value=""/>
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
                        <button id="section2editForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
 $('.addsection2').click(function() {
     $('.custom-modal.section2').fadeIn();  
});

 $('.closeModal').click(function() {
    $('.custom-modal.section2').fadeOut(); 
});

 $(document).click(function(event) {
    if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addsection2')) {
        $('.custom-modal.section2').fadeOut(); 
    }
});
});

//to del section2
$(document).on('click', '.delsection2', function() {
const section2Id = $(this).data('section2-id');
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
            url: '/delete-section2',
            type: 'POST',
            data: { section2_id: section2Id },  
            dataType: 'json',
            success: function(response) {
                $('#loader').fadeOut(300);
                if (response.success) {
                    $('.addsection2').show();
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

 $('#section2form').on('submit', function (e) {
e.preventDefault();   

let formData = new FormData(this);
$('#loader').show();
$.ajax({
    url: "{{ route('section2.store') }}",
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
                $('#section2form')[0].reset();
                $('.custom-modal.section2').fadeOut();

                const section2 = response.section2;
                const newRow = `
                    <tr data-section2-id="${section2.id}">
                        <td>${$('.table tbody tr').length + 1}</td>
                        <td><img height="80" width="80" src="{{ asset('images/') }}/${section2.image}" /></td>
                        <td>${section2.heading}</td>
                        <td>${section2.paragraph}</td>
                        <td>
                            <div class="form-button-action">
                            <a id="section2edit" data-section2-id="${section2.id}" class="btn btn-link btn-primary btn-lg edit-section2-btn">
                               <i class="fa fa-edit"></i>
                            </a>
                        
                            <a data-section2-id="${section2.id}" class="btn btn-link btn-danger mt-2 delsection2">
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


// get section2 data
$(document).on('click', '.edit-section2-btn', function () {
var section2Id = $(this).data('section2-id');
$('#loader').show();
$.ajax({
    url: "{{ route('section2.show', '') }}/" + section2Id, 
    type: "GET",  
    success: function (response) {
        console.log(response);
        $('#loader').hide();
        if (response.success) {
            $('#section2editform #section2forminput_edit').val(response.section2.id);
            if (response.section2.image) {
                $('#section2editform #icon_edit').attr('src', "{{ asset('images') }}/" + response.section2.image);
            }
            
            $('#section2editform #heading_edit').val(response.section2.heading);
            $('#section2editform #paragraph_edit').val(response.section2.paragraph);
            $('.custom-modal.section2edit').fadeIn();
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


// Edit section2 
$('#section2editform').on('submit', function (e) {
e.preventDefault();

var formData = new FormData(this); 
var section2Id = $('#section2forminput_edit').val(); 
$('#loader').show();

$.ajax({
    url: "{{ route('section2.update', '') }}/" + section2Id,  
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
                $('#section2editform')[0].reset();
                $('.custom-modal.section2edit').fadeOut();

                const section2 = $(`a[data-section2-id="${section2Id}"]`).closest('tr');
                section2.find('td:nth-child(2) img').attr('src', '/images/' + response.section2.image);
                section2.find('td:nth-child(3)').text(response.section2.heading);
                section2.find('td:nth-child(4)').text(response.section2.paragraph);
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
$('.custom-modal.section2edit').fadeOut();
});
    </script>
  
  </body>
</html>
