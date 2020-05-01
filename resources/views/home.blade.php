@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route("post") }}" method="post">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Post</span>
                            </div>
                            <textarea class="form-control" name="post" aria-label="With textarea"></textarea>
                        </div>
                        @error('post')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input class="form-control btn btn-primary mt-3" type="submit" value="Post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
