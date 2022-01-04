<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Hello there!</h6>
                                    <p class="text-muted mt-2 mb-4">Please all available form</p>

                                    {{-- ALERT --}}
                                    <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
                                        <strong>Error!</strong> You should check in on some of those fields below.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>

                                    <form>
                                        <div class="form-group my-2">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea type="email" class="form-control" id="exampleInputEmail1"></textarea>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <button type="submit" class="btn btn-theme mt-4">Register</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Tokem</h4>
                                        <p class="lead text-white">Selling a variety of flowers that you like as gifts for loved ones!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary ml-1">Login</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

