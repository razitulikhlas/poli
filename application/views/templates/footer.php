 <!-- /.content-wrapper -->
 <footer class="main-footer">
   <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
     <b>Version</b> 3.0.0-rc.3
   </div>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <!-- <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->
 <!-- Sparkline -->
 <script src="<?php echo base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <!-- <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script> -->
 <!-- <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
 <!-- jQuery Knob Chart -->
 <!-- select2 -->
 <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <!-- <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
 <!-- DataTables -->
 <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
 <!-- datatables -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/datatables/Buttons-1.6.1/css/buttons.bootstrap4.min.css" />

 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/JSZip-2.5.0/jszip.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/Buttons-1.6.1/js/buttons.bootstrap4.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables/Buttons-1.6.1/js/buttons.print.min.js"></script>

 <!-- end -->
 <script>
   $(function() {
     $('#tabel_id').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": true,
       responsive: "true",
       dom: 'Bfrtip',
       buttons: [{
           extend: 'excelHtml5',
           text: '<i class="fas fa-file-excel"></i> ',
           titleAttr: 'Exportar a Excel',
           className: 'btn btn-success'
         },
         {
           extend: 'pdfHtml5',
           text: '<i class="fas fa-file-pdf"></i> ',
           titleAttr: 'Exportar a PDF',
           className: 'btn btn-danger'
         },
         {
           extend: 'print',
           text: '<i class="fa fa-print"></i> ',
           titleAttr: 'Print',
           className: 'btn btn-info'
         }
       ]
     });

     $(function() {
       $('.js-example-basic-single').select2({
         dropdownAutoWidth: true,
       });
     });


   });
 </script>
 </body>

 </html>