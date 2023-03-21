<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
      data-theme="theme-default">
    <head>
        @include('partials.backend._head')
    </head>

    <body>
        <div id="admin">
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    @include('partials.backend._sidebar')
                    {{-- Layout Container --}}
                    <div class="layout-page">
                        @include('partials.backend._topbar')
                        {{-- Content Wrapper --}}
                        <div class="content-wrapper">
                            @yield('content')
                            @include('partials.backend._footer')
                            <div class="content-backdrop fade"></div>
                        </div>
                        {{-- End of Content Wrapper --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Overlay --}}
        <div class="layout-overlay layout-menu-toggle"></div>

        {{-- Custom Scripts --}}
        @vite(['resources/js/app.js'])

        {{-- Core JS --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('sneat-admin/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('sneat-admin/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('sneat-admin/js/bootstrap.js') }}"></script>
        <script src="{{ asset('sneat-admin/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('sneat-admin/js/menu.js') }}"></script>
        <script src="{{ asset('sneat-admin/js/main.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

        {{-- Vendor JS --}}
        <script src="{{ asset('sneat-admin/libs/apex-charts/apex-charts.js') }}"></script>

        {{-- InternationalTelephoneInput Scripts --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/js/intlTelInput.min.js"></script>

        <script>
            $(document).ready(function () {
                $('table.table-show-dt').DataTable();
                $('form').on('submit', function () {
                    $('.submit-button').prop('disabled', true);
                });
                $('.multi-select').selectpicker({
                    style: 'btn-default, btn-outline-dark',
                    size: false,
                    noneSelectedText: "Select instructor...",
                });
            });
        </script>
    </body>

</html>
