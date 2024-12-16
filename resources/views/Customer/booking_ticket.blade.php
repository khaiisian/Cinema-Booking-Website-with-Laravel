<x-app-layout>

    {{-- <h2 class="text-2xl font-bold">Ticket Details</h2> --}}
    {{-- {{ $booking }}
    {{ $qrCode }} --}}
    <div class="max-w-2xl min-h-[45vh] mt-11 mx-auto">
        <div class="w-[100%] min-h-56 flex">
            <div
                class="w-[70%] flex flex-col justify-center items-center rounded-tl-sm rounded-bl-sm rounded-tr-xl rounded-br-xl border bg-[#1C1C1C]">
                <div class="flex h-[60%] items-center justify-center">
                    <div class="flex items-center border-r-2 border-[#FABC12] pr-3">
                        <div class="w-14 ">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        </div>
                        <div class="ml-3">
                            <h2 class="text-3xl text-[#FABC12] font-bold">Eclipse</h2>
                        </div>
                    </div>
                    <h2 class="text-3xl text-[#FABC12] font-bold ml-3">{{ $booking->showtimes->movie->movie_title }}
                    </h2>
                </div>
                <div class="w-full h-[40%] grid grid-cols-2 text-[#FABC12] pl-3 mb-2">
                    <div class="flex items-center pl-2 gap-x-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-film w-5"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z" />
                        </svg>
                        <p>: {{ $booking->showtimes->theater->theater_name }}</p>
                    </div>
                    <div class=" flex items-center pl-2 gap-x-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar w-5"
                            viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                        <p>: {{\Carbon\Carbon::parse($booking->showtimes->showtime_date)->format('F j, l') }}</p>
                    </div>
                    <div class="flex items-center pl-2 gap-x-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-clock w-5"
                            viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                        </svg>
                        <p> : {{ date("h:i A", strtotime($booking->showtimes->showtime_start)) }}</p>
                    </div>
                    <div class=" flex items-center pl-2 gap-x-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-ticket-perforated w-5"
                            viewBox="0 0 16 16">
                            <path
                                d="M4 4.85v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9z" />
                            <path
                                d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3zM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9z" />
                        </svg>
                        <p>:@foreach ($booking->seats as $seat)
                            {{ $seat->seat_code }} @if (!$loop->last),
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div
                class="w-[30%] rounded-tl-xl rounded-bl-xl bg-white border border-gray-300 flex justify-center items-center">
                {{ $qrCode }}
            </div>
        </div>
    </div>


</x-app-layout>