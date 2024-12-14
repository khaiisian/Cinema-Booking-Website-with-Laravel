@foreach ($bookings as $booking )
<div class="w-[78%] min-h-64 rounded-xl ml-6 p-4 gap-x-5 flex bg-[#333333]">
    <div class="img w-[33%] min-h-full rounded-lg overflow-hidden bg-white">
        <img src="{{asset('images/'.$booking->showtimes->movie->movie_image)}}" alt="">
    </div>
    <div class="info w-[65%] min-h-full ">
        <h1 class="text-2xl font-bold text-[#ffbf00] mb-1">{{ $booking->showtimes->movie->movie_title }}
        </h1>
        <hr class="border border-gray-500 mb-3">
        <div class="text-gray-200 flex items-center pl-2 gap-x-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar w-5" viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>
            {{\Carbon\Carbon::parse($booking->showtimes->showtime_date)->format('F j, l') }}
        </div>
        <div class="text-gray-200 flex items-center pl-2 gap-x-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-clock w-5" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
            </svg>
            {{ date("h:i A", strtotime($booking->showtimes->showtime_start)) }}
        </div>
        <div class="text-gray-200 flex items-center pl-2 gap-x-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-ticket-perforated w-5"
                viewBox="0 0 16 16">
                <path
                    d="M4 4.85v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9z" />
                <path
                    d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3zM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9z" />
            </svg>
            @foreach ($booking->seats as $seat)
            {{ $seat->seat_code }} @if (!$loop->last),
            @endif
            @endforeach
        </div>
        <div class="text-gray-200 flex items-center pl-2 gap-x-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film"
                viewBox="0 0 16 16">
                <path
                    d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z" />
            </svg>
            {{ $booking->showtimes->theater->theater_name }}
        </div>

        <div class="flex justify-between px-2 mt-8">
            <x-secondary-button>View Ticket</x-secondary-button>
            <form action="/booking/cancel" method="POST">
                @csrf
                <input type="hidden" name="booking_id" id="booking_id" value="{{$booking->booking_id}}">
                <x-primary-button>Cancel Booking</x-primary-button>
            </form>
        </div>

    </div>
</div>
@endforeach