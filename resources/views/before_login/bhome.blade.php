@yield('css')
<link rel="stylesheet" href="{{ asset('CSS/slider.css') }}">
<x-app-layout>
    <div class="carousel">
        <div class="carousel-inner">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item">
                {{-- <img src="http://fakeimg.pl/2000x800/0079D8/fff/?text=Without"> --}}
                <div class="slider_text">
                    <h1>Now Showing: Red One</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, voluptas ipsa! Dolorum
                        amet
                        fugiat aspernatur! Debitis temporibus, voluptate dicta porro ut repudiandae odit unde labore
                        asperiores deserunt nisi totam cupiditate.</p>
                    <a href="{{ route('beforelogin') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img">
                    <img src="{{asset('images/redone_poster.jpg')}}" alt="">
                </div>
            </div>
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                {{-- <img src="http://fakeimg.pl/2000x800/DA5930/fff/?text=JavaScript"> --}}
                <div class="slider_img">
                    <img src="{{asset('images/garfield.jpg')}}" alt="">
                </div>
                <div class="slider_text">
                    <h1>Now Showing: Garfield</h1>
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
                    <h1>Now Showing: Mad Max</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, cum? Sit molestias nihil rerum,
                        laudantium dolorem voluptatum, explicabo eum facere reiciendis aliquid dolor quidem, facilis
                        sunt illo animi cum ut.</p>
                    <a href="{{ route('beforelogin') }}" class="slider_link">Book Now</a>
                </div>
                <div class="slider_img">
                    <img src="{{asset('images/madmax.jpg')}}" alt="">
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>Upcoming Movies</h2>
            <div class="flex_section">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>