@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Project</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Project</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($data->name, 10, '...') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" data-toggle="modal" data-target="#createNew" class="btn btn-sm btn-neutral">Leave</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Page Content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="row">
                <div class="col-md-12 px-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text">{{ $message }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <div class="list-group">
                @foreach ($data->tasks as $row)
                <a href="#"
                data-id="{{ $row->id }}"
                data-title="{{ $row->task }}"
                data-description="{{ $row->description }}"
                data-toggle="modal"
                data-target="#updateStatusModal"
                class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $row->task }}</h5>
                        <small>Current update {{ \Carbon\Carbon::parse($row->updated_at)->format('D m/d/Y') }}</small>
                    </div>
                    <div class="text-xs">{{ $row->description }}</div>
                    <small>
                        @switch($row->current_status)
                        @case(0)
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <strong class="text-warning">In Queue</strong>
                        @break
                        @case(1)
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 50%;"></div>
                        </div>
                        <strong class="text-info">In Proccess</strong>
                        @break
                        @case(2)
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;"></div>
                        </div>
                        <strong class="text-success">Finished</strong>
                        @break
                        @default
                        <strong class="text-danger">Status Not Found</strong>
                        @endswitch
                    </small>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <h5 class="card-title">Add Task</h5>
                        <p class="card-text">
                            <input type="hidden" name="project_id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label class="text-xs">Task Name</label>
                                <input type="text" class="form-control" name="task" id="task" placeholder="create something">
                            </div>
                            <div class="form-group">
                                <label class="text-xs">Task Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </p>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
<div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('task.setstatus') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="display-task-id" name="task_id">
                    <div class="d-flex w-100 justify-content-between mb-4">
                        <small><strong>Task name</strong></small>
                        <small id="display-task-name"></small>
                    </div>
                    <div class="d-flex w-100 justify-content-between mb-4">
                        <small class="w-50"><strong>Task Description</strong></small>
                        <small id="display-task-desc" class="text-right"></small>
                    </div>
                    <div class="d-flex w-100 justify-content-between align-items-center mb-4">
                        <small class="w-50"><strong>Update Status</strong></small>
                        <select class="form-control" name="status">
                            <option value="0">In Queue</option>
                            <option value="1">In Process</option>
                            <option value="2">Finished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>

    $('#updateStatusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var title = button.data('title') // Extract info from data-* attributes
        var desc = button.data('description') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#display-task-id').val(id);
        modal.find('#display-task-name').text(title);
        modal.find('#display-task-desc').text(desc);
    })
</script>

@endpush
