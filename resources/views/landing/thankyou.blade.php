<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thank you!</title>
    <link rel="stylesheet" href="{{ asset('thankyou/style.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1>Thank you !</h1>
                <p>Thanks for subscribing to our news letter. </p>
                <p>you should receive a confirmation email soon </p>
                <button class="go-home">
                    You will be redirected in 3 seconds
                </button>
            </div>
            <div class="footer-like">
                <p>Email not received?
                    <a href="/">Click here to send again</a>
                </p>
            </div>
        </div>
    </div>



    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
    <!-- partial -->

</body>

</html>

<script>
    setTimeout(function () {
        window.location.href = '/'; // the redirect goes here

    }, 3000);

</script>
