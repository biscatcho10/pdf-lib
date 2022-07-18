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
        <!-- alert messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Online Events</h3>
                    </div>
                    <!-- create button -->
                    <div class="card-body">
                        <a href="{{ route('online-events.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Event Title</th>
                                    <th>Host Name</th>
                                    <th>Event Date</th>
                                    <th>Event time</th>
                                    <th>Duration</th>
                                    <th>Join Meeting</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->host_name }}</td>
                                        <td>{{ $event->start_time }}</td>
                                        <td>{{ $event->start_time }}</td>
                                        <td>{{ $event->duration }}</td>
                                        <td>
                                            <a href="{{ $event->join_url }}" target="_blank">Join Meeting</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('online-events.destroy', $event->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="meeting_id" value="{{ $event->meeting_id }}">
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
