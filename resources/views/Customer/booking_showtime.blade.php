<div class="px-4">
    <h2 class="text-xl justify-between font-bold text-[#ffbf00] mb-3">Showtime Information</h2>
    @if ($showtimes->isEmpty())
    <p class="text-white">There is no showtime for this day.</p>
    @endif
    @foreach ($showtimes as $showtime)
    <button
        class="flex flex-wrap justify-between px-2 py-2 gap-y-3 w-[100%] text-white border border-gray-500 rounded-lg">
        {{-- @php
        $showtime = $showtimes->first();
        @endphp --}}
        <div class="flex items-center p-1 h-6 w-[30%]">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-clock"
                viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
            </svg>
            <p>&nbsp;: {{ $showtime->showtime_start }} - {{ $showtime->showtime_end }}</p>
        </div>
        <div class="flex items-center w-[30%] p-1 h-6"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>
            <p>&nbsp; : {{ \Carbon\Carbon::parse($showtime->showtime_date)->format('F j, l') }}
            </p>
        </div>
        <div class="flex items-center w-[30%] p-1 h-6"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0M1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0" />
                <path
                    d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm6 8.73V7.27l-3.5 1.555v4.35zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6M7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
            </svg>
            <p>&nbsp;: {{ $showtime->theater->theater_name }}</p>
        </div>
    </button>
    @endforeach

</div>