@extends('layouts.master')
@section('dashboard-active','active')

@section('content')
	<!-- Main Content -->
	<div id="main-content" class="container-fluid">
		<div class="row top-60px">
			<div class="col-md-8">
				
			</div>

			<div class="col-md-4 text-right">
				<button type="button" class="btn add-userbtn" data-toggle="modal" data-target="#addUserRole">Add Role</button>
			</div>
		</div>

		<div class="row top-10px">
			<div class="col-md-12">
				<table class="table">
				  <thead class="text-center">
				    <tr>
				      <th scope="col">Display name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Created_at</th>
				      <th scope="col" style="border-right-color: #3567fd !important">Action</th>
				    </tr>
				  </thead>

				  <tbody class="text-center">
					@foreach ($roles as $role)
				    <tr>
				      <th scope="row">{{ $role->role_name }}</th>
					  <td>{{ $role->role_description }}</td>
					  <td>{{ $role->created_at->format('Y/m/d') }}</td>
				      <td>
						@if(Auth::user()->role_id != $role->id )
						  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#updateUserRole" 
							onclick='attachListenerEditUserRole({{ $role->toJson() }});'></i></a>
						   <a href="" data-toggle="modal" data-target="#deleteModal-doctorsTable"><i class="fa fa-trash-o" aria-hidden="true"
							onclick='attachListenerDeleteUserRole({{ $role->toJson() }});'></i></a>
						@endif
				      </td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{{ $roles->render() }}
			</div>
		</div>
	</div>
	

	<!-- Add user role Modal-->
	<div class="modal fade" id="addUserRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Display Name:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="text" class="form-control" name="" id="displayName">
	        	</div>
	        </div>

	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Description:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="text" class="form-control" name="" id="description">
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id="addRoleBtn">Confirm</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- update user role Modal-->
	<div class="modal fade" id="updateUserRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<input type="hidden" class="form-control" name="" id="roleId">
			<input type="hidden" name="_method" value="PUT" id="_method">
			<div class="modal-body">
			  <div class="row top-10px">
				  <div class="col-md-4">
					  <p>Display Name:</p>
				  </div>
  
				  <div class="col-md-8">
					  <input type="text" class="form-control" name="" id="editDisplayName">
				  </div>
			  </div>
  
			  <div class="row top-10px">
				  <div class="col-md-4">
					  <p>Description:</p>
				  </div>
  
				  <div class="col-md-8">
					  <input type="text" class="form-control" name="" id="editDescription">
				  </div>
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-primary" id="updateUserRoleBtn">Confirm</button>
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
		        		<h4 id="roleName"></h4>
		        	</div>
		        </div>
				<input type="hidden" class="form-control" name="" id="roleId">
		        <div class="row top-20px">
		        	<div class="col-md-12 text-center">
		        		<button type="button" class="btn btn-yesModal" id="deleteUserRoleBtn">Yes</button>
		        		<button type="button" class="btn btn-closeModal" data-dismiss="modal">No</button>
		        	</div>
		        </div>
	      	</div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript" src="{{ asset('js/custom-js/role/role.js') }} "></script>
@stop