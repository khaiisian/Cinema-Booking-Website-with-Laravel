<x-app-layout>

    <div class="w-full bg-white">
        <div class="w-96 mx-auto border border-gray-300 mt-4 rounded-lg overflow-hidden mb-8">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Booking
                Management</h2>
            {{-- <form action="/booking/update" method="POST" class="flex flex-col px-8 py-3">
                @csrf --}}
                <div class="flex flex-col px-8 py-3">
                    <div class="grid grid-cols-2 w-[90%]">
                        <label class="block font-semibold text-lg text-gray-700" for="u_id">User ID</label>
                        <input type="text" name="u_id" id="u_id" class="rounded-md mb-4 h-7 w-9"
                            value="{{$booking->u_id}}" readonly>

                        <label class="block font-semibold text-lg text-gray-700" for="u_id">Booking ID</label>
                        <input type="text" name="booking_id" class="rounded-md mb-4 h-7 w-9"
                            value="{{$booking->booking_id}}" readonly>

                        <label for=" booking_code" class="font-semibold text-lg text-gray-700">Booking Code</label>
                        <input type="text" name="booking_code" id="booking_code" class="rounded-md mb-4 h-8  w-[90%]"
                            value="{{$booking->booking_code}}" readonly>

                        <label for="booking_status" class="font-semibold text-lg text-gray-700">Booking Status</label>
                        <input type="text" name="booking_status" class="rounded-md mb-4 h-8  w-[60%]"
                            id="booking_status" value="{{$booking->booking_status}}" readonly>
                        <label class="block font-semibold text-lg text-gray-700" for="seat">Booking Seats</label>
                        <div class="w-[100%] grid grid-cols-2 gap-2 seat_div">
                            @foreach ($booking->seats as $b_seat)
                            <input type="text" name="booking_status" class="rounded-md mb-4 h-8  w-[95%]"
                                id="booking_status" value="{{$b_seat->seat_code}}" readonly>
                            @endforeach
                        </div>

                        <label class="block font-semibold text-lg text-gray-700" for="total_price">Total
                            Price</label>
                        <input type="text" name="total_price" id="total_price" class="rounded-md mb-4 h-7 w-28"
                            value="{{$booking->total_price}}" readonly>

                        <label class="block font-semibold text-lg text-gray-700" for="">QR Code</label>
                        <div>{{ $qrCode }}</div>
                    </div>



                    <x-primary-button id="" class="w-20 px-4 mt-5 mb-4 ml-2">Back</x-primary-button>
                </div>
                {{--
            </form> --}}
        </div>
    </div>




    <script>
        $(document).ready(function () {
            $('.seats').on('focus', function () {
                $(this).attr('size', 5);
            });

            $('.seats').on('blur', function () {
                $(this).removeAttr('size');
            });

            
        });
    </script>
</x-app-layout>