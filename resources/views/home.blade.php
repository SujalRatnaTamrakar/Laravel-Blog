<x-layout>
{{--    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">--}}
{{--        <x-posts-grid :posts="$posts"/>--}}
{{--    </main>--}}

    <div class="container w-full md:max-w-6xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <x-posts-grid :posts="$posts"/>
        </div>
    </div>
</x-layout>


