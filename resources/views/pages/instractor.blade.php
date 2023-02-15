<x-app-layout>

    <section class="teachers">

        <h1 class="heading">expert teachers</h1>

        <form action="" method="post" class="search-tutor">
            <input type="text" name="search_box" placeholder="search for Instractor ..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_tutor"></button>
        </form>

        <div class="box-container">

            @if (Auth::user()->roles == 0)
            <div class="box offer">
                <h3 class="title">become a Instractor</h3>
                <p class="tutor">Publish your courses and book your place among the best trainers in the world</p>
                <a href= {{url('beInstractor')}} class="inline-btn">get started</a>
            </div>
            @endif

            @foreach ($Instractorinfo as $info )

            <div class="box">
                <div class="tutor">
                    <img src = '{{ asset("avatar/".$info->profile_photo_path)}}' alt="">
                    <div>
                        <h3>{{$info->name}}</h3>
                        <span>
                            @if ($info->roles == 1)
                                Instractor
                            @else
                                Students
                            @endif
                        </span>
                    </div>
                </div>
                <p>total playlists : <span>4</span></p>
                <p>total videos : <span>18</span></p>
                <p>total likes : <span>1208</span></p>
                <a href="teacher_profile.html" class="inline-btn">view profile</a>
            </div>

            @endforeach
        </div>

    </section>



</x-app-layout>
