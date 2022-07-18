<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- validation error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Event</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('online-events.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" id="duration" name="duration"
                                            placeholder="Duration">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="host_name">Host Name</label>
                                        <input type="text" class="form-control" id="host_name" name="host_name"
                                            placeholder="Host Name">
                                    </div>

                                    <input type="hidden" name="host_id" value="1">

                                    <button type="submit" class="btn btn-primary my-2 float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
