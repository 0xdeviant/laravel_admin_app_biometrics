
<!-- Modal Login -->
<div class="modal fade" id="addperson" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add new person</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/people" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="oldpassword">First Name</label>
                    <input required placeholder="Enter first name" class="form-control" id="fname" type="text" name="fname">
                </div>
                <div class="form-group">
                    <label for="newpassword">Last Name</label>
                    <input required placeholder="Enter last name" class="form-control" id="lname" type="text" name="lname">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    