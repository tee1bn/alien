

  <!-- Bootstrap -->
    <link href="<?=asset;?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=asset;?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=asset;?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=asset;?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?=asset;?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset;?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset;?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset;?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset;?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=asset;?>/vendors/build/css/custom.min.css" rel="stylesheet">
 
 <!-- jQuery -->
    <script src="<?=asset;?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=asset;?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=asset;?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=asset;?>/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?=asset;?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?=asset;?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script><!-- 
    <script src="<?=asset;?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=asset;?>/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?=asset;?>/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=asset;?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=asset;?>/vendors/pdfmake/build/vfs_fonts.js"></script>
 -->
    <!-- Custom Theme Scripts -->
    <script src="<?=asset;?>/vendors/build/js/custom.min.js"></script>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-orders').dataTable();
        $('#datatable-sales').dataTable();
        $('#datatable-matches').dataTable();
        $('#datatable_newsletter').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
