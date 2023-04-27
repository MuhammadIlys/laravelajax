<div class="modal fade" id="delete_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <ul id="errlist"></ul>

          <form>
            <h4>Are you sure you want to delete this student?</h4>
            <div class="form-group">
             
              <input type="hidden" class="form-control" id="std_id" name="name" >
              
            </div>
            
            
            {{-- <button type="submit" class="btn btn-primary float-right">Submit</button> --}}
          </form>



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary delete_student_btn">Yes Delete</button>
        </div>
      </div>
    </div>
  </div>