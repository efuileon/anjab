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
                                                    <th>Belum Cek</th>
                                                    <th>Revisi OPD</th>
                                                    <th>Usulan Dkembalikan</th>
                                                    <th>Usulan Disetujui</th>
                                                    <th>Verifikasi</th>

                                                  </thead>
                                                  <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach($verif as $verif)
                                                    <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$verif->nm_opd}}</td>
                                                    @php $blm_verif = \App\z_pangkat::where('OPD','=',$verif->id_opd)->where('verifikasi','=','2')->count(); @endphp
                                                    @php $revisi = \App\z_pangkat::where('OPD','=',$verif->id_opd)->where('verifikasi','=','4')->count(); @endphp
                                                    @php $kembali = \App\z_pangkat::where('OPD','=',$verif->id_opd)->where('verifikasi','=','3')->count(); @endphp
                                                    @php $disetujui = \App\z_pangkat::where('OPD','=',$verif->id_opd)->where('verifikasi','=','6')->count(); @endphp
                                                    <td><span class='badge bg-blue'>{{$blm_verif}}</span></td>
                                                    <td><span class='badge bg-yellow'>{{$revisi}}</span></td>
                                                    <td><span class='badge bg-red'>{{$kembali}}</span></td>
                                                    <td><span class='badge bg-green'>{{$disetujui}}</span></td>

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


@stop
