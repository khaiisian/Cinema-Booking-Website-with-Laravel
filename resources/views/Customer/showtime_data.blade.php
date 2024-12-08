@php
function movieDuration($duration) {
$hours = floor($duration);
$minutes = round(($duration - $hours) * 60);

$movieDuration = '';

if ($hours > 0) {
$movieDuration .= "{$hours} hour" . ($hours > 1 ? 's' : '') . " ";
}

if ($minutes > 0) {
$movieDuration .= "{$minutes} minute" . ($minutes > 1 ? 's' : '');
}

return $movieDuration;
}
@endphp


<div class="flex flex-col justify-center items-center gap-4">
    @foreach ($showtimes as $showtime)
    <div class="w-[80%] h-72 flex mt-3 mb-3 lg:px-3 lg:py-3 bg-[#252525] rounded-md">
        <div class="w-[28%] rounded-md overflow-hidden">
            <img class="w-full h-full" src="{{asset('images/'.$showtime->movie->movie_image)}}"
                alt="{{$showtime->movie->movie_name}}">
        </div>
        <div class=" w-[70%] ml-4 py-5">
            <ul class="list-none text-[#DEA60E] space-y-0.5">
                <li>Name: {{ $showtime->movie->movie_title}}</li>
                <li>Theater: {{ $showtime->theater->theater_name}}</li>
                <li>Duration: {{ movieDuration($showtime->movie->movie_duration) }}</li>
                <li>Time: {{$showtime->showtime_start}}-{{$showtime->showtime_end}}</li>
                <li>Date: {{$showtime->showtime_date}}</li>
            </ul>
            <form method="POST" action="/movies/details">
                @csrf
                <input type="hidden" name="movie_id" value="{{$showtime->movie->movie_id}}">
                <input type="hidden" name="showtime_id" value="{{$showtime->showtime_id}}">
                <x-primary-button type='submit'>
                    View Details
                </x-primary-button>
            </form>
            {{-- <form action="{{route('movies.show')}}" method="POST">
                @csrf
                <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                <x-primary-button type='submit'>
                    View Details
                </x-primary-button>
            </form> --}}
        </div>
    </div>
    @endforeach

</div>