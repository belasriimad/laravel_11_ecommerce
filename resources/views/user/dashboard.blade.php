@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <table class="table align-middle mb-0 bg-white caption-top">
                <caption class="fw-bold">
                    My Orders
                </caption>
                <thead class="bg-light">
                    <tr>
                        <th>Photo</th>
                        <th>Purchased</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @foreach (auth()->user()->orders as $order)
                            @foreach ($order->photos as $photo)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset($photo->url)}}"
                                                width="45"
                                                height="45"
                                                class="rounded-circle"    
                                                alt="" srcset="">
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success rounded-pill d-inline">
                                            {{$order->created_at->diffForHumans()}}    
                                        </span>  
                                    </td>
                                    <td>
                                        <a href="{{asset($photo->url)}}" 
                                            class="btn btn-sm btn-dark" download>
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
@endsection