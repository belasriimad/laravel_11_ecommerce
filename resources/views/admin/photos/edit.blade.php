@extends('admin.layouts.app')


@section('title')
    Edit Photo
@endsection


@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-white text-center">
                    <h5 class="mt-2 text-muted">Edit Photo</h5>
                </div>
                <div class="card-body">
                    @include('admin.layouts.alerts')
                    <form method="POST" action="{{route('admin.photos.update', $photo->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-outline mb-4">
                            <label class="form-label" for="body">Body</label>
                            <textarea rows="4" id="body" name="body"
                                class="form-control @error('body') is-invalid @enderror" autocomplete="off">{{$photo->body}}</textarea>
                            @error('body')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>    
                                </span>   
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-around">
                              <div class="form-check">
                                <input class="form-check-input" 
                                    onchange="checkIfFree(0)"
                                    type="radio" name="is_free" 
                                    id="free" 
                                    value="1" @checked($photo->is_free) />
                                <label class="form-check-label" for="free"> Free </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" 
                                    onchange="checkIfFree(1)"
                                    type="radio" name="is_free" 
                                    id="paid" 
                                    value="0" @checked(!$photo->is_free)/>
                                <label class="form-check-label" for="paid"> Paid </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-outline {{$photo->is_free ? 'd-none' : ''}} mb-4" id="priceField">
                            <label class="form-label" for="price">Price</label>
                            <input type="number" id="price" 
                                value="{{$photo->price}}" name="price" min="1" class="form-control"/>
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm">
                            submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function checkIfFree(value) {
            if(value) {
                document.getElementById('priceField').classList.remove('d-none');
            }else {
                document.getElementById('priceField').classList.add('d-none');
            }
        }
    </script>
@endsection