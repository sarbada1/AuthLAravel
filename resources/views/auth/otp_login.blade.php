<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login-Otp Page</title>
</head>
<body>

<div class="container ">
    <div class="row justify-content-center">
        @include('nav')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Login with OTP</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">     
                  
                    @csrf                 
                    <div class="form-group">
                        <label for="mobile_no">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{old('mobile_no')}}" autofocus placeholder="Enter your registered mobile number" >
                        <span class="text-danger">@error('mobile_no')
                            {{$message}}
                        @enderror</span>
                    </div>
                   
                        
                        <button type="submit" class="btn btn-primary">Generate OTP</button>
                    </form>
                    
                    
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
