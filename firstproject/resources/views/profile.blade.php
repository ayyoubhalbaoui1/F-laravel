@extends('layouts.app')

@section('content')
{{-- <div class="container ">

    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">Simple table</h5>

            <img id="previewImg" src="{{url('/')}}/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">


            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="{{ route('profilePost') }}" id="formAjax" method="POST">
                <label>Update Profile Image</label>
                <br>
                <input type="file" id="exampleFile" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" id="buttonValide" name="buttonValide" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
</div>

    </div>
</div> --}}
<div class="container-login100" style="background-image: url('{{url('/')}}/uploads/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form method="POST" action="{{ route('profilePost',app()->getLocale()) }}" enctype="multipart/form-data">
            <span class="login100-form-title p-b-37">
                Edit Your Infos
            </span>
            <img id="previewImg" src="{{url('/')}}/uploads/avatars/{{ $user->avatar }}" style="width:130px; height:130px;  border-radius:50%;">
            <input type="file" id="exampleFile" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">



            @csrf

            <div class="form-group row">
                <label for="">User Name</label>
                <div class="wrap-input100">
                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="Name" autofocus>
                    <span class="focus-input100"></span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="">E-Mail Address</label>

                <div class="wrap-input100">
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="E-Mail Address">
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" id="buttonValide" name="buttonValide" class="login100-form-btn">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('customJS')
<script>
    $('#exampleFile').on("change", function(){
        console.log($(this).val());
	var inputImg = this;
	if (inputImg.files && inputImg.files[0]) {
        console.log("here");
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#previewImg').attr('src',e.target.result);
		};
		reader.readAsDataURL(inputImg.files[0]);
        console.log("here1");

	}
});


    </script>



@endsection
