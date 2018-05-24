<!-- jQuery 2.1.4
<script src="{{asset('LTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script> -->
<!-- Sweet alert -->
<script src="{{asset('sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
@include('sweet::alert')
  <!-- InputMask -->
    <script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('LTE/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="{{asset('LTE/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset('LTE/plugins/fastclick/fastclick.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('LTE/dist/js/app.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('LTE/dist/js/demo.js')}}" type="text/javascript"></script>
<!-- jQuery Knob -->
<script src="{{asset('LTE/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
  $(function () {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
    });
  });
</script>
