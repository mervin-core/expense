@extends('layouts.master')
@section('dashboard-active','active')

@section('content')
	<!-- Main Content -->
	<div id="main-content" class="container-fluid">
		<div class="row top-60px">
			<div class="col-md-8">
				
			</div>

			<div class="col-md-4 text-right">
				<button type="button" class="btn add-userbtn" data-toggle="modal" data-target="#addUser">Add User</button>
			</div>
		</div>

		<div class="row top-10px">
			<div class="col-md-12">
				<table class="table">
				  <thead class="text-center">
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">Email Address</th>
                      <th scope="col">Role</th>
                      <th scope="col">created at</th>
				      <th scope="col" style="border-right-color: #3567fd !important">Action</th>
				    </tr>
				  </thead>

				  <tbody class="text-center">
					@foreach ($users as $user)
				    <tr>
				      <th scope="row">{{ $user->name }}</th>
					  <td>{{ $user->email }}</td>
                      <td>{{ $user->role->role_name }}</td>
                      <td>{{ $user->created_at->format('Y/m/d') }}</td>
				      <td>
						@if(Auth::user()->role_id != $user->role->id )
						  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#editUser" 
							onclick='attachListenerEditUser({{ $user->toJson() }});'></i></a>
						   <a href="" data-toggle="modal" data-target="#deleteModal-doctorsTable"><i class="fa fa-trash-o" aria-hidden="true"
							onclick='attachListenerDeleteUser({{ $user->toJson() }});'></i></a>
						@endif
				      </td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{{ $users->render() }}
			</div>
		</div>
	</div>
	

	<!-- Add user role Modal-->
	<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Name:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="text" class="form-control" name="" id="name">
	        	</div>
	        </div>

	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Email:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="email" class="form-control" name="" id="email">
	        	</div>
            </div>
            
            <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Roles:</p>
	        	</div>

	        	<div class="col-md-8">
                    <select id="role" class="form-control">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->role_name }} </option>
                        @endforeach
                    </select>
	        	</div>
            </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id="addUserBtn">Confirm</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- update user Modal-->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input type="hidden" class="form-control" name="" id="userId">
            <input type="hidden" name="_method" value="PUT" id="_method">
            <div class="modal-body">
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Name:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="" id="editName">
                  </div>
              </div>
  
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Email:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="email" class="form-control" name="" id="editEmail">
                  </div>
              </div>
              
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Roles:</p>
                  </div>
  
                  <div class="col-md-8">
                      <select id="editRole" class="form-control">
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}"> {{ $role->role_name }} </option>
                          @endforeach
                      </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="UpdateUserBtn">Confirm</button>
            </div>
          </div>
        </div>
      </div>

	<div class="modal fade" id="deleteModal-doctorsTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
		      </div>

	      	<div class="modal-body text-center">
		        <p>Are you sure you want to delete?</p>

		        <div class="row">
		        	<!-- SELECTED DOCTOR -->
		        	<div class="col-md-12 text-center">
		        		<h4 id="userName"></h4>
		        	</div>
		        </div>
				<input type="hidden" class="form-control" name="" id="userId">
		        <div class="row top-20px">
		        	<div class="col-md-12 text-center">
		        		<button type="button" class="btn btn-yesModal" id="deleteUserBtn">Yes</button>
		        		<button type="button" class="btn btn-closeModal" data-dismiss="modal">No</button>
		        	</div>
		        </div>
	      	</div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript" src="{{ asset('js/custom-js/user/user.js') }} "></script>
@stop