<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" id="detail_email" readonly>
                </div>
                <div class="form-group">
                    <label for="task">Task</label>
                    <input type="task" class="form-control" name="task" id="detail_task" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="detail_description" cols="30" rows="10" readonly></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input name="id_category" id="detail_id_category" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="category">Status</label>
                    <input name="status" id="detail_status" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>