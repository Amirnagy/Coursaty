<div>

    <section class="form-container">


        <form enctype="multipart/form-data" wire:submit.prevent='uploadeCourse'>
                <h3>upload Course </h3>

            {{-- @error('occupation')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            <p >Description:</p>

            <input type="text" id="description" name="description" class="box" wire:model.lazy="description" >


            <p>name:</p>
            <input type="text" id="name" name="name" class="box" wire:model.lazy="name" >

            {{-- @error('education')
            <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            <p >image:</p>
            <input type="file" id="image" name="images" class="box" wire:model.lazy="images">

            {{-- @error('certifications')
            <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            <p >priority:</p>
            <input type="date" id="priority_date" name="priority_date" class="box"  wire:model.lazy="priority_date">

            <p >select category of course</p>
            <select name="categoryCourse" wire:model.lazy="categoryCourse" class="box" >
            @foreach ($category as $cat )
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select>

            <p style="display: {{$success}};">update success</p>
            <button type="submit" class="btn"> update </button>
        </form>

    </section>
</div>
