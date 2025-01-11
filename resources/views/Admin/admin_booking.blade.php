@section('header-link')
<link href="DataTables/datatables.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<x-app-layout>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="w-full bg-white py-3">
        {{-- @foreach ($bookings as $booking)
        {{ $booking }}
        @endforeach --}}
        <div class="max-w-6xl bg-white mx-auto dt_table pt-10">
            <h2 class="text-4xl text-gray-700 font-bold">Booking Table</h2>
            <hr class="mb-4 mt-2 border-[#8a8a8a]">
            {{-- Search Movie <input type="text" name="searchMovie" id="searchMovie" onchange="searhMovies()"
                class="h-6"> --}}
            {{-- {{ $showtimes }} --}}
            <table class="" id="data_table">
                <thead class="">
                    <tr class="bg-[#cd1f30] text-white">
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>Showtime ID</th>
                        <th>Booking Code</th>
                        <th>Booking Status</th>
                        <th>Booking Seats</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>
                            <p class="text-center">{{ $booking->booking_id }}</p>
                        <td>
                            <p class="text-center">{{ $booking->u_id }}</p>
                        </td>
                        <td>
                            <p class="text-center">{{ $booking->showtime_id }}</p>
                        </td>
                        </td>
                        <td>
                            <p class="text-center">{{ $booking->booking_code }}</p>
                        </td>
                        <td>
                            <p class="text-center">{{ $booking->booking_status }}</p>
                        </td>
                        <td>
                            <p class="text-wrap">
                                @foreach ($booking->seats as $booking_seat){{ $booking_seat->seat_code }}
                                @if (! $loop->last), @endif
                                @endforeach
                            </p>
                        </td>
                        <td>
                            <p class="text-center">{{ $booking->total_price }}</p>
                        </td>

                        <td>
                            <div class="flex gap-x-4 justify-center">
                                <form action="{{ route('booking_show', ['id' => $booking->booking_id]) }}">
                                    @csrf
                                    <button
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="bi bi-eye w-5" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('admin_cancel', ['id' => $booking->booking_id]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="cancel_booking {{ $booking->booking_status == 'canceled' ? 'bg-gray-500 py-2 px-2 border-b-4 border-gray-700 rounded cursor-not-allowed' : 'bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-2 border-b-4 border-red-700 hover:border-red-500 rounded'}}"
                                        {{ $booking->booking_status=="canceled "?'disabled':'' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x w-5"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('extra-scripts')
    <script src="DataTables/datatables.min.js"></script>
    @endsection
</x-app-layout>
<script>
    $(document).ready(function () {                
        let table = new DataTable('#data_table');

        $(document).on('click', '.cancel_booking', function (e) {
            e.preventDefault();

        Swal.fire({
            title: "Are you sure you want to cancel the booking?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("Booking cancellation confirmed. Proceeding with submission.");
                $(this).closest('form').submit();
            } else {
                console.log("Booking cancellation not confirmed. Submission stopped.");
            }
        });
        });

    });
</script>