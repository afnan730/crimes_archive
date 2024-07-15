@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-end ">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark btn-sm">Logout</button>
        </form>
    </div>
    <div class="container font-sans-serif" style="font-family: Tahoma;">


        <div class="row justify-content-center
        text-gray-800">

            <svg class="my-2" width="32" height="26" viewBox="0 0 36 30" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M18 30L35.3205 0H0.679491L18 30Z" fill="#823F42" />
            </svg>
            <div class="col-md-6">
                <h4 class="text-center mb-4">Add To Archive</h4>
                <div class="custom-card p-4 ">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form class="border border-light p-5" action="{{ route('crimes.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Media</label>
                            <input type="file" class="form-control" name="media">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Text</label>
                            <input type="text" class="form-control" name="text">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Translation</label>
                            <textarea name="translation" class="form-control"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn-custom btn btn-primary"
                                style="background-color: #823F42; border-color: #823F42; color: white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
