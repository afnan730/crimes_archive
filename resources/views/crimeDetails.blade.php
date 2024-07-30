@extends('layouts.master')

@section('content')
    <x-language-switcher />

    <div class="container mt-5">
        <div class="text-center">
            <svg width="38" height="32" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 30L35.3205 0H0.679491L18 30Z" fill="#823F42" />
            </svg>
            <h3 class="py-3 mt-2 ">{{ __('frontend.crime_details_title') }}</h3>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h4>{{ $crime->category->name }}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $crime->text }}</p>
                <p class="card-text" dir="rtl">
                    <strong>{{ __('frontend.translation') }}:</strong> {{ $crime->translation }}
                </p>

                <div class="media-container mt-4">
                    @if (Str::endsWith($crime->media, ['.mp4', '.avi', '.mov', '.wmv']))
                        <video class="w-75" controls>
                            <source src="{{ asset('storage/' . $crime->media) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <a href="{{ asset('storage/' . $crime->media) }}" download class="btn btn-dark mt-2 d-btn">
                            <i class="fas fa-download"></i>
                        </a>
                    @elseif (Str::endsWith($crime->media, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img class="img-fluid w-75" src="{{ asset('storage/' . $crime->media) }}" alt="Crime Media">
                        <a href="{{ asset('storage/' . $crime->media) }}" download class="btn btn-dark mt-2 d-btn ">
                            <i class="fas fa-download"></i>
                        </a>
                    @else
                        <p>{{ __('frontend.no_media_available') }}</p>
                    @endif


                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($crime->text) }}" class="btn btn-info mt-2"
                        target="_blank">
                        <i class="fab fa-twitter"></i> {{ __('frontend.share_on_twitter') }}
                    </a>

                </div>
            </div>
        </div>

        <a href="{{ route('archive', ['lang' => App::getLocale()]) }}" class="btn btn-dark">
            {{ __('frontend.back_to_archive') }}
        </a>
    </div>

    <style>
        .media-container {
            max-width: 50%;
            margin: auto;
        }

        .d-btn {
            background-color: #823F42;
            border: #823F42
        }

        video,
        img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
