<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

@include('admin.layout.head')

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                  @include('admin.layout.sidebar')

                <div class="section-content-right">

                    @include('admin.layout.header')
                    <div class="main-content">

                        @yield('admin-content')


                    @include('admin.layout.footer')
                    </div>

                </div>
            </div>
        </div>
    </div>

 @include('admin.layout.script')
</body>

</html>