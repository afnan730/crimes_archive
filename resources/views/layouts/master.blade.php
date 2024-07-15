<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Zionists Crimes Archive</title>
    <style>
        body {
            background-image: url('{{ asset('storage/themes/backgroundL.png') }}');
            padding-top: 3%;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image-container {
            width: 100%;
            height: 150px;
            /* Set a fixed height */
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        @media only screen and (max-width: 1650px) {
            body {
                background-image: url('{{ asset('storage/themes/backgroundM.png') }}');
            }
        }

        .image-container {
            width: 100%;
            height: 8rem;
            /* Set a fixed height */
            overflow: hidden;
        }

        @media only screen and (max-width: 500px) and (max-height: 932px) {
            body {
                background-image: url('{{ asset('storage/themes/phone-background.png') }}');
            }

            .image-container {
                width: 100%;
                height: 6rem;
                /* Set a fixed height */
                overflow: hidden;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
