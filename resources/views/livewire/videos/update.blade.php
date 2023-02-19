<div>
    <section class="form-container">
        <div class="card">
            <div class="card-body">

                <form enctype="multipart/form-data" >
                    <h3>upload Video </h3>

                    <p >Description:</p>
                @error('descrption') <span class="error">{{ $message }}</span> @enderror
                    <input type="text" id="descrption" name="descrption"  value="{{$descrption}}" class="box" wire:model.lazy="descrption">

                    <p >Video:</p>
                @error('video') <span class="error">{{ $message }}</span> @enderror <br>

                <br>
                <video width="340" height="160" controls>
                    <source src="https://courasty.s3.us-west-1.amazonaws.com/{{$video}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <br>

                    <input type="file" id="video" wire:model.lazy="video">

                    <p wire:loading wire:target="video"> Uploading....</p>


                    <div class="d-grid gap-2">
                        <button wire:click.prevent="updateVideo()" class="btn btn-success btn-block">update</button>
                        <button wire:click.prevent="cancelVideo()" class="btn btn-secondary btn-block">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
