<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--head-->
@include('admin.partials.head')
<!--//head-->
<body class="cbp-spmenu-push">
<div class="main-content">
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <!-- //header-ends -->
    <!-- main content start-->
    @yield('content')


</div>
<!--main js-->
@include('admin.partials.main-js')
<!--//main js-->

</body>
</html>