<!--New company Modal -->
<div class="modal fade" id="companyNew" tabindex="-1" role="dialog" aria-labelledby="companyNewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="companyNewLabel">Create Company</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="CompanyName">Company name</label>
                        <input type="text" class="form-control" id="CompanyName"  name="name" placeholder="Sample .Inc">
                    </div>
                    <div class="form-group">
                        <label for="CompanyEmail">Company Email</label>
                        <input type="email" class="form-control" id="CompanyEmail" name="email" placeholder="Sample@company.com">
                    </div>
                    <div class="form-group">
                        <label for="CompanyWebsite">Company Website</label>
                        <input type="text" class="form-control" id="CompanyWebsite" name="website" placeholder="CompanyWeb.com">
                    </div>
                    <div class="form-group">
                    <div class="box">
                            <input type="file" name="logo" id="logo" class="inputfile" accept="image/*" />
                            <label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Upload Logo&hellip;</span></label>
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
      <!-- End New Company Modal-->
