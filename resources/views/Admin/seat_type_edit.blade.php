@section('header-link')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<x-app-layout>
    @if ($errors->any())
    <script>
        const errors = @json($errors->all());
        let errorMessage = "Validation Errors:\n";
        errors.forEach(error => {
            errorMessage += `- ${error}\n`;
        });
        alert(errorMessage);
    </script>
    @endif

    <div class="w-full bg-white py-10">
        <div class="w-80 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Seat Types
                Management</h2>
            <form action="{{route('seat_type_update')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seat_type_id" value="{{$seat_type->seat_type_id}}">
                <label class="font-semibold text-lg text-gray-700" for="seat_type">Seat Type Name</label>
                <input type="text" name="seat_type" id="seat_type" class="rounded-md mb-4 h-8"
                    value="{{$seat_type->seat_type}}">
                <label class="font-semibold text-lg text-gray-700" for="price">Price</label>
                <input type="number" name="price" id="price" class="rounded-md mb-4 h-8" value="{{$seat_type->price}}">
                <x-primary-button id="update_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>

    </div>
    <div class="w-3 bg-yellow-100">Hello</div>
</x-app-layout>
<script>
    $(document).on('click', '#update_btn',function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to update this seat type?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                    $(this).closest('form').submit();
            }
        })
    });
</script>