<div>
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
                <div class="p-2">
                    <a href="/reader"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        BACK
                    </a>
                </div>
                <div class="relative">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Book Name</th>
                        <th scope="col" class="px-6 py-3">Issued</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Return</th>
                    </thead>
                      <tbody>
                          @forelse ($books as $book)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <td class="id px-6 py-4">{{ $book->id }}</td>
                                  <td class="px-6 py-4">{{ $book->name }}</td>
                                  <td class="px-6 py-4">{{ $book->issue_date->format('d M, Y') }}</td>
                                  <td class="px-6 py-4">{{ $book->return_date->format('d M, Y') }}</td>
                                  <td class="px-6 py-4">
                                      @if ($book->issue_status == 'Y')
                                          <span class='badge badge-success'>Available</span>
                                      @else
                                          <span class='badge badge-danger'>Issued</span>
                                      @endif
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="8">No Records Found</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>