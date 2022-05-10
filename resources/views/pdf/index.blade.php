<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" type="text/css" href="{{ asset('pdf-assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pdf-assets/css/font-awesome.css') }}">



</head>

<body>
    @dd(asset($file), asset('pdf-assets/pdf/book2.pdf'))
    <input type="hidden" id="url" value="{{ asset($file) }}">
    <div id="container">
        <p>Real 3D Flipbook has lightbox feature - book can be displayed in the same page with lightbox effect.</p>
        <p>Click on a book cover to start reading.</p>
        <img src="images/book2/thumb1.jpg" />
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="{{ asset('pdf-assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
        let url = $('#url').val();
        console.log(url);
        $(document).ready(function() {
            $("#container").flipBook({
                pdfUrl: url,
                rightToLeft: true,
            });
        })
    </script>
</body>

</html>
