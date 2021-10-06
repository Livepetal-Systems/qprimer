@if(Session::has('success'))
    <script type="text/javascript">
        setTimeout(function() {
            $("#refresh").fadeOut(1000);
        }, 3000);
    </script>
    <div id="refresh" class="alert bg-success alert-dismissible"  style="position:fixed; top:50px; right:15px; z-index:10000">
        <i class="icon fa fa-check text-white">  {{ Session::get('success') }}</i> 
    </div>
@endif

@if (session::has('error'))
    <script type="text/javascript">
        setTimeout(function() {
            $("#refresh").fadeOut(1000);
        }, 3000);
    </script>
    <div id="refresh" class="alert bg-danger" style="position:fixed; top:50px; right:15px; z-index:10000">
        <i class="icon fa fa-ban text-white">  {{ session::get('error') }}  </i>

        </div>

@endif