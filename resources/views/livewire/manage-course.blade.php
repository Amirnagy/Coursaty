<div>
    <a href="uploadCourse" class="btn" ><i class="material-icons" >&#xE147;</i> <span>Add Course</span></a>

@if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
@endif
@if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
@endif

@if ($updatecourses)
<section class="form-container">


    <form enctype="multipart/form-data" wire:submit.prevent='uploadeCourse({{$idcourse}})'>
        <h3>upload Course </h3>

        <p >Description:</p>

        <input type="text" id="descrption" name="descrption" class="box" wire:model.lazy="descrption" placeholder="{{$descrption}}">


        <p>name:</p>
        <input type="text" id="name" name="name" class="box" wire:model.lazy="name" placeholder="{{$name}}" >

        <p >image:</p>
        <img src="{{$images}}" alt="">
        <input type="file" id="image" name="images" class="box" wire:model.lazy="images" >
        <div wire:loading wire:target="photo">Uploading...</div>


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
@else
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Course </b></h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Course</th>
						<th>descrption</th>
						<th>Image</th>
						<th>View play list</th>
						<td> <a href=""> Action</a> </td>
					</tr>
				</thead>


				<tbody>
                    @foreach ($courses as $course )
					<tr>
						<td>{{$loop->index}}</td>
						<td>{{$course->name}}</td>
						<td>{{$course->descrption}}</td>
						<td><img src="https://courasty.s3.us-west-1.amazonaws.com/{{$course->image}}" alt="" width="110px" height="100px"></td>
                        <td> <a href="manageVideos/{{$course->id}}"> View play list</a> </td>


						<td>
							<a wire:click.prevent="updateCourse({{$course->id}})" href="#"> <i class="material-icons" title="Edit">&#xE254;</i></a>
							<a wire:click.prevent="deleteCourse({{$course->id}})" href="#" > <i class="material-icons"  title="Delete">&#xE872;</i></a>
						</td>

                    @endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
@endif

</div>
