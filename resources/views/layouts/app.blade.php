<!DOCTYPE html>
<html>

@include('layouts.partials._head')

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  @include('layouts.partials._header')
  @include('layouts.partials._mainSidebar')

  <div class="content-wrapper">
    @stack('content_wrapper_start')
    <section class="content-header">
      @stack('content_header_start')
      <h1>
        @yield('content_header_title')
        <span style="margin-left: 20px;">
          @yield('content_header_buttons')
        </span>
      </h1>
      @stack('content_header_end')
    </section>
    <section class="content container-fluid">
      @include('layouts.partials._flashMessage')

      @stack('content_start')
      @yield('content')
      @stack('content_end')
    </section>
    @stack('content_wrapper_end')
  </div>

  @include('layouts.partials._footer')
  @include('layouts.partials._controlSidebar')

</div>
<!-- ./wrapper -->

@include('layouts.partials._javascript')

</body>
</html>