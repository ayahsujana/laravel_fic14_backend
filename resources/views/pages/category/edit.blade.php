@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Category</a></div>
                    <div class="breadcrumb-item">Edit Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Update Category</h2>



                <div class="card">
                    <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name Category<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $category->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Image URL</label>
                                <input type="text"
                                    class="form-control @error('image')
                                is-invalid
                            @enderror"
                                    name="image" value="{{ $category->image }}">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label>Image<span class="text-danger">*</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="image" id="image-upload" accept=".png, .jpg, .jpeg" />
                                        <label id="image-label" title="Select File"></label>
                                    </div>
                                    <div id="avatar-preview">
                                        <img src="{{ asset('uploads/category/'.$category->image) }}" alt="upload_img.png" id="image-preview">
                                    </div>
                                </div>
                                <label class="mt-3 text-gray">Maximum size 2MB.</label>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo Category</label>
                                    <div id="image-preview"
                                        class="image-preview @if (session('error')) is-invalid @endif">
                                        <label id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                        <img src="{{ Storage::url('products/'.$category->image) }}" class="img-fluid image-tampil" alt="">
                                    </div>
                                    @if (session('error'))
                                        <div class="invalid-feedback">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Description</label>
                                <textarea type="text"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror" data-height="100"
                                    name="description">{{ $category->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
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
@endpush
