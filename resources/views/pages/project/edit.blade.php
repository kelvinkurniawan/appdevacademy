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
                            <li class="breadcrumb-item active"><a href="#">Project</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" data-toggle="modal" data-target="#createNew" class="btn btn-sm btn-neutral">Create
                        Project</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Page Content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col col-md-8">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Update Project</h3>
                </div>
                <!-- Light table -->
                <div class="row px-4">
                    <div class="col-md-12">
                        <form action={{ route('project.update', $data->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Project Name</label>
                                <input class="form-control" type="text" value="{{ $data->name }}" id="example-text-input" name="name">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="form-control-label">Project Description</label>
                                <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <small>*Your invitation code can't be updated</small>
                </div>

                @include('livewire.student-room.join-room')
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection
