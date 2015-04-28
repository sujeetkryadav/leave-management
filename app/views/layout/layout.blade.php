<!DOCTYPE html>
<html>
    <head>
        <title id="notification_count_titlebar">
            
               @yield('title')
             </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--- Comment : This Section Belongs to Css include Start  --}}

        @include('layout.content_css')
        

        {{--- This Section Belongs to Css include End  --}}
    </head>

    <body>
    <div id="wrapper">
        @if($title!='signup' && $title!='login')
        {{---  This Section Belongs to Header Top Navigation include Start  --}}
        @include('layout.top_navigation')
        @include('layout.navigation')
        @endif

        @yield('content','no content')

        {{---  This Section Belongs to Page Wrapper End  --}}

        {{---  This Section Belongs to Js include Start   --}}


        @include('layout.content_js')

        {{---  This Section Belongs to Js include End   --}}
</div>
    </body>
</html>