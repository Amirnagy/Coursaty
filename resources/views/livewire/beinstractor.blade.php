<div>

    <section class="form-container">

    <form  enctype="multipart/form-data" wire:submit.prevent='updateprofile'>
        <h3>update profile</h3>
            <p>update name</p>
            <input type="text" name="name"  placeholder="{{$user->name}}" maxlength="50" class="box"  wire:model.lazy="name">
            @error('name')
                    <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>update email</p>
            <input type="email" name="email" placeholder="{{$user->email}}" maxlength="50" class="box" wire:model.lazy="email">
            @error('email')
                    <label class="text-danger">{{ $message }}</label>
            @enderror

            <p>update picture</p>
            @error('photo') <span class="error">{{ $message }}</span> @enderror


            <button type="submit" class="btn"> update </button>

        </form>

    </section>
</div>



