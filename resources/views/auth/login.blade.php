<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in &mdash; {{ config('admin.title') }}</title>
    <!-- CSS files -->
    <!-- CSS files -->
    <link href="{{ asset('admin/css/tabler.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-icons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-flags.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-payments.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-vendors.min.css')}}" rel="stylesheet" />
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>


</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <form class="card card-md" action="/post-login" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username or Email" name="username" required>
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                <circle cx="12" cy="16" r="1"></circle>
                                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                            </svg>
                        </span>
                        <input type="password" value="" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input name="remember" id="remember" value="remember" type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-warning w-100">Sign in</button>
                    </div>
                </div>
            </form>
            <!--
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div>
            -->
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/js/tabler.min.js')}}"></script>
    <script src="{{ asset('admin/js/demo.min.js')}}"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
        $(function () {
            $('#password').password()
        })

    </script>

</body>

</html>
