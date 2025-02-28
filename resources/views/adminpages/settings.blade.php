<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsettingsbtn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsettingsbtn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addsettings {
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


.custom-modal1.etstgssettings {
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
                        {{--<button class="addsettingsbtn">Add Row</button>--}}
                      <h4 class="card-title">Messages</h4>
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
                            <th style="white-space: nowrap;">About Us Image</th>
                            <th style="white-space: nowrap;">About Paragraph</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th style="width:10%">Action</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($settings as $setting)
                            <tr id="setting-{{ $setting->id }}">
                                    <td>{{$counter}}</td>
                                    <td id="imageee">
                                        <img height="100px" width="100%" src="{{ asset('images/' . $setting->image_1) }}" />
                                    </td>
                                    <td id="aboutparagrap">{{$setting->about_paragraph}}</td>
                                    <td id="nameee">{{$setting->name}}</td>
                                    <td id="emailll">{{$setting->email}}</td>
                                    <td id="addreeesss">{{$setting->address}}</td>
                                    <td id="phoneee">{{$setting->phone}}</td>

                                    <td>
                                        <a id="opneditseettingsbtn" data-setting-id="{{ $setting->id }}" class="btn btn-link btn-primary btn-lg edit-product-btn">
                                          <i class="fas fa-edit"></i>
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

      
   <!-- Add settings Modal -->
   <div style="display:none" class="custom-modal addsettings" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add Settings</h2>
                <button type="button" class="close closeModal"   style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="settingsform">
                <input type="hidden" id="settingsforminput" value=""/>
                <div class="row mt-5">
                <div class="col-6  ">
                    <div class="form-group">
                        <label for="productImage">Image</label>
                        <input type="file" id="aboutimage" name="image_1" class="form-control" accept="image/*"  >
                    </div>
                </div>

                
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"  >
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="productPrice" name="email" class="form-control"  >
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" />
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" />
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="about_paragraph">About Paragraph</label>
                            <input id="aboutparagraph" name="about_paragraph" class="form-control" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="addsettingsForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal" >Close</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--edit model -->
<div style="display:none" class="custom-modal1 etstgssettings" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit settings</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">&times;</button>
            </div>

            <form id="settingsformm" enctype="multipart/form-data">
            
                <input type="hidden" id="settingsforminput" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aboutimage1">Image</label>
                            <input type="file" id="aboutimage1" name="image_1" class="form-control" accept="image/*">
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name1">Name</label>
                            <input type="text" id="name1" name="name" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="productPrice1">Email</label>
                            <input type="email" id="productPrice1" name="email" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address1">Address</label>
                            <input type="text" id="address1" name="address" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone1">Phone</label>
                            <input type="text" id="phone1" name="phone" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aboutparagraph1">About Paragraph</label>
                            <input id="aboutparagraph1" name="about_paragraph" class="form-control">
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button class="btn btn-primary stngseditbtn" style="margin-right: 10px;">Submit</button>
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
    $(document).ready(function() {
        
    
    $('.addsettingsbtn').click(function() {
        $('.custom-modal.addsettings').fadeIn();  
    });

    
    $('.closeModal').click(function() {
        $('.custom-modal.addsettings').fadeOut(); 
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addsettingsbtn')) {
            $('.custom-modal.addsettings').fadeOut(); 
        }
    });
});

//to add settings
$(document).ready(function () {
$('#settingsform').on('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $('#loader').fadeIn(300);
    $.ajax({
        url: "{{ route('settings.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').fadeOut(300);
if (response.success) {
    Swal.fire({
        icon: 'success',
        title: 'Settings Saved!',
        text: response.message || 'The settings were saved successfully.',
        confirmButtonText: 'Ok'
    }).then(() => {
         $('#settingsform')[0].reset();
        $('.custom-modal.addsettings').fadeOut();

         const setting = response.setting;

         const newRow = `
            <tr data-setting-id="${setting.id}">
                <td>${$('.table tbody tr').length + 1}</td> <!-- Counter for the new row -->
                <td><img height="100px" width="100%" src="{{ asset('images/') }}/${setting.image_1}" /></td>
                <td>${setting.about_paragraph}</td>
                <td>${setting.name}</td>
                <td>${setting.email}</td>
                <td>${setting.address}</td>
                <td>${setting.phone}</td>
                <td>
                    <a id="editsettings" data-setting-id="${setting.id}" class="btn btn-link btn-primary btn-lg edit-product-btn">
                      <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        `;

         $('table tbody').append(newRow);
    });
}
},


        error: function (xhr) {
            $('#loader').fadeOut(300);
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

 $('.closeModal').on('click', function () {
    $('.custom-modal.addsettings').fadeOut();
});
});

$(document).ready(function() {
 $('#opneditseettingsbtn').on('click', function() {
    var settingId = $(this).data('setting-id');
    
    $('#loader').fadeIn(300);
    $.ajax({
        url: '/get-setting/' + settingId,  
        method: 'GET',
        success: function(response) {
            $('#loader').fadeOut(300);
           

             $('#settingsforminput').val(response.id);
            $('#name1').val(response.name);
            $('#productPrice1').val(response.email);
            $('#address1').val(response.address);
            $('#phone1').val(response.phone);
            $('#aboutparagraph1').val(response.about_paragraph);

             $('.custom-modal1').attr('aria-hidden', 'false').show();
        },
        error: function() {
            $('#loader').fadeOut(300);
            alert('Error fetching settings data');
        }
    });
});

 $('.closeModal').on('click', function() {
    $('.custom-modal1').attr('aria-hidden', 'true').hide();
});
});
$('#settingsformm').on('submit', function (e) {
e.preventDefault();

const settingId = $('#settingsforminput').val(); 
const formData = new FormData(this);
$('#loader').fadeIn(300);
$.ajax({
    url: `/update-setting/${settingId}`,
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        $('#loader').fadeOut(300);
        const setting = response.setting;

         const row = $(`#setting-${setting.id}`);
        
        row.find('#imageee img').attr('src', `/images/${setting.image_1}`);
        row.find('#aboutparagrap').text(setting.about_paragraph);
        row.find('#nameee').text(setting.name);
        row.find('#emailll').text(setting.email);
        row.find('#addreeesss').text(setting.address);
        row.find('#phoneee').text(setting.phone);

        Swal.fire({
            icon: 'success',
            title: 'Updated!',
            text: response.message,
            confirmButtonText: 'OK',
        }).then(() => {
            $('.custom-modal1').hide();   
        });
    },
    error: function (xhr) {
        $('#loader').fadeOut(300);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error updating setting: ' + xhr.responseJSON.message,
            confirmButtonText: 'OK',
        });
    }
});
});

   </script>
</body>
</html>