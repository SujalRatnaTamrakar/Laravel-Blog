@props(['posts'])
@if($posts->count())
    <x-featured-card-layout :post="$posts[0]"/>

    @if($posts->count()>1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
                <x-card-layout :post="$post" class="{{$loop->iteration < 3? 'col-span-3' : 'col-span-2'}}"/>
            @endforeach
        </div>
        <hr class="border-b-2 border-gray-400 mb-8">
        @if($posts->count()>8)
            {{$posts->links()}}
        @endif
    @endif
@else
    <p class="text-center">No posts yet! Check back later...</p>
@endif
