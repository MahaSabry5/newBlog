{{--@extends('components.layout')--}}
{{--@section('content')--}}
<x-layout>
    @include('posts._Header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts" />
{{--        render pages links--}}
            {{$posts ->links()}}

        @else
            <p class="text-center">No posts yet,Please check later</p>
        @endif

    </main>
{{--    @if($posts->count())--}}
{{--        <x-post-special-card :post="$posts[0]" />--}}
{{--    class ='col-span-2'--}}
{{--        @if($posts -> count() > 1)--}}
{{--            <div class="lg:grid lg:grid-cols-6 ">--}}
{{--                @foreach($posts->skip(1) as $post)--}}
{{--                    <x-post_card :post="$post" class = {{$loop -> iteration < 3 ? "col-span-3":"col-span-2" }}/>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    @else--}}
{{--        <p class="text-center">No posts yet,Please check later</p>--}}
{{--    @endif--}}
{{--    @foreach ($posts as $post)--}}
{{--        <article>--}}

{{--            <h1>--}}
{{--                <a href="/posts/{{$post->slug}}">--}}
{{--                    {{$post->title}}--}}
{{--                </a>--}}
{{--            </h1>--}}
{{--            <p>--}}
{{--                By <a href = '/authors/{{$post->author->username}}'>{{$post ->author -> name}}</a> in  <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>--}}
{{--            </p>--}}
{{--            <div>--}}
{{--                {!! $post -> body !!}--}}

{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
</x-layout>
{{--@endsection--}}
