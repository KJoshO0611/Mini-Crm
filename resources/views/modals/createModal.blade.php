
    <!-- New employee Modal -->
     <div class="modal fade" id="employeesNew" tabindex="-1" role="dialog" aria-labelledby="employeesNewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h5 class="modal-title" id="employeesNewLabel">Create Employee</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('employees.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employeeName">Employee's First Name</label>
                            <input type="text" class="form-control" id="employeeName"  name="firstname">
                        </div>
                        <div class="form-group">
                                <label for="employeeName">Employee's Last Name</label>
                                <input type="text" class="form-control" id="employeeName"  name="lastname" >
                        </div>
                        <div class="form-group">
                                <label for="employeeName">Employee's Company</label>
                                <select name="company" id="company" class="form-control">
                                    @foreach ($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="employeesEmail">Employee's Email</label>
                            <input type="email" class="form-control" id="employeesEmail" name="email" ">
                        </div>
                        <div class="form-group">
                            <label for="EmployeePhone">Employee's Phone Number</label>
                            <input type="text" class="form-control" id="EmployeePhone" name="phone" ">
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
          <!-- End new employee Modal-->
