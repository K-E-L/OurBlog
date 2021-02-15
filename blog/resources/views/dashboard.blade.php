<x-app-layout>
    <x-slot name="header">
        <form method="POST" action="/posts/create">
            <div class="inline-flex  w-full">
                {{ csrf_field() }}
                <input class="w-full rounded" type="text" name="body" placeholder="What's on your mind?..." autofocus>
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </x-slot>

    <div class="py-12">
        @foreach($posts->sortByDesc('created_at') as $post)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="inline-flex  w-full">
                            <div class="py-3">
                                {{$post->creator->name}} : 
                                {{$post->created_at->diffForHumans()}}
                            </div>
                            @if (Auth::User()->id === $post->creator->id)
                                <form method="POST" action="/posts/{{ $post->id}}/destroy" class="px-3">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn">Delete</button>
                                </form>
                            @endif
                        </div>
                        <div class="py-3">
                            @if (Auth::User()->id === $post->creator->id)
                                <form method="POST" action="/posts/{{ $post->id}}/edit">
                                    {{ csrf_field() }}
                                    <div class="inline-flex  w-full">
                                        <textarea name="body" cols="40" rows="2" class="ipt w-full" placeholder="What's on your mind?...">{{$post->body}}</textarea>
                                        <button type="submit" class="btn">Edit</button>
                                    </div>
                                </form>
                            @else
                                {{$post->body}}
                            @endif
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach                                                
    </div>

</x-app-layout>
