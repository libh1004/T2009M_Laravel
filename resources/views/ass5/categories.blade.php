@extends("layout")
@section("page_title","Categories")
@section("main")
    <div class="card-header">
        <h1 class="card-title" style="font-size: 20px">Categories</h1>
        <div class="card-tools">
            <h1 style="font-size: 20px"><a href="{{url("create-category")}}">Add new category</a></h1>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td><a href="{{url("category-detail")}}">Watch</a> </td>
                <td>fashion</td>
                <td><a href="{{url("edit-category")}}">Edit</a> </td>
                <td><a href="{{url("categories")}}">Delete</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="{{url("category-detail")}}">Laptop</a></td>
                <td>fashion</td>
                <td><a href="{{url("edit-category")}}">Edit</a> </td>
                <td><a href="{{url("categories")}}">Delete</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td><a href="{{url("category-detail")}}">Smartphone</a></td>
                <td>fashion</td>
                <td><a href="{{url("edit-category")}}">Edit</a> </td>
                <td><a href="{{url("categories")}}">Delete</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td><a href="{{url("category-detail")}}">Fan</a></td>
                <td>fashion</td>
                <td><a href="{{url("edit-category")}}">Edit</a> </td>
                <td><a href="{{url("categories")}}">Delete</a></td>
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
