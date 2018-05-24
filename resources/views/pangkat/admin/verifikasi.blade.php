@extends('pangkat.layoutLTE.app')
@section('isi')
        <section class="content">
                    <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Verifikasi Berkas</h3>
                                  <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" style="display: block;">
                                  <!-- start box -->
                                  <table id="example1" class="table table-bordered table-hover">

                                                  <thead>
                                                    <th>No</th>
                                                    <th>OPD</th>
                                                    <th>Jumlah Usulan</th>
                                                    <th>Jumlah Usulan</th>
                                                    <th>Verifikasi</th>

                                                  </thead>
                                                  <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach($verif as $verif)
                                                    <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$verif->nm_opd}}</td>
                                                    @php $blm_verif = \App\z_pangkat::where('OPD','=',$verif->id_opd)->where('verifikasi','=','2')->count(); @endphp
                                                    <td>{{$blm_verif}}</td>
                                                    <td>
                                                      <input type="text" class="knob" value="20" data-skin="tron"  data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true"/>
                                                      <div class="knob-label">data-width="90"</div>
                                                    </td>
                                                    <td>
                                                      <a href="{{url('pangkat/admin/verifikasi').'/'.$verif->id_opd}}" class='btn btn-success'><i class="fa fa-users"></i></a>
                                                    </td>

                                                    @php $i++ @endphp
                                                    @endforeach
                                                  </tbody>
                                              </table>

                                </div><!-- /.box-body -->
                              </div>

</section>

<!-- page script -->
 <script type="text/javascript">
   $(function () {
     /* jQueryKnob */

     $(".knob").knob({
       /*change : function (value) {
        //console.log("change : " + value);
        },
        release : function (value) {
        console.log("release : " + value);
        },
        cancel : function () {
        console.log("cancel : " + this.value);
        },*/
       draw: function () {

         // "tron" case
         if (this.$.data('skin') == 'tron') {

           var a = this.angle(this.cv)  // Angle
                   , sa = this.startAngle          // Previous start angle
                   , sat = this.startAngle         // Start angle
                   , ea                            // Previous end angle
                   , eat = sat + a                 // End angle
                   , r = true;

           this.g.lineWidth = this.lineWidth;

           this.o.cursor
                   && (sat = eat - 0.3)
                   && (eat = eat + 0.3);

           if (this.o.displayPrevious) {
             ea = this.startAngle + this.angle(this.value);
             this.o.cursor
                     && (sa = ea - 0.3)
                     && (ea = ea + 0.3);
             this.g.beginPath();
             this.g.strokeStyle = this.previousColor;
             this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
             this.g.stroke();
           }

           this.g.beginPath();
           this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
           this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
           this.g.stroke();

           this.g.lineWidth = 2;
           this.g.beginPath();
           this.g.strokeStyle = this.o.fgColor;
           this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
           this.g.stroke();

           return false;
         }
       }
     });
   });
     /* END JQUERY KNOB */

     //INITIALIZE SPARKLINE CHARTS



 </script>

@stop
