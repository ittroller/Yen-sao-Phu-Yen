<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Shop">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Cao Kha Minh">
        <title>Shop</title>

        @include('backend.auth.thanhphan.head')

    </head>
    <body class="hold-transition {{$page}}">


        @yield('content')

        
        @include('backend.auth.thanhphan.script')

        <script>
            $(function () {
                $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
                });
            });
        </script>
        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
    </body>

</html>