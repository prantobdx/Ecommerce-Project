<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Customer-Login</title>
    <link href="{{asset('adminAsset')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form action="{{route('save-customer')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your name" />
                                                <label for="inputFirstName">Full name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="email" name="email" placeholder="enter your email" />
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="text" name="phone" placeholder="enter your email" />
                                        <label for="inputEmail">Phone</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="password" name="password" placeholder="set password" />
                                        <label for="inputEmail">Password</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Your Image</span>
                                        <input class="form-control p-3" id="inputEmail" type="file" name="image" placeholder="Image" />
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text">Address</span>
                                        <textarea class="form-control" aria-label="With textarea" cols="30" rows="6" name="address"></textarea>
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <input type="submit" class="btn btn-info form-control" value="Create Account">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{route('customer-login')}}">Have an account? Go to login</a></div>
                                <div class="small"><a href="{{route('/')}}">Back Home</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('adminAsset')}}js/scripts.js"></script>
</body>
</html>
