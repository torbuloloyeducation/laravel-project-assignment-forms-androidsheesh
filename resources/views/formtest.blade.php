<x-layout>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500 text-white p-2 rounded mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/formtest">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/10">
                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
                    <div class="sm:col-span-4">

                        <label for="email" class="block text-sm font-medium text-white">Email</label>

                        <div class="mt-2">
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="juandelacruz@umindanao.edu.ph"
                                class="block w-full bg-transparent text-white placeholder:text-gray-500 border p-2 rounded"
                            />
                        </div>

                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="bg-indigo-500 px-3 py-2 text-white rounded">
                                Save
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="mt-3 p-5">
        <h2 class="text-lg font-semibold text-white">Emails</h2>

        <ul>
            @foreach ($emails as $index => $email)
                <li class="text-sm p-1 flex justify-between items-center">
                    
                    {{ $email }}

                    <form method="POST" action="/delete-email/{{ $index }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 text-xs ml-2">
                            Delete
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </div>

</x-layout>