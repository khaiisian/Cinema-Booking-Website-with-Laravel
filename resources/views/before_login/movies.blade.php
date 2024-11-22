@yield('css')
<link rel="stylesheet" href="{{ asset('CSS/slider.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<x-app-layout>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pt-10 flex justify-center items-center gap-4">
        <h2 class="text-3xl font-bold text-[#ffbf00]">Movie Library</h2>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 px-1 flex justify-between items-center">
        <div class="">
            <button class="px-2 py-1 border-[0.5px] border-gray-300 rounded-md">All Movies</button>
            <button class="px-2 py-1 border-[0.5px] border-gray-300 rounded-md">Now Showing</button>
            <button class="px-2 py-1 border-[0.5px] border-gray-300 rounded-md">Upcoming</button>
        </div>
        <div class="flex items-center gap-x-1">
            <input type="text" placeholder="Search" class="w-50 h-10 rounded-md border-gray-300">
            <select name="" id="" class="h-10 rounded-md border-gray-300">
                <option value="0">All Genres</option>
                @php
                $value=1;
                @endphp
                @foreach ($genres as $genre)
                <option value="{{$value}}">{{$genre->genre}}</option>
                @php
                $value++;
                @endphp
                @endforeach
            </select>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5 flex justify-start flex-wrap gap-x-10 gap-y-10">
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
                    <div class="text-sm flex justify-center items-center pt-1 gap-2"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="12" height="12"
                            class="bi bi-calendar" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg> {{ $movie->release_date }}</div>
                </div>
                <x-primary-button class="mx-auto mt-1" as="a" href="{{ route('beforelogin') }}">
                    More Info
                </x-primary-button>
            </div>
        </div>
        @endforeach
    </div>


</x-app-layout>