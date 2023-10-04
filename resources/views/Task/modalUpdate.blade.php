<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" action="{{ route('api-task-update') }}" method="post" enctype="multipart/form-data" id="login_form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="update_id_task" name="id_task">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" readonly class="form-control" name="email" id="update_email">
                        <input type="hidden" name="id_user" id="update_id_user">
                    </div>
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input type="task" class="form-control" name="task" id="update_task" placeholder="Enter Your Task">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="update_description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="id_category" id="update_id_category" class="form-control">
                            @foreach($category as $ctg)
                            <option value="{{ $ctg->id_category }}">{{ $ctg->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Status</label>
                        <select name="status" id="update_status" class="form-control">
                            <option value="hold">Hold</option>
                            <option value="progress">Progress</option>
                            <option value="done">Done</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>