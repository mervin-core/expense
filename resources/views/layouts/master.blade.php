<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/library/alertify/alertify.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/eClinic-sidebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/underscore.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/library/alertify/alertify.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/custom-js/global/global.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/custom-js/utility/util.js') }} "></script>
    {{-- CDN --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    @yield('styles')
    @yield('scripts')
    <script type="text/javascript">
        function openNotifications(){
            var notif = document.getElementById("notificationDiv");

            if(notif.style.display === "block"){
                notif.style.display = "none";
            } else{
                notif.style.display = "block";
            }
        }

</script>

</head>

<body>

    <!-- Navbar -->
    @include('layouts.header')

    <!-- Sidebard -->
    @include('layouts.sidebar')
    @yield('content')
    <!-- Main Content -->
    

        <!-- Session flash -->
        @if(Session::has('success')) 
          <div class="alert alert-success alert-dismissible fade show fixed-bottom global-alert" role="alert">
            @if(is_array(Session::get('success')))
              <strong>
                <ul class="my-0">
                  @foreach(Session::get('success') as $message)
                    <li>{{ $message }}</li>
                  @endforeach
                </ul>
              </strong>
            @else
              <strong><p class="my-0">{{ Session::get('success') }}</p></strong>
            @endif
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif

       <!-- FADE OUT --> 
    <script>
        $("document").ready(function(){
          setTimeout(function(){
            $('.global-alert').remove();
          }, 5000 ); // 5 secs
        });
      </script>
        <!-- END SCRIPT -->
        {{-- @include('layouts.global-link') --}}
</body>

</html>