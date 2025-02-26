<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>status</th>
                            <th>Delete</th>
                            <th style="white-space: nowrap;">Change Status</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($messages as $message)
                                        <tr class="user-row">
                                            <td>{{ $counter }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->phone }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td class="status">
                                                @if($message->status == 1)
                                                    <span id="new" style="background-color: red; color: white; padding: 8px 8px; border-radius: 50px; display: inline-block;">
                                                        Old
                                                    </span>
                                                @else
                                                    <span id="old" style="background-color: black; color: white; padding: 10px 6px; border-radius: 50px; display: inline-block;">
                                                        New
                                                    </span>
                                                @endif
                                            </td>
                                            
                                            
                                          <td>
                                            <a data-message-id="{{ $message->id }}" class="btn btn-link btn-danger delmsg">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            
                                          </td>


                                          <td>
                                            @if($message->status == 0)
                                            <a data-message-id="{{ $message->id }}" class="btn btn-link btn-primary btn-lg editstatus">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @else
                                            <a class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                        @endif
                                            
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

      

<div id="loader" style="display: none">
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
  </div>

    @include('adminpages.js')
    @include('adminpages.ajax')
  
  </body>
</html>
