@extends("layout")
@section("page_title","Products")
@section("main")
    <div class="card-header">
        <h1 class="card-title" style="font-size: 20px">Products</h1>
        <div class="card-tools">
            <h1 style="font-size: 20px"><a href="{{url("create-product")}}">Add new product</a> </h1>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>CategoryID</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Apple watch 1</td>
                <td>4500</td>
                <td>1</td>
                <td><a href="{{url("edit-product")}}">Edit</a> </td>
                <td><a href="{{url("products")}}">Delete</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Apple watch 2</td>
                <td>3400</td>
                <td>1</td>
                <td><a href="{{url("edit-product")}}">Edit</a> </td>
                <td><a href="{{url("products")}}">Delete</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Apple watch 3</td>
                <td>3450</td>
                <td>1</td>
                <td><a href="{{url("edit-product")}}">Edit</a> </td>
                <td><a href="{{url("products")}}">Delete</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Apple watch 4</td>
                <td>8890</td>
                <td>1</td>
                <td><a href="{{url("edit-product")}}">Edit</a> </td>
                <td><a href="{{url("products")}}">Delete</a></td>
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

