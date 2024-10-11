<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ organizationDetails('name') }}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="{{ organizationDetails('name') }}">
    <meta name="author" content="Tanbir Ahmed">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ imagePath(organizationDetails('favicon')) }}">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800',
                    'Oswald:300,400,500,600,700,800'
                ]
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset('porto') }}/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('porto') }}/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('porto') }}/assets/css/demo4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('porto') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('porto') }}/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('porto') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('porto') }}/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

    <!-- Plugins JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="{{ asset('porto') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('porto') }}/assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('porto') }}/assets/js/main.min.js"></script>
</head>
