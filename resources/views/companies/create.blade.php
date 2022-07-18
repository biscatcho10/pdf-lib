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
                        <h3>Create Company</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('companies.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="address_address">Address</label>
                                        <input type="text" id="address-input" name="address_address"
                                            class="form-control map-input">
                                        <input type="hidden" name="address_latitude" id="address-latitude"
                                            value="0" />
                                        <input type="hidden" name="address_longitude" id="address-longitude"
                                            value="0" />
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
    async defer></script>
<script src="{{ asset('js/map2.js') }}"></script>

</html>
