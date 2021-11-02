@props(['comment'])
<article class="flex bg-gray-100 rounded-xl border border-gray-200 p-6 space-x-6">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?id={{$comment->id}}" width="60px" height="60px" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}}</h3>
            <h3 class="text-xs">
                Posted
                <time>{{$comment->created_at}}</time>
            </h3>

        </header>
        <p>
            {{$comment->body}}
        </p>
    </div>

</article>
