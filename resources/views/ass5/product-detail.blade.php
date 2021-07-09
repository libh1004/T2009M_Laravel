@extends("layout")
@section("page_title","Products")
@section("main")
    <h1 style="font-size: 20px">Product detail</h1>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>CategoryID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="{{url("product-detail")}}">Apple watch</a> </td>
                <td>4500</td>
                <td>1</td>
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
