<!-- Delete Modal -->
<div class="modal fade" id="employeeDelete" tabindex="-1" role="dialog" aria-labelledby="employeeDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h5 class="modal-title" id="employeeDeleteLabel">Delete employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('employees.destroy', $employees->EmpId)}}" method="POST">
                @csrf
                @method('delete')
              Are you sure you want to delete <b>{{$employees->first_name.' '.$employees->last_name}}</b>  ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End delete Modal-->

    <!-- Edit Modal -->
    <div class="modal fade" id="employeesEdit" tabindex="-1" role="dialog" aria-labelledby="employeesEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="employeesEditLabel">Edit employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employees.update', $employees->EmpId)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('Put')
                    <div class="form-group">
                        <label for="employeeName">Employee's First Name</label>
                        <input type="text" class="form-control" id="employeeName"  name="firstname" value="{{$employees->first_name}}">
                    </div>
                    <div class="form-group">
                            <label for="employeeName">Employee's Last Name</label>
                            <input type="text" class="form-control" id="employeeName"  name="lastname" value="{{$employees->last_name}}">
                    </div>
                    <div class="form-group">
                            <label for="employeeName">Employee's Company</label>
                            <select name="company" id="company" class="form-control">
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" {{$company->id == $employees->ComId?"selected":""}}>{{$company->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="employeesEmail">Employee's Email</label>
                        <input type="email" class="form-control" id="employeesEmail" name="email" value="{{$employees->EmpEmail}}">
                    </div>
                    <div class="form-group">
                            <label for="EmployeePhone">Employee's Phone Number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+63</span>
                                </div>
                            <input type="text" class="form-control" id="EmployeePhone" name="phone" value="{{$employees->PhoneNumber}}" placeholder="9xxxxxxxxx" maxlength="10" onkeypress="return isNumber(event)">
                        </div>
                    </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End edit Modal-->
