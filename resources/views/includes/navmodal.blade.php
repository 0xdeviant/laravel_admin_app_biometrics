
<!-- Modal Login -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login as Administrator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="/login" method="POST">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="oldpassword">Username</label>
                <input required placeholder="Enter username" class="form-control" id="username" type="text" name="username">
            </div>
            <div class="form-group">
                <label for="newpassword">Password</label>
                <input required placeholder="Enter password" class="form-control" id="password" type="password" name="password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
    </div>
</div>
</div>
