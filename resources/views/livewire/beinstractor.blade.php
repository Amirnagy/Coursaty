<div>

    <section class="form-container">


        <form enctype="multipart/form-data" wire:submit.prevent='beInstractor'>
            <h3>be Instractor</h3>

            @error('occupation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>Job Title : </p>
            <input type="text" id="occupation" name="occupation" required maxlength="50" class="box" wire:model.lazy="occupation">

            @error('education')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>Educational Background:</p>
            <textarea id="education" name="education" required class="box" wire:model.lazy="education"> </textarea>

            @error('certifications')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>Relevant Certifications or Licenses:</p>
            <textarea id="certifications" name="certifications" class="box" wire:model.lazy="certifications"></textarea>

            @error('experience')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>Teaching Experience:</p>
            <textarea id="experience" name="experience" class="box" wire:model.lazy="experience"></textarea>

            @error('skills')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>Skills and Areas of Expertise:</p>
            <textarea id="skills" name="skills" required class="box" wire:model.lazy="skills"></textarea>
            <p style="display: {{$success}};">update success</p>
            <button type="submit" class="btn"> update </button>

        </form>

    </section>
</div>
