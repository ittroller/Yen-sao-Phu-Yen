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