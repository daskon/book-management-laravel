<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="sm:flex flex-wrap -m-4">
                        <div class="xl:w-1/5 md:w-32 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                                </div>
                                <a href="/book" wire:navigate>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">View Books</h2>
                                </a>
                            </div>
                        </div>
                        <div class="xl:w-1/5 md:w-32 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                                </div>
                                <a href="/" wire:navigate>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Assign</h2>
                                </a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</div>