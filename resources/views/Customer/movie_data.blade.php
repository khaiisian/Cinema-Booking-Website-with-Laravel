<div class="flex justify-start flex-wrap gap-x-10 gap-y-10">
    @foreach ($movies as $movie)
    <div
        class="bg-[#242424] sm:rounded-lg min-h-[24rem] w-[17rem] flex flex-col items-center gap-x-3 px-3 pb-5 upmovie_blog">
        <div class="w-[100%] h-[15rem] bg-[#EBEBEB] rounded-lg overflow-hidden mt-3 upmovie_img">
            <!-- Image goes here -->
            <img class="w-full h-full" src="{{asset('images/'.$movie->movie_image)}}" alt="{{$movie->movie_image}}">
        </div>
        <div class="flex justify-center items-center flex-col px-1 text-[#DFDFDF] gap-3 upmovie_info">
            <div class="text-center">
                <p class="text-base font-bold text-[#DEA60E]">{{ $movie->movie_title }}</p>
                <div class="text-sm flex justify-center items-center pt-1 gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" width="12" height="12" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg> {{ $movie->release_date }}</div>
            </div>
            <form action="{{route('movies.show')}}" method="POST">
                @csrf
                <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                <x-primary-button type='submit'>
                    View Details
                </x-primary-button>
            </form>
        </div>
    </div>
    @endforeach
</div>