<x-layout>
    <div class="container w-full md:max-w-6xl mx-auto pt-20">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Excerpt <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="excerpt" id="excerpt" required>
                        </div>



                        <div class="grid grid-cols-6 mb-4">
                            <div class="col-span-6 sm:col-span-6 lg:col-span-1">
                                <label class="text-xl text-gray-600">Category <span class="text-red-500">*</span></label></br>
                                <select class="border-2 border-gray-300 p-2 mt-1" name="category_id" id="category" required>
                                    @php
                                        $categories = \App\Models\Category::all();
                                    @endphp

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-5">
                                <label class="text-xl text-gray-600">Thumbnail<span class="text-red-500">*</span></label></br>
                                <input type="file" class="border-2 border-gray-300 p-2 w-full" name="thumbnail" id="thumbnail">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Body <span class="text-red-500">*</span></label></br>
                            <textarea name="body" class="border-2 border-gray-500" required>

                            </textarea>
                        </div>

                        <div class="flex p-1">
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-layout>
