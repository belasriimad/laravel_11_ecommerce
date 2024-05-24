@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <!-- Gallery -->
    <div class="row my-4">
        @foreach ($photos as $photo)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <a href="{{route('photos.show', $photo->id)}}">
                    <img
                        src="{{asset($photo->url)}}"
                        class="w-100 shadow-1-strong rounded mb-4 thumbnail"
                        height="300"
                        alt="{{$photo->url}}"
                    />
                </a>
            </div>
        @endforeach
    </div>
    <!-- Gallery -->
@endsection