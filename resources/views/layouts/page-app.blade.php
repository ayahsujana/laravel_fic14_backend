<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    {{-- <meta name="csrf-token" content="">

    <!-- Tab Icon -->
    <link rel="shortcut icon" href=""> --}}

    <!-- Title Tag  -->
    <title>Kape POS</title>

    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <!-- Summer notes -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <!-- Date Time Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <!-- base_url -->
    {{-- <input type="hidden" value="{{URL('localhost8000')}}" id="base_url"> --}}

    <!-- Custom Style -->
    <style>
        /* Select 2 DropDown */
        .select2-container .select2-selection--single {
            border: 1px solid #f5f5f5;
            background: #fdfdfd;
            border-radius: 8px;
            padding: 8px;
            font-size: 14px;
            height: auto !important;
        }

        .select2-container .select2-selection--multiple {
            border: 1px solid #f5f5f5;
            background: #fdfdfd;
            border-radius: 8px;
            padding: 8px;
            font-size: 14px;
            height: auto !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #4e45b8 !important;
        }
    </style>

    <!--Custom Script-->
    <script>
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'
        var serverEnvironment = '<?php echo env('APP_ENV'); ?>'
        var currentRouteName = '<?php echo request()->route()->getName(); ?>'
    </script>
</head>

<body>

    @yield('content')

    <div style="display:none" id="dvloader"><img src="{{ asset('assets/imgs/loading.gif')}}" /></div>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Jquery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatable -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/js.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/js/toastr.min.js')}}"></script>
    <!-- chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Chunk JS -->
    <script src="{{ asset('/assets/js/plupload.full.min.js')}}"></script>
    <script src="{{ asset('/assets/js/common.js')}}"></script>
    <!-- Data Time Picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Export Files LInk (PDF, CSV, MS-Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <!-- Summer notes -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Sortable -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script>
        // Counter
        $('.counting').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            countTo = getVal(countTo);

            $(this).prop('Counter', 0).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                },
                complete: function() {
                    $this.text($this.attr('data-count'));
                }
            });
        });

        function getVal(val) {

            multiplier = val.substr(-1).toLowerCase();

            if (multiplier == "k")
                return parseFloat(val) * 1000;
            else if (multiplier == "m")
                return parseFloat(val) * 1000000;
            else if (multiplier == "b")
                return parseFloat(val) * 1000000000;
            else if (multiplier == "t")
                return parseFloat(val) * 1000000000000;
            else
                return val;
        }

        function get_responce_message(resp, form_name = "", url = "") {
            if (resp.status == '200') {
                toastr.success(resp.success);
                if (form_name != "") {
                    document.getElementById(form_name).reset();
                }
                if (url != "") {
                    setTimeout(function() {
                        window.location.replace(url);
                    }, 500);
                }
            } else {
                var obj = resp.errors;
                if (typeof obj === 'string') {
                    toastr.error(obj);
                } else {
                    $.each(obj, function(i, e) {
                        toastr.error(e);
                    });
                }
            }
        }

        // Toastr MSG Show
        @if(Session::has('error'))
        toastr.error('{{ Session::get("error") }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get("success") }}');
        @endif

        // Image Upload Preview Add
        $('#imageUpload').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr("src", e.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        // Image Upload Preview Edit (Model)
        $('#imageUploadModel').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreviewModel').attr("src", e.target.result);
                    $('#imagePreviewModel').hide();
                    $('#imagePreviewModel').fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        // Image Upload Preview Add (Landscape)
        $('#imageUploadLandscape').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreviewLandscape').attr("src", e.target.result);
                    $('#imagePreviewLandscape').hide();
                    $('#imagePreviewLandscape').fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        // Image Upload Preview Add Model (Landscape)
        $('#imageUploadLandscapeModel').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreviewLandscapeModel').attr("src", e.target.result);
                    $('#imagePreviewLandscapeModel').hide();
                    $('#imagePreviewLandscapeModel').fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>

    @yield('pagescript')
</body>

</html>
