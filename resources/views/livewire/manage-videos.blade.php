<div>

    <div class="col-md-8 mb-2">
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


        @if($showAdd)
            @include('livewire.videos.create')
        @endif
        @if($showUpdate)
            @include('livewire.videos.update')
        @endif

    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if(!$showAdd)
                <button wire:click="addVideo()" class="btn btn-primary btn-sm float-right">Add New Video</button>
                @endif
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
                                <th>{{$loop->index}}</th>
                                <th>{{$V->descrption}}</th>
                                <th>
                                    <video width="340" height="160" controls>
                                    <source src="https://courasty.s3.us-west-1.amazonaws.com/{{$V->video}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                    </video>
                                </th>
                                <th>
                                    <a wire:click.prevent="editVideo({{$V->id}})" href="#"> <i class="material-icons" title="Edit">&#xE254;</i></a>
                                </th>
                                <td>
                                    <a wire:click.prevent="deleteVideo({{$V->id}})" href="#" > <i class="material-icons"  title="Delete">&#xE872;</i></a>
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
</div>

