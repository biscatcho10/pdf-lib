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

<body class="antialiased">
    <div class="container p-5">
        <form action="">
            <div class="form-group">
                <label> Country </label>
                <select name="country" class="form-control" id="country">
                    @foreach ($countries as $country)
                        <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group my-3">
                <label> State </label>
                <select name="state" class=" form-control" id="state"></select>
            </div>

            <div class="form-group my-3">
                <label> City </label>
                <select name="city" class=" form-control" id="city"></select>
            </div>

            <div class="form-group my-3">
                <label> Timezone </label>
                <select name="timezone" class=" form-control" id="timezone"></select>
            </div>

            <div class="form-group my-3">
                <label> Currency </label>
                <select name="currency" class=" form-control" id="currency"></select>
            </div>

        </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        var base_url = window.location.origin;

        // get the state
        $("#country").on("change", function() {
            let country_id = $("#country").val();
            let url = base_url + "/country/" + country_id;
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    console.log(response);
                    let states = response.states;
                    let timezones = response.timezones;
                    let currencies = response.currencies;

                    $("#state").empty();
                    $("#state").append('<option>Select State</option>');
                    states.forEach(state => {
                        $("#state").append('<option value="' + state['id'] + '">' +
                            state['name'] + '</option>');
                    });

                    $("#timezone").empty();
                    $("#timezone").append('<option>Select Timezone</option>');
                    timezones.forEach(timezone => {
                        $("#timezone").append('<option value="' + timezone['id'] + '">' +
                            timezone['name'] + '</option>');
                    });

                    $("#currency").empty();
                    currencies.forEach(currency => {
                        $("#currency").append('<option value="' + currency['id'] + '">' +
                            currency['name'] + '</option>');
                    });
                }
            });
        });

        // get the city
        $("#state").on("change", function() {
            let state_id = $("#state").val();
            let url = base_url + "/state/" + state_id;
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    console.log(response);
                    let cities = response.cities;
                    let html = "";
                    $("#city").empty();
                    $("#city").append('<option>Select City</option>');
                    cities.forEach(city => {
                        $("#city").append('<option value="' + city['id'] + '">' +
                            city['name'] + '</option>');
                    });
                }
            });
        });
    });
</script>
