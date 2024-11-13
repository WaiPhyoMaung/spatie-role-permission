<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div class="flex justify-start">
                        <a class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded" href="{{ route('admin.roles.index') }}">Back to Role List</a>
                    </div>
    
                    <div class="flex flex-col">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="pt-5') }}">
                            @csrf
                            @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name"   
                         class="block text-2xl font-semibold">Role name</label>
                                    <div class="mt-1">
                                        <input value="{{ $role->name }}" type="text" id="name" name="name" class="block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span>
                                    
                                    @enderror
                                </div>
                                
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4   
                                    py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="max-w-xl mt-4">
                            <h2 class="text-2xl font-semibold">Role Permissions</h2>
                            
                        <form  method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
                            @csrf
                            <div class="flex-row items-center space-x-4">

                                @foreach ($permissions as $permission)
                                {{-- <div > --}}
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                    <label>{{ $permission->name }}</label>
                                {{-- </div> --}}
                                @endforeach    
                            </div>
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">Assign Permissions</button>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>