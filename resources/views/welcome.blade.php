<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}'s resume with Content Management</title>
    <meta name="keywords" content="oknasir, Nasir, Mehmood, Nasir Mehmood, Resume, CV, Curriculum Vitae, nasir, mehmood, nasir mehmood, nasir mehmood resume, nasir mehmood curriculum vitae with cms, nasir mehmood resume with cms, nasir mehmood cv, nasir mehmood cv with cms, resume, oknasir resume, cv, oknasir cv, curriculum vitae, oknasir curriculum vitae, visiting card of nasir, oknasir resume, Content Management, CMS, content management, cms">
    <meta name="description" content="I have experience to develop websites and rest api from scratch. I also have much experience in facebook API, Amazon API, google analytical API, Paypal API, 2Checkout. I also like to play new techniques of designing webpage and backend. Every day I learn a new technique in web development and I am learning it from last 5 years.">

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

    @if(session()->has('info'))
        <div class="ui ignored info message">{{ session('info') }}</div>
    @endif

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
