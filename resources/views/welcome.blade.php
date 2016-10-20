<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="oknasir, Nasir, Mehmood, Nasir Mehmood, Resume, CV, visiting card of nasir, oknasir resume">
    <meta name="description" content="I have experience to develop websites and rest api from scratch. I also have much experience in facebook API, Amazon API, google analytical API, Paypal API, 2Checkout.">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="stylesheet" href="{{ elixir('css/resume.css') }}">

    <!-- Scripts -->
    <script>
        window.okVCard = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <ok-resume>Loading...</ok-resume>

    <!-- Scripts -->
    <script src="{{ elixir('js/resume.js') }}"></script>

    @if ( Config::get('app.debug') )
        <script type="text/javascript">
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
        </script>
    @endif
</body>
</html>
