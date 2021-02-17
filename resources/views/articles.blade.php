<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        @foreach($articles as $article)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="inline-flex  w-full whitespace-pre-wrap font-bold">
                        {{ $article->title }}
                    </div>
                    <div class="inline-flex  w-full whitespace-pre-wrap">
                        {{ $article->source }}                    
                    </div>

                    <div class="inline-flex  w-full whitespace-pre-wrap">
                        {{ $article->body }}  
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    


</x-app-layout>
