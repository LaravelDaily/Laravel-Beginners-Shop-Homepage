@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">New Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            Name:
            <br />
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
            <br />

            Price ($):
            <br />
            <input type="text" name="price" value="{{ old('price') }}" class="form-control" />
            <br />

            Description:
            <br />
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            <br />

            Category:
            <br />
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <br />

            Photo:
            <br />
            <input type="file" name="photo" />
            <br /><br />

            <input type="submit" class="btn btn-primary" value="Save" />
            <br /><br />
        </form>

    </div>
    <!-- /.col-lg-12 -->
@endsection
