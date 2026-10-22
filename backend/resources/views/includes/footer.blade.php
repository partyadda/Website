<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="{{URL::asset('assets/js/daterangepicker.js') }}"></script><script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
<script src="{{URL::asset('assets/js/partyAdda.js') }}"></script>
@if (!Request::is('/'))
 <footer class="app-footer">
              <strong>
                Copyright &copy; {{ date('Y') }} &nbsp;
                <a href="https://PartyAdda.com" class="text-decoration-none" target="_blank" rel="noopener noreferrer">Party Adda</a>.
            </strong>
            All rights reserved.
             ({{env('DB_DATABASE')}}) {{session('username')}}

        </footer>
@endif
@if(Request::is('/')  )
  <script>
$(function () {
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    $(function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
        sidebarWrapper &&
        typeof window.OverlayScrollbarsGlobal?.OverlayScrollbars === "function"
        ) {
            window.OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
});
</script>
@else
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script>
    <script>
$(function () {
    const connectedSortables =
    document.querySelectorAll(".connectedSortable");
    connectedSortables.forEach((connectedSortable) => {
        if (typeof window.Sortable !== 'function' || connectedSortable.dataset.compactSortableReady) return;
        connectedSortable.dataset.compactSortableReady = '1';
        new Sortable(connectedSortable, {
            group: "shared",
            handle: ".card-header",
        });
    });

    const cardHeaders = document.querySelectorAll(
    ".connectedSortable .card-header",
    );
    cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = "move";
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
$(function () {
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    const sales_chart_options = {
        series: [{
                name: "Digital Goods",
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: "Electronics",
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 300,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ["#0d6efd", "#20c997"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2023-01-01",
                "2023-02-01",
                "2023-03-01",
                "2023-04-01",
                "2023-05-01",
                "2023-06-01",
                "2023-07-01",
            ],
        },
        tooltip: {
            x: {
                format: "MMMM yyyy",
            },
        },
    };

    if (document.querySelector("#revenue-chart") && typeof window.ApexCharts === "function") {
        const sales_chart = new ApexCharts(
        document.querySelector("#revenue-chart"),
        sales_chart_options,
        );
        sales_chart.render();
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>
    <script>
$(function () {
    const visitorsData = {
        US: 398, // USA
        SA: 400, // Saudi Arabia
        CA: 1000, // Canada
        DE: 500, // Germany
        FR: 760, // France
        CN: 300, // China
        AU: 700, // Australia
        BR: 600, // Brazil
        IN: 800, // India
        GB: 320, // Great Britain
        RU: 3000, // Russia
    };

    // World map by jsVectorMap
    if (document.querySelector("#world-map") && typeof window.jsVectorMap === "function") {
        const map = new jsVectorMap({
            selector: "#world-map",
            map: "world",
        });
    }

    // Sparkline charts
    const option_sparkline1 = {
        series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    if (document.querySelector("#sparkline-1") && typeof window.ApexCharts === "function") {
        const sparkline1 = new ApexCharts(
        document.querySelector("#sparkline-1"),
        option_sparkline1,
        );
        sparkline1.render();
    }

    const option_sparkline2 = {
        series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    if (document.querySelector("#sparkline-2") && typeof window.ApexCharts === "function") {
        const sparkline2 = new ApexCharts(
        document.querySelector("#sparkline-2"),
        option_sparkline2,
        );
        sparkline2.render();
    }

    const option_sparkline3 = {
        series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    if (document.querySelector("#sparkline-3") && typeof window.ApexCharts === "function") {
        const sparkline3 = new ApexCharts(
        document.querySelector("#sparkline-3"),
        option_sparkline3,
        );
        sparkline3.render();
    }
});
</script>
@endif

      <script>
$(function () {
    $(document).ready(function(){
        if ($.fn.dataTable && $('#myTable').length && !$.fn.dataTable.isDataTable('#myTable')) {
            $('#myTable').dataTable();
        }
    });

    $(function () {
        //https://www.daterangepicker.com/
        //Date range as a button
        //startDate: moment().subtract(29, 'days'),
        if (!$('#date_range_filter').length || typeof $.fn.daterangepicker !== 'function' || typeof moment !== 'function') return;
        if ($('#date_range_filter').data('daterangepicker')) return;
        $('#date_range_filter').daterangepicker(
        {
            locale: {
                format: 'DD/MM/YYYY'
            },
            opens: 'center',
            alwaysShowCalendars: false,
            ranges   : {
                'Today'       : [moment(), moment()],
                'Tomorrow'    : [moment().add(1, 'days'), moment().add(1, 'days')],
                'Next 7 Days'    : [moment().add(1, 'days'), moment().add(7, 'days')],
                'Next Month'    : [moment().add(0, 'month'), moment().add(1, 'month')],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate  : moment()
        },
        function (start, end) {
            //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            $('#booking_date_filter').val(start.format('YYYY-MM-DD') + ',' + end.format('YYYY-MM-DD'));
            $('#date_range_filter').text(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            $('#btn_send_mail_date_filter').val(start.format('YYYY-MM-DD') + ',' + end.format('YYYY-MM-DD'));

        }
        )
    })
});
</script>

@if(Request::is('admin/book-theatre/*') || Request::is('admin/book-package/*') || Request::is('admin/booking/edit/*'))
 @include('booking.admin-booking-js')
@endif

@if(Request::is('admin/booking/billing/edit/*'))
 @include('booking.admin-booking-billing-js')
@endif

@if(Request::is('admin/booking/billing/collect_amount/*'))
 @include('booking.admin-booking-collect-amount-js')
@endif
