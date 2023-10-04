@extends('Layout')
@section('main')
<div class="row mt-5">
    <div class="col-md-6 mb-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Create New Task</button>
    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-12 text-center">
        <label>Filter Status</label>
        <div>
            <label class="checkbox-inline">
                <input type="checkbox" name="FilterStatus" value="hold" onclick="refreshFilter()"> Hold
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="FilterStatus" value="progress" onclick="refreshFilter()"> Progress
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="FilterStatus" value="done" onclick="refreshFilter()"> Done
            </label>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <table id="datatable" class="table table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@include('Task.modalCreate')
@include('Task.modalDetail')
@include('Task.modalUpdate')
@endsection

@section('script')
<script>
    $(document).ready(function() {
        loadDatatable();
    });

    function loadDatatable() {
        $('#datatable').DataTable({
            "scrollX": true,
            "columnDefs": [{
                    "orderable": false,
                    "targets": 0,
                    "width": "20%"
                },
                {
                    "orderable": false,
                    "targets": 1,
                    "width": "20%"
                },
                {
                    "orderable": false,
                    "targets": 2,
                    "width": "5%"
                },
                {
                    "orderable": false,
                    "targets": 3,
                    "width": "5%"
                },
                {
                    "orderable": false,
                    "targets": 4,
                    "width": "10%"
                },
                {
                    "orderable": false,
                    "targets": 4,
                    "width": "10%"
                },
                {
                    "orderable": false,
                    "targets": 5,
                    "width": "20%"
                },
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{route('api-task-summary')}}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "id_user": "{{ Session('id_user') }}",
                    "role": "{{ Session('role') }}",
                    "FilterStatus" : getCheckedFilter()
                },
                "error": function() {
                    $("#data_userError").append('<tbody><tr class="text-center"><td colspan="3">No data found in the server</td></tr></tbody>');
                    $("#data_userError").css("display", "none")
                },
            },
            "columns": [{
                    "data": "task"
                },
                {
                    "data": "description"
                },
                {
                    "data": "category"
                },
                {
                    "data": "status"
                },
                {
                    "data": "created_by"
                },
                {
                    "data": "updated_at"
                },
                {
                    "data": "action"
                }
            ]
        });
    }

    function refreshFilter() {
        $('#datatable').DataTable().clear().destroy();
        loadDatatable();
    }

    function getCheckedFilter(name) {
        var selected = [];
        $('input[name=FilterStatus]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('value'));
            }
        });

        return selected;
    }

    function viewDetail(id_task) {
        $.ajax({
            url: "{{ route('api-task-detail') }}",
            method: "POST",
            data: {
                id_task: id_task,
                _token: "{{csrf_token()}}",
            },
            success: function(response) {
                if (response.error == false) {
                    $('#detail_email').val(response.data[0].email)
                    $('#detail_task').val(response.data[0].task)
                    $('#detail_description').val(response.data[0].description)
                    $('#detail_id_category').val(response.data[0].category)
                    $('#detail_status').val(response.data[0].status)

                    $('#modalDetail').modal({
                        show: true
                    });

                } else {

                }
            },
            error: function() {

            }
        });
    }

    function viewUpdate(id_task) {
        $.ajax({
            url: "{{ route('api-task-detail') }}",
            method: "POST",
            data: {
                id_task: id_task,
                _token: "{{csrf_token()}}",
            },
            success: function(response) {
                if (response.error == false) {
                    console.log(response);
                    $('#update_id_task').val(response.data[0].id_task)
                    $('#update_id_user').val(response.data[0].id_user)
                    $('#update_email').val(response.data[0].email)
                    $('#update_task').val(response.data[0].task)
                    $('#update_description').val(response.data[0].description)
                    $('#update_id_category').val(response.data[0].id_category)
                    $('#update_status').val(response.data[0].status)

                    $('#modalUpdate').modal({
                        show: true
                    });

                } else {

                }
            },
            error: function() {

            }
        });
    }

    function viewDelete(id_task) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('api-task-delete') }}",
                    method: "POST",
                    data: {
                        id_task: id_task,
                        _token: "{{csrf_token()}}",
                    },
                    success: function(response) {
                        if (response.error != true) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            $('#datatable').DataTable().ajax.reload();
                        }
                    },
                    error: function() {

                    }
                });

            }
        })
    }
</script>
@endsection