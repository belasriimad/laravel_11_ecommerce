@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
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