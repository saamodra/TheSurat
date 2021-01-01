<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="dist/js/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="dist/js/dataTables.buttons.min.js"></script>
<script src="dist/js/buttons.flash.min.js"></script>
<script src="dist/js/jszip.min.js"></script>
<script src="dist/js/pdfmake.min.js"></script>
<script src="dist/js/vfs_fonts.js"></script>
<script src="dist/js/buttons.html5.min.js"></script>
<script src="dist/js/buttons.print.min.js"></script>
<!-- REQUIRED SCRIPTS -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
        dom: '<"row"<"col-lg-4"l><"col-lg-4"B><"col-lg-4"f>>rtip',
        buttons: [
        {
            extend : 'excel',
            text : '<i class="fa fa-file-excel-o"></i> Excel',
            title : 'Data',
            exportOptions: {
              columns: ':not(:last-child)',
            }
        },
        {
            extend : 'pdf',
            text : '<i class="fa fa-file-pdf-o"></i> PDF',
            title : 'Data',
            exportOptions: {
              columns: ':not(:last-child)',
            }
        },
        {
            extend : 'print',
            text : '<i class="fa fa-print"></i> Print',
            title : 'Data',
            exportOptions: {
              columns: ':not(:last-child)',
            }
        }
        ],
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "language": {
          "lengthMenu": "_MENU_ Data per halaman",
          "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
          "zeroRecords": "Tidak ada data yang cocok",
          "search": "Pencarian :",
          
        }
    });
  });
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>