@props(['comment'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form method="POST" action="{{route('deleteComment',[$comment->id])}}">
    @csrf
    @method('DELETE')
        <button class=" mt-5 space-y-6" style="float: right">
            <i class="fa fa-trash-o"  aria-hidden="true" data-fa-transform="shrink-8 right-6"  style="font-size:28px;color:grey"> </i>
        </button>
</form>
{{--/admin/posts/{{$comment->id}}--}}
