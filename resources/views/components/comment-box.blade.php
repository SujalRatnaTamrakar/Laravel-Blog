@props(['post'])
<div class = "flex justify-center">
    <div class="shadow-lg w-3/4">
        <form class="w-full bg-white rounded-lg px-4 pt-2 pb-2" method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="-mr-1">
                        <input type='submit' class="bg-green-500 text-white text-white tracking-wider rounded shadow hover:bg-green-400 font-medium py-1 px-4 border rounded-lg tracking-wide mr-1" value='Post Comment'>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
