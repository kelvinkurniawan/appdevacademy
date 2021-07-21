<div wire:ignore.self class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input type="text" wire:model.defer="title" class="form-control" placeholder="Topic Title">
                                @error('title') <span class="error text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group" wire:ignore>
                                <trix-editor
                                    class="formatted-content"
                                    x-ref="trix"
                                    x-on:trix-change="$dispatch('input', event.target.value)"
                                    wire:model.debounce.999999ms="body">
                                </trix-editor>
                            </div>
                            @error('body') <span class="error text-xs text-danger pt--2">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Parent</label>
                                <select wire:model.defer="parent" class="form-control" id="exampleFormControlSelect1">
                                    <option value="parent">As parent</option>
                                    @foreach ($data as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Type</label>
                                <select class="form-control" wire:model.defer="type" id="select-type">
                                    <option value="">---- Select Type -----</option>
                                    <option value="1">Theory</option>
                                    <option value="2">Assignment</option>
                                    <option value="3">Announcment</option>
                                </select>
                                @error('type') <span class="error text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group" style="display: none" id="deadline">
                                <label for="exampleFormControlSelect1" class="form-control-label">Deadline</label>
                                <input wire:model.defer="deadline" class="form-control" type="datetime-local">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">More Options</h4>
                    <div class="row px-2">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model.defer="optIsReplied" wire.click.defer="enableReplied()" checked>
                                <label class="form-control-label" for="flexCheckDefault">
                                    Is Replied
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model.defer="optCodeEditor" wire.click.defer="enableCodeEditor()" checked>
                                <label class="form-control-label" for="flexCheckChecked">
                                    Enable Code Editor
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="isYoutube" id="isYoutube" wire.click.defer="enableYoutube()">
                                <label class="form-control-label" for="isYoutube">
                                    Enable Youtube Video
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group" style="display: none" id="youtube-link">
                        <label class="form-control-label">Youtube link</label>
                        <input type="text" wire:model.defer="youtubeLink" class="form-control" placeholder="https://youtu.be/saSlkMx">
                        @error('youtubeLink') <span class="error text-xs text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Create Topic</button>
            </div>
        </div>
    </div>
    <script></script>
</div>

@push('js')
<script type="text/javascript">
    window.livewire.on('roomStore', () => {
        $('#createNew').modal('hide');
    });

    $(document).ready(function() {
        $('#isYoutube').change(function() {
            if ($(this).is(':checked')) {
                $('#youtube-link').slideDown();
            }
            else {
                $('#youtube-link').slideUp();
            }
        });

        $('#select-type').change(function() {
            if ($("#select-type").val() == 2) {
                $('#deadline').slideDown();
            }else{
                $('#deadline').slideUp();
            }
        });
    });
</script>
@endpush
