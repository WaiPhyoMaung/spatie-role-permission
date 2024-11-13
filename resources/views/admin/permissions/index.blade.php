<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end">
                    <a class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded" href="{{ route('admin.permissions.create') }}">Create permission</a>
                </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full   
             sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">   
            
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    Name
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">

                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead> 
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($permissions as $permission)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $permission->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end">
                                                        <div class="flex space-x-2">
                                                            
                                                            <a class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded" href="{{ route('admin.permissions.edit', $permission->id) }}">Edit</a>
                                                            {{-- <a class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded" href="{{ route('admin.permissions.destroy', $permission->id) }}">Delete</a> --}}
                                                         <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post" onsubmit="return confirm('Are you sure?');">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">Delete</button>
                                                         </form>
                                                         </div>
                                                     </div>     
                                                </td>
                                            </tr>
                                                
                                            @endforeach

                                        </tbody>
            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
