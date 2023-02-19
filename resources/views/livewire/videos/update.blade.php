<div>
    <div class="card">
        <div class="card-body">

            <form enctype="multipart/form-data" >
                <h3>upload Video </h3>

                <p >Description:</p>

                <input type="text" id="descrption" name="descrption" class="box" wire:model.lazy="descrption">


                <p >Video:</p>
                <input type="file" id="video" wire:model.lazy="video">
                @error('video') <span class="error">{{ $message }}</span> @enderror


                <div class="d-grid gap-2">
                    <button wire:click.prevent="updateVideo()" class="btn btn-success btn-block">Update</button>
                    <button wire:click.prevent="cancelVideo()" class="btn btn-secondary btn-block">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>
