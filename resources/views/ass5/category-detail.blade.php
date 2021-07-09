@extends("layout")
@section("page_title","Categories")
@section("main")

    <h1 style="font-size: 20px">Category detail</h1>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>no
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td><a href="{{url("products")}}">Watch</a></td>
                <td>fashion</td>
            </tr>
            </tbody>
        </table>
    </div>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>

@endsection
