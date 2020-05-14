@extends('layouts.master')
@section('dashboard-active','active')

@section('content')
	<!-- Main Content -->
	<div id="main-content" class="container-fluid">
		<div class="row top-60px">
			<div class="col-md-8">
				
			</div>

			<div class="col-md-4 text-right">
				<button type="button" class="btn add-userbtn" data-toggle="modal" data-target="#addExpense">Add Expense</button>
			</div>
		</div>

		<div class="row top-10px">
			<div class="col-md-12">
				<table class="table">
				  <thead class="text-center">
				    <tr>
				      <th scope="col">Expense Category</th>
				      <th scope="col">Amount</th>
                      <th scope="col">Entry Date</th>
                      <th scope="col">Created at</th>
				      <th scope="col" style="border-right-color: #3567fd !important">Action</th>
				    </tr>
				  </thead>

				  <tbody class="text-center">
					@foreach ($expenses as $expense)
				    <tr>
				      <th scope="row">{{ $expense->category->category_name }}</th>
					  <td>{{ $expense->amount }}</td>
                      <td>{{ $expense->entry_date }}</td>
                      <td>{{ $expense->created_at->format('Y/m/d') }}</td>
				      <td>
						  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#udpdateExpense" 
							onclick='attachListenerEditExpense({{ $expense->toJson() }});'></i></a>
						   <a href="" data-toggle="modal" data-target="#deleteModal-doctorsTable"><i class="fa fa-trash-o" aria-hidden="true"
							onclick='attachListenerDeleteExpense({{ $expense->toJson() }});'></i></a>
				      </td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{{ $expenses->render() }}
			</div>
		</div>
	</div>
	

	<!-- Add user role Modal-->
	<div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Expense Category:</p>
	        	</div>

	        	<div class="col-md-8">
                    <select id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
	        	</div>
	        </div>

	        <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Amount:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="number" class="form-control" name="" id="amount">
	        	</div>
            </div>
            
            <div class="row top-10px">
	        	<div class="col-md-4">
	        		<p>Entry Date:</p>
	        	</div>

	        	<div class="col-md-8">
	        		<input type="date" class="form-control" name="" id="entryDate">
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id="addExpenseBtn">Confirm</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- update user role Modal-->
	<div class="modal fade" id="udpdateExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Expense Category:</p>
                  </div>
                  <input type="hidden" class="form-control" name="" id="expenseId">
			      <input type="hidden" name="_method" value="PUT" id="_method">
                  <div class="col-md-8">
                      <select id="editCategory" class="form-control">
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
  
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Amount:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="" id="editAmount">
                  </div>
              </div>
              
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Entry Date:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="date" class="form-control" name="" id="editEntryDate">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="updateExpenseBtn">Confirm</button>
            </div>
          </div>
        </div>
      </div>

	<div class="modal fade" id="deleteModal-doctorsTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete Expense</h5>
		      </div>

	      	<div class="modal-body text-center">
		        <p>Are you sure you want to delete?</p>

		        <div class="row">
		        	<!-- SELECTED DOCTOR -->
		        	<div class="col-md-12 text-center">
		        	</div>
		        </div>
				<input type="hidden" class="form-control" name="" id="delExpenseId">
		        <div class="row top-20px">
		        	<div class="col-md-12 text-center">
		        		<button type="button" class="btn btn-yesModal" id="deleteExpenseBtn">Yes</button>
		        		<button type="button" class="btn btn-closeModal" data-dismiss="modal">No</button>
		        	</div>
		        </div>
	      	</div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript" src="{{ asset('js/custom-js/expense/expense.js') }} "></script>
@stop