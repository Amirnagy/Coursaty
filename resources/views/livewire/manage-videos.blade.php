<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvideo"> Add
                        New Video</button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Description</th>
                                <th>video</th>
                                <th>update</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($videosOfCourse) > 0)
                                @foreach ($videosOfCourse as $V)
                                    <tr>
                                        <th>{{ $loop->index+1 }}</th>
                                        <th>{{ $V->descrption }}</th>
                                        <th>
                                            <video width="340" height="160" controls>
                                                <source
                                                    src="https://courasty.s3.us-west-1.amazonaws.com/{{ $V->video }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </th>
                                        <th>
                                            <a wire:click.prevent="editVideo({{ $V->id }})" data-toggle="modal" data-target="#updatevideo" href="#"> <i
                                                    class="material-icons" title="Edit">&#xE254;</i></a>
                                        </th>
                                        <td>
                                            <a wire:click.prevent="deleteVideo({{ $V->id }})" href="#"> <i
                                                    class="material-icons" title="Delete">&#xE872;</i></a>
                                            </th>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Video Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for create video  -->
    <div wire:ignore.self  class="modal fade" id="addvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">add video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                            <div class="card-body">
                                <form enctype="multipart/form-data" wire:submit.prevevt="storeVideo">
                                    <h3>upload Video </h3>
                                    <h4 >Description:</h4>
                                    @error('descrption') <span class="error">{{ $message }}</span> @enderror

                                    <input type="text" id="descrption" name="descrption" class="box" wire:model = 'descrption'>
                                    <h4 >Video:</h4>

                                    @error('video') <span class="error">{{ $message }}</span> @enderror
                                    <br>
                                    <input type="file" id="video" wire:model = 'video'>

                                    <p wire:loading wire:target="video"> Uploading....</p>


                                    <div class="d-grid gap-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                        <button  class="btn btn-secondary" data-dismiss="modal" wire:click.="resetFields()" >Cancel</button>
                                    </div>
                                </form>
                            </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for update video  -->

    <div wire:ignore.self  class="modal fade" id="updatevideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">update video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="card-body">
                                <form enctype="multipart/form-data" wire:submit.prevevt="updateVideo">
                                    <h3>upload Video </h3>
                                    <h4 >Description:</h4>
                                    @error('descrption') <span class="error">{{ $message }}</span> @enderror
                                    <input type="text" id="descrption" name="{{$descrption}}" class="box" wire:model = 'descrption'>
                                    <h4 >Video:</h4>


                                    @if ($oldVideoPath)
                                    <video width="340" height="160" controls>
                                        <source src="{{$oldVideoPath}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @endif




                                    @error('video') <span class="error">{{ $message }}</span> @enderror
                                    <br>
                                    <input type="file" id="video" wire:model = 'video'>
                                    <p wire:loading wire:target="video"> Uploading....</p>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-sm btn-primary" type="submit">update</button>
                                        <button  class="btn btn-secondary" data-dismiss="modal" wire:click.="resetFields()" >Cancel</button>
                                    </div>
                                </form>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
