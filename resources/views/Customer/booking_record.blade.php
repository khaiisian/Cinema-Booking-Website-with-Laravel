<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<x-app-layout>
    <div class="max-w-5xl min-h-screen mx-auto py-16 px-20">
        <div class="flex w-[90%] mx-auto justify-between">
            <p class="text-3xl font-bold">My Bookings</p>
            <div class="flex rounded-lg bg-gray-300 p-1">
                <button class="rounded-lg bg-white p-2 btn" id="coming_book">Upcoming Bookings</button>
                <button class="p-2 btn" id="past_book">Past Bookings</button>
            </div>
        </div>
        <div class="max-w-3xl mx-auto min-h-full py-8 flex flex-col gap-y-8 " id="record_data">
            {{-- {{ $booking=$bookings[0] }}
            {{ $booking->seats }} --}}
            {{-- {{$movie}} --}}
            {{-- @foreach ($booking as $booking)
            {{ $booking->seats }}
            @endforeach --}}
            @include('Customer.booking_record_data')
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function ajaxBookingRecord(status){
                $.ajax({
                    type: 'POST',
                    url: '/booking_record/ajax',
                    data: {
                        _token: '{{ csrf_token() }}', 
                        status: status
                    },
                    success: function (response) {
                        $('#record_data').html(response.data);
                    }
                });
            }

            $('#coming_book').click(function () { 
                let status = 'upcoming';
                console.log(status)
                $('.btn').removeClass('rounded-lg bg-white');     
                $(this).addClass('rounded-lg bg-white');
                ajaxBookingRecord(status)           
            });

            $('#past_book').click(function () { 
                let status = 'past';
                console.log(status)
                $('.btn').removeClass('rounded-lg bg-white');     
                $(this).addClass('rounded-lg bg-white');
                ajaxBookingRecord(status)   
            });
        });
    </script>
</x-app-layout>