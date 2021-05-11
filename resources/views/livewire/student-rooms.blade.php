<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0">Joined Room</h3>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" data-sort="name">Room name</th>
                    <th data-sort="budget" width="30%">Room description</th>
                    <th scope="col">Activity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($data->userRomes as $row)
                <tr>
                    <th scope="row">
                        {{ $row->room->name }}
                    </th>
                    <td>
                        {{ \Illuminate\Support\Str::limit($row->room->description, 20, $end='...') }}
                    </td>
                    <td>
                        {{ $row->room->room_code }}
                    </td>
                    <td>
                        <div class="dropdown show">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                style="position: absolute; transform: translate3d(-160px, 31px, 0px); top: 0px; left: 0px; will-change: transform;"
                                x-placement="bottom-end">
                                <a class="dropdown-item" href="#">Open Room</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update"
                                    wire:click.prevent="edit({{ $data->id }})" data-keyboard="false">Leave</a>
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

    @include('livewire.student-room.join-room')
</div>
