<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Siberavi - Dashboard') }}</title>

    <!-- Scripts -->
    
    <!-- Fonts -->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

	<div class="wrapper">
        
    @include('layouts.includes.sidebar')

    <div id="content">

      @include('layouts.includes.breadcrumbs')
  {{--  
    @if(session('info'))
        <div class="container">
            <div class="alert alert-{{ session('info')[0] }}" role="alert">
                <span style="cursor: pointer" class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                <strong class="pl-2">¡Exito!</strong> {{ session('info')[1] }}
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <span style="cursor: pointer" class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                <strong class="pl-2">¡ Error !</strong>
                <div class="pl-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            @if($error == 'validation.mimes')
                                <li>No podemos subir este tipo de archivo</li>    
                            @endif
                            @if($error == 'validation.max.file')
                                <li>El archivo excede al tamaño maximo permitido</li> 
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
--}}
      @yield('content')
      
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

      <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
      </script>
     
      @yield('scripts')
</body>
</html>
