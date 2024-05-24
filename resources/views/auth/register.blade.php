@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>    
                                </span>   
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>    
                                </span>   
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>    
                                </span>   
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
