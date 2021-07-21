<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0">Room List</h3>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" data-sort="name">Room name</th>
                    <th data-sort="budget" width="30%">Room description</th>
                    <th data-sort="budget" width="30%">Room code</th>
                    <th scope="col" data-sort="status">Author</th>
                    <th scope="col">Users</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($data as $row)
                <tr>
                    <th scope="row">
                        {{ $row->name }}
                    </th>
                    <td>
                        {{ \Illuminate\Support\Str::limit($row->description, 20, $end='...') }}
                    </td>
                    <td>
                        {{ $row->room_code }}
                    </td>
                    <td>
                        {{ \Illuminate\Support\Str::limit($row->user->name, 20, $end='...') }}
                    </td>
                    <td>
                        <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                            </a>
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                            </a>
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                            </a>
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown show">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                style="position: absolute; transform: translate3d(-160px, 31px, 0px); top: 0px; left: 0px; will-change: transform;"
                                x-placement="bottom-end">
                                <a class="dropdown-item" href="{{ route('admin.room.manage.detail', $row->id) }}">Open Room</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update" wire:click.prevent="edit({{ $row->id }})" data-keyboard="false">Edit</a>
                                <a class="dropdown-item" href="#" wire:click.prevent="delete({{ $row->id }})">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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

    if($updateMode){
        @include('livewire.rooms.update')
    }else{
        @include('livewire.rooms.create')
    }
</div>
