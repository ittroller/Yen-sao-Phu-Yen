<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('backend.master.head')
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('backend.master.header')
        @include('backend.master.leftmenu')
        <div class="content-wrapper" style="min-height:239px;">
            <section class="content-header">
                <h1>
                    @yield('trang')
                    <small>@yield('tacvu')</small>
                </h1>
            </section>
            @yield('content')
        </div>
                
        <div class="control-sidebar-bg"></div>
        @include('backend.master.footer')
    </div>

        @include('backend.master.script')
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