
<x-layout>
    <h1 class="text-lg font-bold pl-2 pb-2 mt-10 border-b ">
        Admin Management
    </h1>
    <section class="mx-auto lg:grid lg:grid-cols-5 gap-x-10 ">

        <div class="flex pt-6 pl-6 bg-blue-100 max-w-lg  ">

        <aside >
            <ul>
                <li>
                    <a href="{{route('adminPage')}}" class="{{request()->route()->named('adminPage')?"text-blue-500":""}}"> All Posts</a>
                </li>
                <li>
                    <a href="{{route('createPost')}}" class="{{request()->route()->named('createPost')?"text-blue-500":""}}">New Post</a>
                </li>
                <li>
                    <a href="{{route('users')}}" class="{{request()->route()->named('users')?"text-blue-500":""}}">Users</a>
                </li>
                <li>
                    <a href="{{route('categories')}}" class="{{request()->route()->named('categories')?"text-blue-500":""}}">Categories</a>
                </li>
            </ul>

        </aside>
        </div>
        <main class=" mt-10 bg-gray-100 p-6 relative rounded-xl flex-1 col-span-4 " >
            {{$slot}}
        </main>


    </section>
</x-layout>
