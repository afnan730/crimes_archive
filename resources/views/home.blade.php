@extends('layouts.master')

@section('content')
    <div class="text-center">
        <h3 class="py-5 mt-3">أرشيف جرائم الاحتلال الإسرائيلي بحق فلسطين</h3>
    </div>
    <div class="row mt-6 my-2">
        @foreach ($categories as $category)
            <div class="col-md-3 col-4 text-center my-2">
                <a href="{{ route('crimes', $category->name) }}">
                    <img src="1.jpg" class="rounded w-75 " alt="">
                    <h5 class="py-2">{{ $category->name }}</h5>
                </a>
            </div>
        @endforeach


    </div>
@endsection
