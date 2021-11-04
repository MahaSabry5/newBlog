        <style type="text/css">

            body {
                width:100%;
                margin:20px auto;
                font-family: arial;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            table td {
                font-size: 12px;
                padding:10px 0;
                border-bottom:1px solid #ddd;
            }

            .country_name-cell {
                width:200px;
            }

            .code-cell {
                /*width:50px;*/
                color:royalblue;
                width:200px;

            }
            .edit{
                width: 50px;
                color:royalblue;
            }
            .pop96-cell {
                /*text-align: right;*/
                width:max-content;

            }

            th {
                text-align: left;
            }

        </style>
        <x-adminLayout>

        <table>
            <thead>
            <tr>
                <th class="country_name-cell">Name</th>
                <th class="code-cell">username</th>
                <th class="pop96-cell"> email</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\User::all() as $user)
{{--                don't show admin info--}}
                @if($user->id !== 1)
                    <tr class="firstRow">
                        <td class="country_name-cell">{{$user->name}}</td>
                        <td class="code-cell">{{$user->username}}</td>
                        <td class="pop96-cell"> {{$user->email}}</td>
                        <td class="edit">
                            <a href="{{route('editUsers',[$user->id])}}">Edit</a>
                        </td>
                        <td class="edit">
                            {{--                            <a href="#">Delete</a>--}}
                            <form method="POST" action="{{route('deleteUser',[$user->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-xs mt-3 text-gray-500">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </x-adminLayout>

