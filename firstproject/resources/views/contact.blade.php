@extends('layouts.app')
@section('content')

<style>
    .invalid-feedback {
        display: block;
    }
</style>

<div class="container">
    <h1>Contact Us</h1>
    <div class="row">
        <div class="col-md-6">

            @if (Session::has('flash_message'))

                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>

            @endif

            <form method="POST" action="{{ route('contact.store') }}">

                @csrf

                <div class="form-group">
                    <label for="">Full Name:</label>
                    <input type="text" class="form-control" name="name">

                    @if ($errors->has ('name'))
                     <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                    @endif

                </div>
                <div class="form-group">
                    <label for="">Email Adresse:</label>
                    <input type="text" class="form-control" name="email">

                    @if ($errors->has ('email'))
                     <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                    @endif

                </div>
                <div class="form-group">
                    <label for="">Message:</label>
                        <textarea name="message" class="form-controll" ></textarea>

                    @if ($errors->has ('message'))
                     <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                    @endif


                    </div>
                    <button class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>




@endsection
