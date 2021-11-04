<x-adminLayout>

    <h1 class="text-lg font-bold mb-4 text-center">
        Edit Post
    </h1>
    <form method="POST" action="{{route('updatePost',[$post->id])}}" class="mt-10">
        @csrf
        @method('Patch')
        <x-form.input name="title" :value="$post->title"/>
        <x-form.input name="slug" :value="$post->slug"/>
        <x-form.textarea name="excerpt" >{{old('excerpt',$post->excerpt)}}</x-form.textarea>
        <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>

        <div class="mb-6 ">
            <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Category
            </label>
            <select class="border border-gray-400 p-2 w-full rounded" name="category_id" id="category_id" >
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}"
                        {{old('category_id' ,$post->category_id)==$category->id ? 'selected' : ''}}
                    >{{ucwords($category->name)}}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-6 ">
            <button type="submit" class="bg-blue-400 text-white py-2 px-4 rounded hover:bg-blue-500">
                Update
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
</x-adminLayout>

