<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0">Topic List</h3>
    </div>
        @foreach ($data as $row)
        <a href={{ route('admin.topic.detail', [$roomId, $row->id]) }} class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $row->title }}</h5>
                    <small>{{ $row->created_at->diffForHumans() }} by {{ $row->user->name }}</small>

            </div>
            <small>
                {{ $row->type->name }}
                @if($row->type->name == "Assignment")
                    <strong>Will be end in {{ $row->deadline }}</strong>
                @endif
        </small>
        </a>
        @endforeach
        @include('livewire.rooms.create-new-topic')
    <!-- Card footer -->
    <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
