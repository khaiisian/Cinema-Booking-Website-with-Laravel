@section('header-link')
<link rel="stylesheet" href="{{ asset('CSS/slider.css') }}">
@endsection
@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="carousel">
        <div class="carousel-inner">

            {{-- Slider 1 --}}
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item">`
                <div class="slider_text w-2/5 h-[85%] flex flex-col justify-center text-left pl-4 ">
                    <h2 class="text-lg md:text-2xl font-bold text-[#cd1f30] mb-2">NowShowing: Joker: Folie à Deux</h2>
                    <p class="text-sm md:text-lg leading-relaxed mb-3">
                        The sequel to the critically acclaimed "Joker," this film explores the complex relationship
                        between Arthur Fleck (Joaquin Phoenix) and Dr. Harleen Quinzel (Lady Gaga) as they navigate the
                        dark corners of their minds and Gotham City. The story delves into . . . . .
                    </p>
                    <a href="{{ route('home') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img w-3/10 h-[85%] overflow-hidden rounded-lg">
                    <img src="{{asset('images/joker.jpg')}}" alt="">
                </div>
            </div>

            {{-- Slider 2 --}}
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <div class="slider_img w-3/10 h-[85%] overflow-hidden rounded-lg">
                    <img src="{{asset('images/equalizer.jpg')}}" alt="">
                </div>
                <div class="slider_text w-2/5 h-[85%] flex flex-col justify-center text-left">
                    <h2 class="text-2xl font-bold text-[#cd1f30] mb-2">NowShowing: The Equalizer 3</h2>
                    <p class="leading-relaxed mb-3">
                        The Equalizer 3 features Denzel Washington as Robert McCall, a former black-ops operative who
                        fights for justice in a European town plagued by crime. Using his lethal skills, McCall
                        dismantles corrupt networks while confronting his past . . . .
                    </p>
                    <a href="{{ route('home') }}" class="slider_link">Book Now</a>
                </div>
            </div>

            {{-- Slider 3 --}}
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <div class="slider_text w-2/5 h-[85%] flex flex-col justify-center text-left">
                    <h2 class="text-2xl font-bold text-[#cd1f30] mb-2">Upcoming: Red One</h2>
                    <p class="leading-relaxed mb-3"> A holiday-themed action-comedy that follows a special team led by
                        Dwayne Johnson and Chris Evans on a daring mission during the Christmas season . . . .</p>
                    <a href="{{ route('home') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img w-3/10 h-[85%] overflow-hidden rounded-lg">
                    <img src="{{asset('images/redone.jpg')}}" alt="">
                </div>
            </div>

            {{-- Slider 4 --}}
            <input class="carousel-open" type="radio" id="carousel-4" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <div class="slider_img w-3/10 h-[85%] overflow-hidden rounded-lg">
                    <img src="{{asset('images/venom3.jpg')}}" alt="">
                </div>
                <div class="slider_text w-2/5 h-[85%] flex flex-col justify-center text-left">
                    <h2 class="text-2xl font-bold text-[#cd1f30] mb-2">NowShowing: Venom</h2>
                    <p class="leading-relaxed mb-3">Eddie Brock and the alien symbiote Venom navigate life together,
                        facing new challenges and formidable adversaries. As they strive to protect the world from an
                        impending threat, their bond is tested . . . .</p>
                    <a href="{{ route('home') }}" class="slider_link">Book Now</a>
                </div>
            </div>

            <label for="carousel-4" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>

            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>

            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-4" class="carousel-control next control-3">›</label>

            <label for="carousel-3" class="carousel-control prev control-4">‹</label>
            <label for="carousel-1" class="carousel-control next control-4">›</label>

            <ol class="carousel-indicators">
                <li>
                    <label for="carousel-1" class="carousel-bullet">•</label>
                </li>
                <li>
                    <label for="carousel-2" class="carousel-bullet">•</label>
                </li>
                <li>
                    <label for="carousel-3" class="carousel-bullet">•</label>
                </li>
                <li>
                    <label for="carousel-4" class="carousel-bullet">•</label>
                </li>
            </ol>
        </div>
    </div>

    {{-- Showing Blog --}}
    <div class="py-20 bg-white">
        <div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-7" id="now_showing">
            <h2 class="text-3xl font-bold text-[#ffbf00]">Showing Movies</h2>
            <div class="bg-white flex justify-center items-stretch gap-5 md:gap-10 w-full flex-wrap _blogs">
                @php
                $counter = 0;
                @endphp

                @foreach ($movies as $movie)
                @if ($movie->movie_status === "Showing")
                @php
                $release_date = Carbon::parse($movie->release_date)
                @endphp
                <div
                    class="bg-[#242424] rounded-lg min-h-[24rem] w-[15rem] sm:w-[17rem] flex flex-col items-center gap-5 px-3 pb-7 upmovie_blog">
                    <div class="w-[100%] h-[15rem] bg-[#EBEBEB] rounded-lg overflow-hidden mt-3 upmovie_img">
                        <img class="w-full h-full" src="{{asset('images/'.$movie->movie_image)}}"
                            alt="{{$movie->movie_image}}">
                    </div>
                    <div class="flex justify-center items-center flex-col px-1 text-[#DFDFDF] gap-3 upmovie_info">
                        <div class="text-center">
                            <p class="text-base font-bold text-[#DEA60E]">{{ $movie->movie_title }}</p>
                            <div class="flex justify-center items-center pt-1 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16"
                                    class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg> {{ $release_date->format('F j, l') }}
                            </div>
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
                @php
                $counter++;
                @endphp
                @if ($counter == 4)
                @break
                @endif
                @endif
                @endforeach
            </div>
            <div class="w-full flex justify-center">
                <a href="{{route(name: 'movies')}}" class="inline-flex items-center px-4 py-2 bg-white border
        border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out
        duration-150">SEE MORE</a>
            </div>
        </div>
    </div>

    {{-- Today Session Blog --}}
    <div class="py-20 bg-[#eaeaea]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="today_showtimes">
            <h2 class="text-3xl font-bold pb-8 text-[#DFAD23]">Today Showtimes</h2>
            <div class="flex justify-center md:justify-between items-stretch gap-y-12 flex-wrap">
                {{-- --}}

                @if ($todayShowtimes->isEmpty())
                <p class="text-2xl font-bold text-red-700">No Sessions Today</p>
                @else
                @php
                $counter=0
                @endphp
                @foreach ($todayShowtimes as $showtime)
                @php
                $date = Carbon::parse($showtime->showtime_date) ;
                @endphp
                {{-- {{ $session }} --}}
                <div
                    class="w-[75%] md:w-[45%]  min-h-52 flex justify-start py-1 px-7 gap-7 rounded-lg items-center bg-[#242424]">
                    <div class="w-[30%] h-[90%] rounded-lg overflow-hidden session_img">
                        <img class="w-full h-full" src="{{ asset('images/' . $showtime->movie->movie_image) }}"
                            alt="{{$showtime->movie->movie_image}}">
                    </div>
                    <div class="text-[#DEA60E] session_info">
                        <p class="mb-1">Movie Name: {{ $showtime->movie->movie_title }}</p>
                        <p class="mb-1">Theater: {{ $showtime->theater->theater_name }}</p>
                        <p class="mb-1">Time: {{ date('h:i A', strtotime($showtime->showtime_start)) }} - {{ date('h:i
                            A',
                            strtotime($showtime->showtime_end )) }} </p>
                        <p class="mb-3">Date: {{ $date->format('F j, l')}}</p>
                        <form method="POST" action="/movies/details">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{$showtime->movie->movie_id}}">
                            <input type="hidden" name="showtime_id" value="{{$showtime->showtime_id}}">
                            <x-primary-button type='submit'>
                                View Details
                            </x-primary-button>
                        </form>
                    </div>
                </div>
                @php
                $counter++;
                @endphp
                @if ($counter==3)
                @break
                @endif
                @endforeach
                @endif
                <div class="w-full flex justify-center">
                    <a href="{{route(name: 'showtimes')}}" class="inline-flex items-center px-4 py-2 bg-white border
            border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out
            duration-150">SEE MORE</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>