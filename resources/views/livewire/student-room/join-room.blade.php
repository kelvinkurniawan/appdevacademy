<div wire:ignore.self class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group text-center">
                        <label class="text-center">Room Code</label>
                        <input type="text" wire:model="room_code" class="form-control text-center" placeholder="XadAlP">
                    </div>
                </form>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Join Room</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        window.livewire.on('joined_room', () => {
            $('#createNew').modal('hide');
        });
    </script>
@endpush
