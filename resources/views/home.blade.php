@extends('layouts.master')

@section('content')
    <div class="text-center">
        <svg width="38" height="32" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 30L35.3205 0H0.679491L18 30Z" fill="#823F42" />
        </svg>
        <h3 class="py-3 mt-2">أرشيف جرائم الاحتلال الإسرائيلي بحق فلسطين</h3>
    </div>
    <div class="row my-2">
        @foreach ($categories as $category)
            <div class="col-md-3 col-4 text-center my-2">
                <a href="{{ route('crimes', $category->name) }}" class="text-decoration-none text-dark">
                    <div class="image-container">
                        <img src="{{ asset('storage/images/' . $category->image) }}" width="100%" class="rounded w-75 "
                            alt="">
                    </div>
                    <h5 class="py-2">{{ $category->name }}</h5>
                </a>
            </div>
        @endforeach


    </div>
@endsection
