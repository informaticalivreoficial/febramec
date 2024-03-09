
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="alternate" type="application/rss+xml" title="Youko &raquo; Feed" href="http://webdesign-finder.com/youko/feed/" />
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />        
    <meta name="author" content="Renato Montanari"/>
    <meta name="copyright" content="{{ $tenant->init_date }} {{ $tenant->name }}">        

    {!! $head ?? '' !!}
		
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('css')
        @yield('css')
    @endif
</head>

<body>
	
    

    @yield('content')            

    @hasSection('js')
        @yield('js')
    @endif

    
</body>
</html>