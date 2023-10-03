<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Readers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-x-auto overflow-y-hidden shadow-sm sm:rounded-lg">
                <div class="float-right">
                    @if (session()->has('message'))
                        <div class="text-blue-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="relative">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">Reg No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                        <th scope="col" class="px-6 py-3">Delete</th>
                    </thead>
                      <tbody>
                          @forelse ($readers as $item)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <td class="id px-6 py-4">{{ $item->reg_no }}</td>
                                  <td class="px-6 py-4">{{ $item->name }}</td>
                                  <td class="px-6 py-4">{{ $item->email }}</td>
                                  <td class="px-6 py-4">{{ $item->phone }}</td>
                                  @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                    <td class="edit">
                                        <button class="edit-book bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full">
                                        EDIT
                                        </button>
                                    </td>
                                  @endif
                                  @if(Auth::user()->role == 1)
                                    <td class="delete">
                                        <button class="delete-book bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">
                                        Delete
                                        </button>
                                    </td>
                                  @endif
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="8">No Books Found</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                </div>
                {{ $readers->links() }}
            </div>
        </div>
    </div>
</div>