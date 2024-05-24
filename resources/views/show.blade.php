@extends('layouts.app')

@section('title')
    Image Details
@endsection

@section('content')
    <!-- Gallery -->
    <div class="row my-4">
        <div class="col-lg-6 col-md-8 mb-4">
            <img
                src="{{asset($photo->url)}}"
                class="w-100 h-100 shadow-1-strong rounded mb-4"
                alt="{{$photo->url}}"
            />
        </div>
        <div class="col-lg-6 col-md-4">
            <div class="d-flex flex-column justify-content-start">
                <div class="d-flex justify-content-start align-items-center">
                    <img
                        src="{{$photo->admin->image}}"
                        class="img-fluid rounded me-3"
                        width="60"
                        height="60"
                        alt="Profile image"
                    />
                    <div class="d-flex flex-column justify-content-start">
                        <span class="fw-bold">
                            {{$photo->admin->name}}
                        </span>
                        @if (!$photo->is_free)
                            <span class="text-danger fw-bold">
                                ${{$photo->price}}
                            </span>
                        @endif
                    </div>
                </div>
                <p class="mt-2">
                    <i class="text-muted">
                        {{$photo->body}}
                    </i>
                </p>
                <div class="mt-2">
                    @if ($photo->is_free)
                        <a href="{{asset($photo->url)}}" 
                            class="btn btn-dark btn-sm" download>
                            Download
                        </a>
                    @else 
                        @guest
                            <a href="{{route('login')}}" 
                                class="btn btn-dark btn-sm">
                                Buy image
                            </a>
                        @endguest
                        @auth
                            @if ($photo->orders()->where([
                                'user_id' => auth()->user()->id,
                                'photo_id' => $photo->id
                            ])->exists())
                                <a href="{{asset($photo->url)}}" 
                                    class="btn btn-dark btn-sm" download>
                                    Download
                                </a>
                            @else 
                                <a href="{{route('order.pay', $photo->id)}}" 
                                    class="btn btn-dark btn-sm">
                                    Buy image
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery -->
@endsection