<!-- Sidebar -->
<div id="mySidebar" class="sidebar">
    <div id="sidebar-full">
        <div class="row top-40px" style="margin-bottom: 40px;">
            <div class="col-md-12 text-center">
                <h3>{{ Auth::user()->name }}<sup>{{ Auth::user()->role->role_name }} </sup></h3>
            </div>
        </div>

        <a class="@yield('dashboard-active')" href="{{ url('dashboard') }}">Dashboard</a>

            <div class="dropdown">
                @if(Auth::user()->role_id == 1)
                <a class="" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">User Management</a>
                <ul class="list-unstyled collapse" id="pageSubmenu" style="">
                    <li>
                        <a class="@yield('doctor-active')" href="{{ url('role') }}">Roles</a>
                    </li>
                    <li>
                        <a class="@yield('patient-active')" href="{{ url('user') }}">Users</a>
                    </li>
                </ul>
                @endif
            </div>

            <div class="dropdown">
                <a class="" href="#expenseManagement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Expense Management</a>

                <ul class="list-unstyled collapse" id="expenseManagement" style="">
                    @if(Auth::user()->role_id == 1)
                    <li>
                        <a class="@yield('doctor-active')" href="{{ url('expense-category') }}">Expense Categories</a>
                    </li>
                    @endif
                    <li>
                        <a class="@yield('patient-active')" href="{{ url('expense') }}">Expenses</a>
                    </li>
                </ul>
            </div>
        
        <a class="@yield('dashboard-active')" href="#" data-toggle="modal" data-target="#changePassword">Change password</a>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/custom-js/user/change-password.js') }} "></script>
	<!-- Add user role Modal-->
	<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>New password:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="password" class="form-control" name="" id="newPassword">
                  </div>
              </div>
              
              <div class="row top-10px">
                  <div class="col-md-4">
                      <p>Confirm Password:</p>
                  </div>
  
                  <div class="col-md-8">
                      <input type="hidden" name="_method" value="PUT" id="_method">
                      <input type="password" class="form-control" name="" id="confirmPassword">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="changePasswordBtn">Confirm</button>
            </div>
          </div>
        </div>
      </div>
