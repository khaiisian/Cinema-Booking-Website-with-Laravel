@yield('css')
<link rel="stylesheet" href="{{ asset('CSS/slider.css') }}">
<link rel="stylesheet" href="{{ asset('CSS/blogs.css') }}">
<x-app-layout>
    <div class="carousel">
        <div class="carousel-inner">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item">
                {{-- <img src="http://fakeimg.pl/2000x800/0079D8/fff/?text=Without"> --}}
                <div class="slider_text">
                    <h2>NowShowing: Dune: Part Two</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, voluptas ipsa! Dolorum
                        amet
                        fugiat aspernatur! Debitis temporibus, voluptate dicta porro ut repudiandae odit unde labore
                        asperiores deserunt nisi totam cupiditate.</p>
                    <a href="{{ route('beforelogin') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img">
                    <img src="{{asset('images/dune2.jpg')}}" alt="">
                </div>
            </div>
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                {{-- <img src="http://fakeimg.pl/2000x800/DA5930/fff/?text=JavaScript"> --}}
                <div class="slider_img">
                    <img src="{{asset('images/furiosa.jpg')}}" alt="">
                </div>
                <div class="slider_text">
                    <h2>NowShowing: Furiosa: Madmax</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, voluptas ipsa! Dolorum
                        amet
                        fugiat aspernatur! Debitis temporibus, voluptate dicta porro ut repudiandae odit unde labore
                        asperiores deserunt nisi totam cupiditate.</p>
                    <a href="{{ route('beforelogin') }}" class="slider_link">Book Now</a>
                </div>
            </div>
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                {{-- <img src="http://fakeimg.pl/2000x800/F90/fff/?text=Carousel"> --}}
                <div class="slider_text">
                    <h2>Upcoming: Mad Max</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, cum? Sit molestias nihil rerum,
                        laudantium dolorem voluptatum, explicabo eum facere reiciendis aliquid dolor quidem, facilis
                        sunt illo animi cum ut.</p>
                    <a href="{{ route('beforelogin') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img">
                    <img src="{{asset('images/moana2.jpg')}}" alt="">
                </div>
            </div>
            <label for="carousel-3" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>
            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>
            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-1" class="carousel-control next control-3">›</label>
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
            </ol>
        </div>
    </div>
    {{-- <x-slot name="slide">

    </x-slot> --}}

    <div class="py-12 bg-white">
        <div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-7">
            <h2 class="text-3xl font-bold text-[#ffbf00]">Upcoming Movies</h2>
            <div class="bg-white flex justify-center items-stretch gap-10 w-full flex-wrap _blogs">
                @php
                $counter = 0;
                @endphp

                @foreach ($movies as $movie)
                @if ($movie->movie_status === "Upcoming")
                <div
                    class="bg-[#474747] sm:rounded-lg min-h-[24rem] w-[17rem] flex flex-col items-center py-5 px-2 gap-6 upmovie_blog">
                    <div class="w-[85%] h-[13rem] bg-[#EBEBEB] rounded-lg upmovie_img">
                        <!-- Image goes here -->
                    </div>
                    <div class="flex justify-center items-center flex-col text-[#E8E8E8] gap-3 upmovie_info">
                        <div class="text-center">
                            <p class="text-lg font-bold">{{ $movie->movie_title }}</p>
                            <div class="flex justify-center items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-calendar"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg> {{ $movie->release_date }}</div>
                        </div>
                        <x-secondary-button class="mx-auto mt-1" as="a" href="{{ route('beforelogin') }}">
                            More Info
                        </x-secondary-button>
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
            <x-secondary-button class="mx-auto mt-1 min-w-32 justify-center" as="a" href="{{ route('beforelogin') }}">
                See More
            </x-secondary-button>
        </div>
    </div>

    <div class="py-12 bg-[#333333]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-[#f5b000]">Today Session</h2>
            <div class="flex justify-center items-stretch gap-12 flex-wrap">
                {{-- --}}

                @if ($todaySessions->isEmpty())
                <p class="text-2xl font-bold text-red-700">No Sessions Today</p>
                @else
                @foreach ($todaySessions as $session)
                <div class="w-[48%]  min-h-12 flex-col justify-center rounded-lg items-center bg-white">
                    <p>Movie Name: {{ $session->movie->movie_title }}</p>
                    <p>Session No: {{ $session->session_id }}</p>
                    <p>Start Time: {{ $session->session_start }}</p>
                    <p>End Time: {{ $session->session_end }}</p>
                    <p>Date: {{ $session->session_date}}</p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>