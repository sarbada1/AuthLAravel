<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registration Page</title>
</head>
<body>

<div class="container ">
    <div class="row justify-content-center">
        @include('nav')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('register.user')}}" method="POST">  
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
                            <span class="text-danger">@error('username')
                                {{$message}}
                            @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" >
                            <span class="text-danger">@error('email')
                                {{$message}}
                            @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile_no" value="{{old('mobile_no')}}" >
                            <span class="text-danger">@error('mobile_no')
                                {{$message}}
                            @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            <span class="text-danger">@error('password')
                                {{$message}}
                            @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" >
                            <span class="text-danger">@error('confirmPassword')
                                {{$message}}
                            @enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                    <a href="/login" class="mt-3">Already have account !!! Login Here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
