
    </div>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/backend/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/backend/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/backend/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="/backend/dist/js/app.min.js"></script>
    <script src="/backend/dist/js/app-style-switcher.js"></script>
    <script src="/backend/dist/js/app.init.dark.js"></script>
    <script src="/backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/backend/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="/backend/dist/js/waves.js"></script>
    <!--Wave Effects -->
    <script src="/backend/dist/js/sidebarmenu.js"></script>
    <!--Menu sidebar -->
    <!--Custom JavaScript -->
   <script src="/backend/dist/js/feather.min.js"></script>
    <script src="/backend/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--Morris JavaScript -->
    <!--c3 charts -->
    <script src="/backend/assets/extra-libs/c3/d3.min.js"></script>
    <script src="/backend/assets/extra-libs/c3/c3.min.js"></script>
    <script src="/backend/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="/backend/dist/js/pages/dashboards/dashboard5.js"></script>
    <script src="/backend/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->

    <script src="/backend/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="/backend/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="/backend/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="/backend/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="/backend/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="/backend/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="/backend/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="/backend/dist/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="/backend/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/backend/assets/libs/sweetalert2/sweet-alert.init.js"></script>
    <script src="/backend/assets/extra-libs/toastr/dist/build/toastr.min.js"></script>
    <script src="/backend/assets/extra-libs/toastr/toastr-init.js"></script>
    <script src="/backend/dist/js/ajax.actions.js"></script>
    <script>
        $(function() {
            "use strict";
            // ==============================================================
            // Newsletter
            // ==============================================================

            var chart = c3.generate({
                bindto: '.rates',
                data: {
                    columns: [
                        ['Created', {{ getPaiementStatus("creqted") }}],
                        ['Approved', {{ getPaiementStatus("approved") }}],
                    ],

                    type : 'donut'
                },
                donut: {
                    label: {
                        show: false
                    },
                    title:"Weekly",
                    width:10,

                }
                , padding: {
                    top:10,
                    bottom:-20

                , },
                legend: {
                hide: true
                //or hide: 'data1'
                //or hide: ['data1', 'data2']
                },
                color: {
                    pattern: ['#2961ff', '#dadada', '#ff821c', '#7e74fb']
                }
            });

            var chart = c3.generate({
                bindto: '.statuses',
                data: {
                    columns: [
                        ['Success', getSuccesCmd(true)],
                        ['Pending', getSuccesCmd(false)],
                        ['Failed', getSuccesCmd(false)]
                    ],

                    type : 'donut'
                },
                donut: {
                    label: {
                        show: false
                    },
                    title:"Orders",
                    width:35,

                },

                legend: {
                hide: true
                //or hide: 'data1'
                //or hide: ['data1', 'data2']
                },
                color: {
                    pattern: ['#40c4ff', '#2961ff', '#ff821c', '#7e74fb']
                }
            });
        });
    </script>
</body>
</html>
