<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addjoin {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addjoin:hover {
        background-color: #45a049;  
    }

.custom-modal.join, 
.custom-modal.joinedit {
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
                        <button class="addjoin">Add Row</button>
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
                            <th style="white-space: nowrap">IGCC Membership</th>
                            <th style="white-space: nowrap">Support our Work</th>
                            <th style="white-space: nowrap">Join our Team</th>
                            <th style="width:10%">Action</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($joins as $join)
                            <tr class="user-row" id="join-{{ $join->id }}">
                                    <td>{{$counter}}</td>
                                    <td id="heading">{{$join->heading}}</td>  
                                    <td id="paragraph">{{$join->paragraph}}</td> 
                                    <td id="name">{{$join->name}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a data-join-id="{{ $join->id }}"class="btn btn-link btn-primary btn-lg edit-join-btn">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                       
                                            <a data-join-id="{{ $join->id }}" class="btn btn-link btn-danger deljoin mt-2">
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

      
<!-- Add join data Modal -->
<div style="display:none" class="custom-modal join" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add join</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="joinform">
                <input type="hidden" id="joinforminput_add" value=""/>
                <div class="row mt-5">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_add">IGCC Membership
                            </label>
                            <input type="text" id="heading_add" name="heading" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_add">Support our Work
                            </label>
                            <input type="text" id="paragraph_add" name="paragraph" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_add">Join our Team</label>
                            <input type="text" id="name_add" name="name" class="form-control">
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="joinadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- Add join edit Modal -->
 <div style="display:none" class="custom-modal joinedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit join</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="joineditform">
                <input type="hidden" id="joinforminput_edit" value=""/>
                <div class="row mt-5">
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_edit">IGCC Membership
                            </label>
                            <input type="text" id="heading_edit" name="heading" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_edit">Support our Work
                            </label>
                            <input type="text" id="paragraph_edit" name="paragraph" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_edit">Join our Team
                            </label>
                            <input type="text" id="name_edit" name="name" class="form-control">
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="joineditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
$('.addjoin').click(function() {
 $('.custom-modal.join').fadeIn();  
});

$('.closeModal').click(function() {
$('.custom-modal.join').fadeOut(); 
});

$(document).click(function(event) {
if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addjoin')) {
    $('.custom-modal.join').fadeOut(); 
}
});
});

//to del join
$(document).on('click', '.deljoin', function() {
const joinId = $(this).data('join-id');
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
        url: '/delete-join',
        type: 'POST',
        data: { join_id: joinId },  
        dataType: 'json',
        success: function(response) {
            $('#loader').fadeOut(300);
            if (response.success) {
                $('.addjoin').show();
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

$('#joinform').on('submit', function (e) {
e.preventDefault();   

let formData = new FormData(this);
$('#loader').show();
$.ajax({
url: "{{ route('join.store') }}",
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
            $('#joinform')[0].reset();
            $('.custom-modal.join').fadeOut();

            const join = response.join;
            const newRow = `
                <tr data-join-id="${join.id}">
                    <td>${$('.table tbody tr').length + 1}</td>
                    <td>${join.heading}</td>
                    <td>${join.paragraph}</td>
                    <td>${join.name}</td>
                    <td>
                         <div class="form-button-action">
                        <a id="joinedit" data-join-id="${join.id}" class="btn btn-link btn-primary btn-lg edit-join-btn">
                           <i class="fa fa-edit"></i>
                        </a>
                   
                        <a data-join-id="${join.id}" class="btn btn-link btn-danger mt-2  deljoin">
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


// get join data
$(document).on('click', '.edit-join-btn', function () {
var joinId = $(this).data('join-id');
$('#loader').show();
$.ajax({
url: "{{ route('join.show', '') }}/" + joinId, 
type: "GET",  
success: function (response) {
    console.log(response);
    $('#loader').hide();
    if (response.success) {
        $('#joineditform #joinforminput_edit').val(response.join.id);
        $('#joineditform #heading_edit').val(response.join.heading);
        $('#joineditform #paragraph_edit').val(response.join.paragraph);
        $('#joineditform #name_edit').val(response.join.name);
        $('.custom-modal.joinedit').fadeIn();
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


// Edit join 
$('#joineditform').on('submit', function (e) {
e.preventDefault();

var formData = new FormData(this); 
var joinId = $('#joinforminput_edit').val(); 
$('#loader').show();

$.ajax({
url: "{{ route('join.update', '') }}/" + joinId,  
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
            $('#joineditform')[0].reset();
            $('.custom-modal.joinedit').fadeOut();

            const join = $(`a[data-join-id="${joinId}"]`).closest('tr');
            join.find('td:nth-child(2)').text(response.join.heading);
            join.find('td:nth-child(3)').text(response.join.paragraph);
            join.find('td:nth-child(4)').text(response.join.name);
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
$('.custom-modal.joinedit').fadeOut();
});
</script>
</body>
</html>
