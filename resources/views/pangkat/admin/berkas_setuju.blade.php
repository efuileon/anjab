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
                                                    <th>Nama / NIP</th>
                                                    <th>Jenis KP</th>
                                                    <th>OPD</th>
                                                    <th>Cek</th>

                                                  </thead>
                                                  <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach($pns as $pns)
                                                    <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$pns->nama}}<br>{{$pns->nip_baru}}</td>
                                                  @if($pns->gol4==0)
                                                    <td>{{$pns->nm_jenis_kp}}</td>
                                                    @else
                                                    <td>KP Golongan IV/a Keatas ({{$pns->nm_jenis_kp}})</td>
                                                  @endif

                                                    <td>{{$pns->nm_opd}}</td>
                                                    <td>
                                                      <a href="{{url('pangkat/admin/verifpns').'/'.$pns->id}}" class='btn btn-info'><i class="fa fa-search-plus"></i></a>
                                                    </td>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                  </tbody>
                                              </table>

                                </div><!-- /.box-body -->
                              </div>

</section>
@stop
