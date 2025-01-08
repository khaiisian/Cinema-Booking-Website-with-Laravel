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

    <div class="w-full bg-white py-10">
        <div class="w-96 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Movie
                Management</h2>
            <form action="{{ route('admin_user_update') }}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="u_id" value="{{$user->u_id}}">
                <label class="font-semibold text-lg text-gray-700" for="u_code">User Code</label>
                <input type="text" name="u_code" id="u_code" class="rounded-md mb-4 h-8" value="{{$user->u_code}}"
                    readonly>
                <label class="font-semibold text-lg text-gray-700" for="u_name">User Name</label>
                <input type="text" name="u_name" id="u_name" class="rounded-md mb-4 h-8" value="{{$user->u_name}}">
                <label class="font-semibold text-lg text-gray-700" for="acc_name">Account Name</label>
                <input type="text" name="acc_name" id="acc_name" class="rounded-md mb-4 h-8"
                    value="{{$user->acc_name}}">
                <label class="font-semibold text-lg text-gray-700" for="email">Email</label>
                <input type="text" name="email" id="email" class="rounded-md mb-4 h-8" value="{{$user->email}}">

                <label class="font-semibold text-lg text-gray-700" for="password">Password</label>
                <input type="text" name="password" id="password" class="rounded-md mb-4 h-8">

                <label class="font-semibold text-lg text-gray-700" for="password_confirmation">Confirm Password</label>
                <input type="text" name="password_confirmation" id="password_confirmation" class="rounded-md mb-4 h-8">
                <x-primary-button id="save_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>