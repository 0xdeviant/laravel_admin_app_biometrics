
<!-- Modal Search -->
<div class="modal fade" id="searchmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Pick the desired date</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/datesearch" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="date">Date</label>
                    <input required class="form-control" id="username" type="date" name="date">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    