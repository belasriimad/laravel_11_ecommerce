@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="my-2">
                <a href="{{route('admin.photos.create')}}" class="btn btn-sm btn-dark">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Preview</th>
                        <th>Body</th>
                        <th>Price</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td>
                                <img src="{{ $photo->url }}" alt="photo" 
                                    width="60"
                                    height="60"
                                >
                            </td>
                            <td>
                                {{ $photo->body }} 
                            </td>
                            <td>
                                @if ($photo->is_free)
                                    <span class="badge bg-primary rounded-pill d-inline">
                                        Free    
                                    </span>    
                                @else 
                                    <span class="badge bg-danger rounded-pill d-inline">
                                        ${{$photo->price}}    
                                    </span>   
                                @endif
                            </td>
                            <td>{{ $photo->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('admin.photos.edit', $photo->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection