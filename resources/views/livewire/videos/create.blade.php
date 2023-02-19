<div>
    <section class="form-container">
        <div class="card">
            <div class="card-body">

                <form enctype="multipart/form-data" >
                    <h3>upload Video </h3>

                    <p >Description:</p>
                @error('descrption') <span class="error">{{ $message }}</span> @enderror
                    <input type="text" id="descrption" name="descrption" class="box" wire:model.lazy="descrption">

                    <p >Video:</p>
                @error('video') <span class="error">{{ $message }}</span> @enderror <br>
                    <input type="file" id="video" wire:model.lazy="video">


                    <div class="d-grid gap-2">
                        <button wire:click.prevent="storeVideo()" class="btn btn-success btn-block">Save</button>
                        <button wire:click.prevent="cancelVideo()" class="btn btn-secondary btn-block">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
