<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-x-auto overflow-y-hidden shadow-sm sm:rounded-lg">
                @if(Auth::user()->role == 1)
                    <div class="p-2">
                        <button wire:click="openAddModel"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            ADD NEW
                        </button>
                    </div>
                @endif
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
                        <th scope="col" class="px-6 py-3">S.No</th>
                        <th scope="col" class="px-6 py-3">Book Name</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Author</th>
                        <th scope="col" class="px-6 py-3">Publisher</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                        <th scope="col" class="px-6 py-3">Delete</th>
                    </thead>
                      <tbody>
                          @forelse ($books as $book)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <td class="id px-6 py-4">{{ $book->id }}</td>
                                  <td class="px-6 py-4">{{ $book->name }}</td>
                                  <td class="px-6 py-4">{{ $book->category->name }}</td>
                                  <td class="px-6 py-4">{{ $book->auther->name }}</td>
                                  <td class="px-6 py-4">{{ $book->publisher->name }}</td>
                                  <td class="px-6 py-4">
                                      @if ($book->status == 'Y')
                                          <span class='badge badge-success'>Available</span>
                                      @else
                                          <span class='badge badge-danger'>Issued</span>
                                      @endif
                                  </td>
                                  @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                    <td class="edit">
                                        <button wire:click="bookQuery({{$book}})" class="edit-book bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full">
                                        EDIT
                                        </button>
                                    </td>
                                  @endif
                                  @if(Auth::user()->role == 1)
                                    <td class="delete">
                                        <button wire:click="deleteBook({{$book->id}})" class="delete-book bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">
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
                {{ $books->links() }}
            </div>
        </div>
    </div>

    {{-- edit model here --}}
      @if($model_status)
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 show w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-blue-200 rounded-lg shadow dark:bg-gray-700">
                    <button type="button" wire:click="closeModel" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Book</h3>
                        <form class="space-y-6" autocomplete="off">
                            <div>
                                @if (session()->has('message'))
                                    <div class="bg-green-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                          @csrf
                          <div class="form-group">
                              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Name</label>
                              <input wire:change="setBookName($event.target.value)" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" @error('name') isinvalid @enderror"
                                  placeholder="Book Name" name="name" value="{{ $selectedBook['name'] }}" >
                              @error('name')
                                  <div class="alert alert-danger" role="alert">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                              <select wire:change="setCat($event.target.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                 @error('category_id') isinvalid @enderror " name="category_id">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                      @if ($category->id == $selectedBook['category_id'])
                                          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                      @else
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endif
                                  @endforeach
                              </select>
                              @error('category_id')
                                  <div class="alert alert-danger" role="alert">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                              <select wire:change="setAuth($event.target.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                 @error('auther_id') isinvalid @enderror " name="author_id">
                                  <option value="">Select Author</option>
                                  @foreach ($authors as $auther)
                                      @if ($auther->id == $selectedBook['auther_id'])
                                          <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                                      @else
                                          <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                      @endif
                                  @endforeach
                              </select>
                              @error('auther_id')
                                  <div class="alert alert-danger" role="alert">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                              <select wire:change="setPublisher($event.target.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                 @error('publisher_id') isinvalid @enderror "
                                  name="publisher_id" >
                                  <option value="">Select Publisher</option>
                                  @foreach ($publishers as $publisher)
                                      @if ($publisher->id == $selectedBook['publisher_id'])
                                          <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                                      @else
                                          <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                      @endif
                                  @endforeach
                              </select>
                              @error('publisher_id')
                                  <div class="alert alert-danger" role="alert">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <input type="button" wire:click="updateBook({{$selectedBook['id']}})" class="edit-book bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full"
                           value="Update" >
                      </form>
                    </div>
                </div>
            </div>
        </div>
      @endif
    {{-- model end --}}

    {{-- add model here --}}
    @if($add_model_status)
      <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 show w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-blue-200 rounded-lg shadow dark:bg-gray-700">
                  <button type="button" wire:click="closeModel" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="px-6 py-6 lg:px-8">
                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create Book</h3>
                      <form class="space-y-6" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Name</label>
                            <input wire:model="bookName" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" @error('name') isinvalid @enderror"
                                placeholder="Book Name" name="name" >
                            @error('bookName')
                                <div class="text-red-700 px-4" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select wire:model="new_categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               @error('category_id') isinvalid @enderror " name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-red-700 px-4" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                            <select wire:model="new_auther" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               @error('auther_id') isinvalid @enderror " name="author_id">
                                <option value="">Select Author</option>
                                @foreach ($authors as $auther)
                                    <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                @endforeach
                            </select>
                            @error('new_auther')
                                <div class="text-red-700 px-4" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                            <select wire:model="new_publisher" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               @error('publisher_id') isinvalid @enderror "
                                name="publisher_id" >
                                <option value="">Select Publisher</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                            @error('new_publisher')
                                <div class="text-red-700 px-4" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" wire:click.prevent="insertBook" class="edit-book bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full"
                         value="Create" >
                    </form>
                  </div>
              </div>
          </div>
      </div>
    @endif
  {{-- model end --}}

</div>