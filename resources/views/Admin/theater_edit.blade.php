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
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Theater
                Update</h2>
            <form action="{{route('theater_upate')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="theater_id" value="{{$theater->theater_id}}">
                <label class="font-semibold text-lg text-gray-700" for="theater_name">Theater Name</label>
                <input type="text" name="theater_name" id="theater_name" class="rounded-md mb-4 h-8"
                    value="{{$theater->theater_name}}">
                <label class="font-semibold text-lg text-gray-700" for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="rounded-md mb-4 h-8"
                    value="{{$theater->capacity}}">
                <x-primary-button id="update_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function () {
        $(document).on('click', '#update_btn', function (e) {
            e.preventDefault();
            Swal.fire({
            title: "Update the theater!",
            text: "Are you sure to update the theater?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>