<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Aqua Tani</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset ('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/selectFX/css/cs-skin-elastic.css')}}" />
    <link rel="stylesheet" href="{{ asset ('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{ asset ('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <style>
        /* additional css to preview image */
        .image-preview {
            width: 200px;
            height: 200px;
            border: 1px solid #ccc;
            padding: 5px;
            margin-top: 10px;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }

        .hidden {
            display: none;
        }
    </style>


    <link rel="stylesheet" href="{{ asset ('admin/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    @include('admin.layout.left-panel')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('admin.layout.header')
        @yield('content')
    </div><!-- /#right-panel -->

    <!--End of Right Panel -->

    <script src="{{ asset ('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('/admin/assets/js/main.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset ('/admin/assets/js/dashboard.js')}}"></script>
    <script src="{{ asset ('/admin/assets/js/widgets.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    <script src="{{ asset ('/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset ('/admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset ('/admin/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#resp'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#exp'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#ben'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Include the JavaScript code -->
    <script>
        // Get the file input element and the preview image element
        const fileInput = document.getElementById('pfp');
        const previewImage = document.getElementById('preview-image');

        // Add an event listener to the input field
        fileInput.addEventListener('change', function(e) {
            // Get the selected file
            const file = e.target.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader
                const reader = new FileReader();

                // Set the image source once it's loaded
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    previewImage.classList.remove('hidden'); // Show the image
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, hide the image
                previewImage.src = '#';
                previewImage.classList.add('hidden');
            }
        });
    </script>
</body>

</html>