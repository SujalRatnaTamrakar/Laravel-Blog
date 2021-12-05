@props(['comment'])
<div class="flex justify-center mt-10">
        <article class="flex w-3/4 bg-gray-200 border border-gray-200 p-6 rounded-xl space-x-4">
            <div class="flex-shrink-0">
                <img class="w-10 h-10 rounded-full mr-4" src="https://i.pravatar.cc/300?u={{$comment->user_id}}" alt="Avatar of Author">
            </div>
            <div>
                <header class="mb-4">
                    <h3 class="font-bold">{{$comment->author->name}}</h3>
                    <p class="text-xs">Posted <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time></p>
                </header>
                <p>
                    {{$comment->body}}
                </p>
            </div>
        </article>
</div>
