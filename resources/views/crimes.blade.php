<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Israeli Occupation Crimes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .hero {
            background-image: url('{{ asset('storage/images/' . $category->image) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 20%;
            width: 100%;
        }

        .counter-card {
            width: 100px;
            height: 35px;
            background: rgba(217, 217, 217, 0.74);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .counter-card h6 {
            color: #620206;
        }

        .card-area {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;

        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="hero  d-flex flex-column align-items-center " style="">
        <h2 class="text-light mt-5 mb-1"> {{ $category->name }}</h2>

        <div class="counter-card mt-2 mb-5">
            <h6>{{ count($category->crimes) }}</h6>

        </div>
    </div>

    <div>

        <div class="card-area">
            @foreach ($category->crimes as $crime)
                <x-card :crime="$crime" />
            @endforeach
        </div>


    </div>
</body>

</html>
