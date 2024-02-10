@extends('layouts.app')

@section('title', 'Edit Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></div>
                    <div class="breadcrumb-item">Edit Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Products</h2>



                <div class="card">
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Name<span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $product->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barcode</label>
                                                <input type="number"
                                                    class="form-control" name="barcode"
                                                    value="{{ old('barcode') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>HPP<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('hpp') is-invalid @enderror" name="hpp" value="{{ old('hpp', $product->hpp) }}">
                                                @error('hpp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}">
                                                @error('price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Stock<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}">
                                                @error('stock')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Category<span class="text-danger">*</span></label>
                                        <select class="form-control selectric @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                             @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label w-100">Status</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="1" class="selectgroup-input"
                                                    {{ $product->status == 1 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Active</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="0" class="selectgroup-input"
                                                    {{ $product->status == 0 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="food" class="selectgroup-input"
                                                    @if ($product->category == 'food') checked @endif>
                                                <span class="selectgroup-button">Food</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="drink" class="selectgroup-input"
                                                    @if ($product->category == 'drink') checked @endif>
                                                <span class="selectgroup-button">Drink</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="snack" class="selectgroup-input"
                                                    @if ($product->category == 'snack') checked @endif>
                                                <span class="selectgroup-button">Snack</span>
                                            </label>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image<span class="text-danger">*</span></label>
                                        <div id="image-preview"
                                            class="image-preview @if (session('error')) is-invalid @endif">
                                            <label id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                            <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-fluid image-tampil" alt="">
                                        </div>
                                        @if (session('error'))
                                            <div class="invalid-feedback">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
@endpush

