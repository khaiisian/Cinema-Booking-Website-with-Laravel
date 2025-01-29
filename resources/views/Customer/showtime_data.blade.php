@php
use Carbon\Carbon;
function formatDuration($decimalDuration) {
$totalMinutes = (int) $decimalDuration;

$hours = intdiv($totalMinutes, 60);
$minutes = $totalMinutes % 60;

$duration = "{$hours} hours {$minutes} minutes";
return $duration;
}
@endphp


<div class="flex flex-col justify-center items-center gap-4">
    {{-- {{ $showtimes }} --}}
    @if($showtimes->isEmpty())
    <div class="h-40 flex items-center">
        <p class="text-4xl text-red-600">Sorry, No showtimes for this day</p>
    </div>
    @endif
    @foreach ($showtimes as $showtime)
    @php
    $date = Carbon::parse($showtime->showtime_date);
    @endphp
    <div class="w-[80%] h-72 flex mt-3 mb-3 lg:px-3 lg:py-3 bg-[#252525] rounded-md">
        <div class="w-[28%] rounded-md overflow-hidden">
            <img class="w-full h-full" src="{{asset('images/'.$showtime->movie->movie_image)}}"
                alt="{{$showtime->movie->movie_name}}">
        </div>
        <div class=" w-[70%] ml-4 py-5">
            <ul class="list-none text-[#DEA60E] space-y-1 mb-3">
                <li>Name: {{ $showtime->movie->movie_title}}</li>
                <li>Theater: {{ $showtime->theater->theater_name}}</li>
                <li>Duration: {{ formatDuration($showtime->movie->movie_duration) }}</li>
                <li>Time: {{ date('h:i A', strtotime($showtime->showtime_start)) }} - {{ date('h:i A',
                    strtotime($showtime->showtime_end )) }} </li>
                <li>Date: {{$date->format('F j, l')}}</li>
            </ul>
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
    @endforeach

</div>