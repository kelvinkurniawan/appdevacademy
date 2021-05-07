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
                    <div class="form-group">
                        <label>Room name</label>
                        <input type="text" wire:model="name" class="form-control" placeholder="My Private Room">
                    </div>
                    <div class="form-group">
                        <label>Room Description</label>
                        <textarea wire:model="description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Create Room</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        window.livewire.on('roomStore', () => {
            $('#createNew').modal('hide');
        });
    </script>
@endpush
