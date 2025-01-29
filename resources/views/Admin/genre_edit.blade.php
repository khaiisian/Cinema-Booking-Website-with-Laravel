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
        <div class="w-96 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Movie
                Management</h2>
            <form action="{{route('genre_update')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="genre_id" value="{{$genre->genre_id}}">
                <label class="font-semibold text-lg text-gray-700" for="genre">Genre Name</label>
                <input type="text" name="genre" id="genre" class="rounded-md mb-4 h-8" value="{{$genre->genre}}">
                <label class="font-semibold text-lg text-gray-700" for="genre_description">Genre Description</label>
                <textarea name="genre_description" id="genre_description" cols="30" rows="3"
                    class="rounded-md mb-4">{{ $genre->genre_description }}</textarea>
                <x-primary-button id="update_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    $('#update_btn').click(function (e) { 
        e.preventDefault();
        Swal.fire({
            title: "Update Genre!",
            text: "Are you sure to update the genre?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Are you sure to delete the movie?");
                    $(this).closest('form').submit();
                } else {
                    console.log("Removing movie is confirmed.");
                }
            });
    });
</script>