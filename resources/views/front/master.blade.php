<!DOCTYPE html>
<html dir="ltr" lang="en-US">

@include('front.layout.head')


<body class="gradient-bg">



@include('front.layout.header')
@yield('content')

  @include('front.layout.footer')

 @include('front.layout.script')
</body>

</html>