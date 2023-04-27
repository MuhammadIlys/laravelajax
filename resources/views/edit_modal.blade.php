<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <ul id="edit_errlist"></ul>

          <form>
            <input type="hidden" class="form-control" id="student_id" name="name" >
            <div class="form-group">
              <label for="edit_name">Name</label>
              <input type="text" class="form-control" id="edit_name" name="name" aria-describedby="name" placeholder="Enter your name">
              
            </div>
            <div class="form-group">
              <label for="edit_email">Email</label>
              <input type="email" class="form-control" id="edit_email" name="email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="edit_phone">Phone</label>
                <input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Enter your phone number">
                
              </div>
            
            {{-- <button type="submit" class="btn btn-primary float-right">Submit</button> --}}
          </form>



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary update_student">Save changes</button>
        </div>
      </div>
    </div>
  </div>