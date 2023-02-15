<x-app-layout>

    <section class="user-profile">

        <h1 class="heading">your profile</h1>

        <div class="info">

            <div class="user">
                <img src = '{{ asset("avatar/".Auth::user()->profile_photo_path)}}'  class="image" alt="">
                <h3>{{Auth::user()->name}}</h3>
                @if (Auth::user()->roles == 1 )
                <p>Instractor</p>
                @else
                <p>Students</p>
                @endif
                <a href={{ url('viewUpdateProfile') }} class="inline-btn">update profile</a>
                @if (Auth::user()->roles == 1)
                <a href={{ url('beInstractor') }} class="inline-btn">update CV</a>
                <a href={{ url('downloadcv') }} class="inline-btn">download CV</a>
                <a href={{ url('uploadCourse') }} class="inline-btn">upload Course</a>
                <a href={{ url('addVideos') }} class="inline-btn">Manage Courses</a>
                @endif
            </div>

            <div class="box-container">


                <div class="box">
                    <div class="flex">
                        <i class="fas fa-bookmark"></i>
                        <div>
                            <span>4</span>
                            <p>saved playlist</p>
                        </div>
                    </div>
                    <a href="#" class="inline-btn">view playlists</a>
                </div>

                <div class="box">
                    <div class="flex">
                        <i class="fas fa-heart"></i>
                        <div>
                            <span>33</span>
                            <p>videos liked</p>
                        </div>
                    </div>
                    <a href="#" class="inline-btn">view liked</a>
                </div>

                <div class="box">
                    <div class="flex">
                        <i class="fas fa-comment"></i>
                        <div>
                            <span>12</span>
                            <p>videos comments</p>
                        </div>
                    </div>
                    <a href="#" class="inline-btn">view comments</a>
                </div>

            </div>
        </div>



    </section>

</x-app-layout>
