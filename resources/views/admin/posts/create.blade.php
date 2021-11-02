<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl ">
            <h1 class="text-lg font-bold mb-4 text-center">
                Publish new Post
            </h1>
            <form method="POST" action="/admin/posts" class="mt-10">
                @csrf
                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>

                <div class="mb-6 ">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>
                    <select class="border border-gray-400 p-2 w-full rounded" name="category_id" id="category_id" >
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                                    {{old('category_id')==$category->id ? 'selected' : ''}}
                            >{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-6 ">
                    <button type="submit" class="bg-blue-400 text-white py-2 px-4 rounded hover:bg-blue-500">
                        Publish
                    </button>
                </div>
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-1 ">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                @endif


            </form>
        </main>

    </section>
</x-layout>
