<!DOCTYPE html>
<html lang="en">
    @include('frontend::layouts.meta')
    <body>
        @include('frontend::layouts.header')
        @section('content')
        @show
        @include('frontend::layouts.footer')
        @include('frontend::layouts.script')
    </body>
</html>