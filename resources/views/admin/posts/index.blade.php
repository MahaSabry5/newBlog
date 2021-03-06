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
        width:max-content;
    }

    .code-cell {
        /*width:50px;*/
        color:royalblue;
        width:200px;

    }

    .pop96-cell {
        /*text-align: right;*/
        width:max-content;

    }
    .edit{
        width: 50px;
        color:royalblue;
    }

    th {
        text-align: left;
    }

</style>
<x-adminLayout>

        <table>
            <thead>
            <tr>
                <th class="country_name-cell">Title</th>
                <th class="code-cell">Category</th>
                <th class="pop96-cell"> Author</th>
                <th class="edit"> </th>
                <th class="edit"> </th>



            </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Post::all() as $post)
                    <tr class="firstRow">
                        <td class="country_name-cell">{{$post->title}}</td>
                        <td class="code-cell">{{$post->category->name}}</td>
                        <td class="pop96-cell"> {{$post -> author -> name}}</td>
                        <td class="edit">
                            <a href="{{route('editPosts',[$post->id])}}">Edit</a>
                        </td>
                        <td class="edit">
{{--                            <a href="#">Delete</a>--}}
                            <form method="POST" action="{{route('deletePost',[$post->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-xs mt-3 text-gray-500">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-adminLayout>

