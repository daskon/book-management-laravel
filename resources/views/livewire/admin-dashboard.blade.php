<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="sm:flex flex-wrap -m-4">
                        <nav>
                        <a href="/book" wire:navigate>
                            <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Books</h2>
                            </div>
                            </div>
                        </a>
                        </nav>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Assign</h2>
                            </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                          <div class="border border-gray-200 p-6 rounded-lg">
                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                              </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Issued</h2>
                          </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                          <div class="border border-gray-200 p-6 rounded-lg">
                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                              </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Authors</h2>
                          </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                          <div class="border border-gray-200 p-6 rounded-lg">
                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22v-7"></path>
                              </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Editors</h2></p>
                          </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                              <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                  <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22v-7"></path>
                                </svg>
                              </div>
                              <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Viewers</h2></p>
                            </div>
                          </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                          <div class="border border-gray-200 p-6 rounded-lg">
                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                              </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">History</h2>
                          </div>
                        </div>
                      </div>
                      <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</div>
