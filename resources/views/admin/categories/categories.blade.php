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
        width:100px;
    }

    .code-cell {
        /*width:50px;*/
        color:royalblue;
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
                <th class="country_name-cell">Name</th>
                <th class="code-cell">Slug</th>

            </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Category::all() as $category)
                    @if($category->id !== 1)

                        <tr class="firstRow">
                        <td class="country_name-cell">{{$category->name}}</td>
                        <td class="code-cell">{{$category->slug}}</td>
                        <td class="edit">
                            <a href="{{route('editCategory',[$category->id])}}">Edit</a>
                        </td>
                        <td class="edit">
                            {{--                            <a href="#">Delete</a>--}}
                            <form method="POST" action="{{route('deleteCategory',[$category->id])}}">
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

