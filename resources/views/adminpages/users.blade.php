<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        width: 100%;
        max-width: 800px; 
        animation: slideDown 0.5s ease;
    }

    .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    @media (max-width: 767px) {
        .modal-dialog {
            max-width: 90%; 
        }

        .modal-content {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        .modal-content {
            padding: 10px;
        }
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
                      <h4 class="card-title">Users</h4>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>UserType</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($users as $user)
                            <tr class="user-row" data-user-id="{{ $user->id }}">
                              <td>{{ $counter }}</td>
                              <td>
                                  <img height="80" width="80" src="{{ asset($user->photo_path ? $user->photo_path : 'dummy.png') }}" />
                              </td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->userType }}</td>
                              <td>
                                  <div class="form-button-action">
                                      <button
                                          data-user-id="{{ $user->id }}"
                                          type="button"
                                          data-bs-toggle="tooltip"
                                          title=""
                                          class="btn btn-link btn-primary btn-lg edit-user-btn"
                                          data-original-title="Edit Task"
                                      >
                                          <i class="fa fa-edit"></i>
                                      </button>
                                      @if($user->userType != 1)
                                      <button
                                          data-user-id="{{ $user->id }}"
                                          type="button"
                                          data-bs-toggle="tooltip"
                                          title=""
                                          class="btn btn-link btn-danger deluser"
                                          data-original-title="Remove"
                                      >
                                          <i class="fa fa-times"></i>
                                      </button>
                                      @endif
                                  </div>
                              </td>
                              @php $counter++; @endphp
                          </tr>
                          
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

         <!-- Edit User Modal -->
<div class="custom-modal" id="editUserModal" aria-hidden="true" tabindex="-1" style="
display: none; 
position: fixed; 
z-index: 1050; 
left: 0; 
top: 0; 
width: 100%; 
height: 100%; 
background-color: rgba(0, 0, 0, 0.5); 
justify-content: center; 
align-items: center; 
animation: fadeIn 0.3s ease;">
<div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
    <div class="modal-content" style="
        background-color: white; 
        padding: 20px; 
        border-radius: 8px; 
        text-align: center; 
        width: 800px; 
        animation: slideDown 0.5s ease;">
        <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
             
        </div>
        <form>
        <div class="modal-body">
          <input type="hidden" id="edituserid" value=""/> 


          
        <div class="form-group">
            <label for="editName" style="text-align: left; display: block; margin-bottom: 0.5rem;">Name</label>
            <input type="text" class="form-control" id="editName">
        </div>
        <div class="form-group">
            <label for="editEmail" style="text-align: left; display: block; margin-bottom: 0.5rem;">Email</label>
            <input type="email" class="form-control" id="editEmail">
        </div>
         
        <div class="form-group">
            <label for="editUserType" style="text-align: left; display: block; margin-bottom: 0.5rem;">User Type</label>
            <input type="text" class="form-control" id="editUserType">
        </div>
        

        </div>
        
        <div class="modal-footer">
            <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button   type="button" id="submitEdit" class="btn btn-primary mx-2">Submit</button>
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
        //to get user
    $(document).on('click', '.edit-user-btn', function() {
    const userId = $(this).data('user-id');
    $('#edituserid').val(userId);
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#loader').fadeIn(300);
    $.ajax({
        url: '/get-user-data',  
        type: 'POST',
        data: { user_id: userId },
        headers: { 'X-CSRF-TOKEN': csrfToken },
        success: function(response) {
            $('#loader').fadeOut(300);
            if (response.success) {
                 
                $('#editUserId').val(response.user.id);
                $('#editName').val(response.user.name);
                $('#editEmail').val(response.user.email);
                $('#editPassword').val('');  
                $('#editUserType').val(response.user.userType);

                
                const currentUserId = response.currentUser ? response.currentUser.id : null;
                const currentUserType = response.currentUser ? response.currentUser.userType : null;

                 
                if (userId === currentUserId) {
                    
                    $('#editName').parent().show();
                    $('#editEmail').parent().show();
                    $('#editPassword').parent().show();
                } else {
                    
                    $('#editName').parent().hide();
                    $('#editEmail').parent().hide();
                    $('#editPassword').parent().hide();
                }
                $('#editUserModal').css('display', 'flex').hide().fadeIn(300);
            }
        },
        error: function(xhr) {
            $('#loader').fadeOut(300);
            console.error(xhr);
            alert('Failed to retrieve user data.');
        }
    });
});

$('#close').on('click', function() {
        $('#editUserModal').fadeOut(300);
});

//to edit user  
$(document).on('click', '#submitEdit', function() {
    const userId = $('#edituserid').val();  

    let name = $('#editName').val();
    let email = $('#editEmail').val();
    let password = $('#editPassword').val();
    let userType = $('#editUserType').val();

    $('#loader').fadeIn(300);

    $.ajax({
        url: `/users/${userId}/edit`,  
        method: 'POST',
        data: {
            name: name,
            email: email,
            password: password,
            userType: userType,
            _token: '{{ csrf_token() }}' 
        },
        success: function(response) {
            $('#loader').fadeOut(300);
            const userRow = $(`tr:has(button[data-user-id="${userId}"])`);
            userRow.find('td:nth-child(3)').text(name);  
            userRow.find('td:nth-child(4)').text(email);
            userRow.find('td:nth-child(5)').text(userType); 

            $('#editUserModal').fadeOut(300);
            $('#close').click();  
            Swal.fire(
                'Success!',
                'User updated successfully.',
                'success'
            );
        },
        error: function(xhr) {
            $('#loader').fadeOut(300);
            alert('Error updating user: ' + xhr.responseJSON.message);
        }
    });
});

//to del user
$(document).on('click', '.deluser', function() {
    const userId = $(this).data('user-id');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const row = $(this).closest('tr');  

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#loader').fadeIn(300);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: '/delete-user',
                type: 'POST',
                data: { user_id: userId },
                dataType: 'json',
                success: function(response) {
                    $('#loader').fadeOut(300);
                    if (response.success) {
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
                        'An error occurred while deleting the user.',
                        'error'
                    );
                }
            });
        }
    });
});
       </script>
  </body>
</html>
