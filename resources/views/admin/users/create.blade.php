<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div class="flex justify-start">
                        <a class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded" href="{{ route('admin.users.index') }}">Back to User List</a>
                    </div>
    
                    <div class="flex flex-col">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <!-- Name Field -->
                                    <label for="name" class="block text-2xl font-semibold">User Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" class="block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                            
                                    <!-- Email Field -->
                                    <label for="email" class="block text-2xl font-semibold mt-4">Email</label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email" class="block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('email')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                            
                                    <!-- Password Field -->
                                    <label for="password" class="block text-2xl font-semibold mt-4">Password</label>
                                    <div class="mt-1">
                                        <input type="password" id="password" name="password" class="block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('password')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <!-- Submit Button -->
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>