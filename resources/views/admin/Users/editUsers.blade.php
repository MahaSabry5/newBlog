<x-adminLayout>

    <h1 class="text-lg font-bold mb-4 text-center">
        Edit User
    </h1>
    <form method="POST" action="{{route('updateUser',[$user->id])}}" class="mt-10">
        @csrf
        @method('Patch')
        <x-form.input name="name" :value="$user->name"/>
        <x-form.input name="username" :value="$user->username"/>
        <x-form.input name="email" :value="$user->email"/>

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

