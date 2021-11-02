@props(['post'])
<form method="POST" action="/posts/{{$post->slug}}/comments" class="rounded-xl border border-gray-200 p-6">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" width="40px" height="40px" class="rounded-full">
        <h2 class="ml-4">Want to participate!</h2>
    </header>
    <div class="mt-5">
        <textarea name="body" class="w-full text-am focus:outline-none focus:ring" rows="5" placeholder="Write a comment!!"></textarea>
        @error('body')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div >
    <div class="flex justify-end mt-6 border-t border-gray-200 pt-3">
        <button type="submit" class="uppercase font-semibold text-sm bg-blue-500 hover:bg-blue-600 text-white py-2 px-10 rounded-2xl">
            Post
        </button>
    </div>

</form>
