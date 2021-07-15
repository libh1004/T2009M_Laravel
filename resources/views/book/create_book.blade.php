
@extends("layout")
@section("page_title","Books")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <form action="{{url("/books/save-book")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>AuthorId</label>
                            <input type="number" name="authorId" class="form-control" value="{{old("authorId")}}"/>
                            @error("authorId")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-capitalize">Title</label>
                            <input type="text" name="title" class="form-control" value="{{old("title")}}"/>
                            @error("title")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="color" class="form-control" value="{{old("isbn")}}"/>
                        </div>
                        <div class="form-group">
                            <label>Pub_year</label>
                            <input type="number" name="pub_year" class="form-control" value="{{old("pub_year")}}"/>
                        </div>
                        <div class="form-group">
                            <label>Available</label>
                            <input type="number" name="available" class="form-control" value="{{old("available")}}"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection








