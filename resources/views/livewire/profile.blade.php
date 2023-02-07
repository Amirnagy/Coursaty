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
            <p>type previous password if you will change password</p>
                <input type="password" name="old_pass" placeholder="enter your old password" maxlength="20" class="box" wire:model.lazy="old_pass">
            <p style="display: {{$error}}" >password not correct </p>
            <p style="display: {{$active}}">new password</p>
                <input type="password" name="password" placeholder="enter your old password" maxlength="20" class="box" wire:model.lazy="password" style="display: {{$active}};">
            <p style="display: {{$active}}">confirm password</p>
                <input type="password" name="password_confirmation" placeholder="confirm your new password" maxlength="20" class="box" wire:model.lazy="password_confirmation" style="display: {{$active}}">

            <p>update picture</p>
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            
                <input type="file" accept="image/*" class="box" wire:model="newPhoto" name="newPhoto">
                <div wire:loading wire:target="photo">Uploading...</div>
                <p style="display: {{$photosucess}};">upload successfully</p>
            <button type="submit" class="btn"> update </button>

        </form>

    </section>
</div>



