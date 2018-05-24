@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           Kenaikan Pangkat Jabatan Fungsional Tertentu
           <small>Tambahkan PNS yang akan diusulkan</small>
         </h1>
</section>
<br>

           <div class="row">
            <div class="col-md-3">

              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Tambah Usulan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{url('pangkat/cekpnsreg')}}" method="post">
                  <div class="box-body">
                    <div class="form-group">
                        <label>Masukkan NIP</label>
                      <input class="form-control" placeholder="NIP 18 Digit tanpa spasi" name="nip">
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="jenis_kp" value="{{$jen_kp}}" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cek</button>
                  </div>
                </form>
              </div>

            </div><!-- /.col -->
            <div class="col-md-9">

            <form role="form" action="{{url('pangkat/addpnsreg')}}" method="post">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Data PNS</h3>
                  <div class="box-tools pull-right">
                  @if(!empty($pns))
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <input type="hidden" name="opd" value="{{Auth::user()->OPD}}" />
                  @php
                  $user = \App\opd::where('id_opd','=',Auth::user()->OPD)->get();
                  @endphp
                  <input type="hidden" name="verifikasi" value="{{$user[0]->tingkat}}" />
                  <input type="hidden" name="per_bln" value="{{session()->get('per')}}" />
                  <input type="hidden" name="per_thn" value="{{session()->get('thn')}}" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                  @endif
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <table class="table table-condensed">
                    <tbody>
                      @if(!empty($pns))
                      @foreach($pns as $pns)
                    <tr>
                      <th style="width: 200px">NIP</th>
                      <td>{{$pns->nip_baru}}</td>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>{{nama($pns->glr_dpn,$pns->nama,$pns->glr_blk)}}</td>
                    </tr>
                    <tr>
                      <th>Tempat, tgl lahir</th>
                      <td>{{$pns->tempat_lahir.", ".tgl_indo($pns->tgl_lahir)}}</td>
                    </tr>
                    <tr>
                      <th>Pendidikan</th>
                      <td>{{$pns->pendidikan." / ".date("Y",strtotime($pns->lulus))}}</td>
                    </tr>
                    <tr>
                      <th>Gol / TMT</th>
                      <td>{{$pns->gol_akhir." -- ".tgl_indo($pns->tmt_gol)}}</td>
                    </tr>
                    <tr>
                      <th>Jabatan Struktural</th>
                      <td>{{$pns->nm_jabstruk}}</td>
                    </tr>
                    <tr>
                      <th>Jabatan fungsional Tertentu</th>
                      <td>{{$pns->nm_jft}}</td>
                    </tr>
                    <tr>
                      <th>Jabatan fungisonal Umum</th>
                      <td>{{$pns->nm_jfu}}</td>
                    </tr>
                    <tr>
                      <th>Unit Kerja</th>
                      <td>{{$pns->unit_kerja}}<br>{{$pns->unit_kerja_induk}}</td>
                    </tr>
                    <tr>
                      <th>Masa kerja</th>
                      <td>{{$pns->maker_th." tahun ".$pns->maker_bl." bulan"}}</td>
                    </tr>
                    <input type="hidden" name="nip_baru" value="{{$pns->nip_baru}}" />
                    <input type="hidden" name="glr_dpn" value="{{$pns->glr_dpn}}" />
                    <input type="hidden" name="nama" value="{{$pns->nama}}" />
                    <input type="hidden" name="glr_blk" value="{{$pns->glr_blk}}" />
                    <input type="hidden" name="tempat_lahir" value="{{$pns->tempat_lahir}}" />
                    <input type="hidden" name="tgl_lahir" value="{{$pns->tgl_lahir}}" />
                    <input type="hidden" name="pendidikan" value="{{$pns->pendidikan}}" />
                    <input type="hidden" name="lulus" value="{{$pns->lulus}}" />
                    <input type="hidden" name="gol_awal" value="{{$pns->gol_awal}}" />
                    <input type="hidden" name="gol_akhir" value="{{$pns->gol_akhir}}" />
                    <input type="hidden" name="tmt_gol" value="{{$pns->tmt_gol}}" />
                    <input type="hidden" name="nm_jabstruk" value="{{$pns->nm_jabstruk}}" />
                    <input type="hidden" name="nm_jft" value="{{$pns->nm_jft}}" />
                    <input type="hidden" name="nm_jfu" value="{{$pns->nm_jfu}}" />
                    <input type="hidden" name="unit_kerja" value="{{$pns->unit_kerja}}" />
                    <input type="hidden" name="unit_kerja_induk" value="{{$pns->unit_kerja_induk}}" />
                    <input type="hidden" name="maker_th" value="{{$pns->maker_th}}" />
                    <input type="hidden" name="maker_bl" value="{{$pns->maker_bl}}" />
                    <input type="hidden" name="jenis_kp" value="{{$jenis_kp}}" />
                    @if(gol($pns->gol_akhir)>=34)
                    <input type="hidden" name="gol4" value="1" />
                    @else
                    <input type="hidden" name="gol4" value="0" />
                    @endif
                    @endforeach
                    @endif
                  </tbody></table>

              </div>
            </form>
            </div><!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-body">
                              <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>No</th>
                                  <th>NIP</th>
                                  <th>Nama</th>
                                  <th>Unit Kerja</th>
                                  <th>Jenis KP</th>
                                  <th>Status</th>
                                  <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @php $i = 1 @endphp
                                  @foreach($ukp as $ukp)
                                  <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$ukp->nip_baru}}</td>
                                  <td>{{nama($ukp->glr_dpn,$ukp->nama,$ukp->glr_blk)}}</td>
                                  <td>{{$ukp->nm_opd}}</td>
                                  @if($ukp->gol4==0)
                                  <td>{{$ukp->nm_jenis_kp}}</td>
                                  @else
                                  <td>KP Golongan IV/a Keatas</td>
                                  @endif
                                  <td>{{$ukp->nm_status}}</td>

                                  @php
                                  $cpns = \App\z_pangkat_b_cpns::where("id_usul","=",$ukp->id)->count();
                                  $pns = \App\z_pangkat_b_pns::where("id_usul","=",$ukp->id)->count();
                                  $pangkat = \App\z_pangkat_b_pangkat::where("id_usul","=",$ukp->id)->count();
                                  $ijazah = \App\z_pangkat_b_ijazah::where("id_usul","=",$ukp->id)->count();
                                  $transkrip = \App\z_pangkat_b_transkrip::where("id_usul","=",$ukp->id)->count();
                                  $skp1 = \App\z_pangkat_b_skp::where("id_usul","=",$ukp->id)->where("tahun","=",session()->get('thn')-2)->count();
                                  $skp2 = \App\z_pangkat_b_skp::where("id_usul","=",$ukp->id)->where("tahun","=",session()->get('thn')-1)->count();
                                  @endphp
                                  @if($cpns>0) @php $cpns=1 @endphp @endif
                                  @if($pns>0) @php $cpns=1 @endphp @endif
                                  @if($pangkat>0 || $ukp->gol_akhir == $ukp->gol_awal) @php $pangkat=1 @endphp @endif
                                  @if($ijazah>0) @php $ijazah=1 @endphp @endif
                                  @if($transkrip>0) @php $transkrip=1 @endphp @endif
                                  @if($skp1>0) @php $skp1=1 @endphp @endif
                                  @if($skp2>0) @php $skp2=1 @endphp @endif
                                  @php $tot= $cpns+$pns+$pangkat+$ijazah+$transkrip+$skp1+$skp2 @endphp

                                  @php $cek_tkt=\App\opd::find(Auth::user()->OPD) @endphp
                                  @if($cek_tkt->tingkat==0)
                                    @if($ukp->verifikasi==0)
                                    <td>
                                    <a href="{{url('pangkat/uploadreg')."/".$ukp->id}}" class="btn btn-primary"><i class="fa fa-upload"></i> Upload berkas</a>
                                    </td>
                                    <td>
                                      @if($tot == 7)
                                         <form action="{{url('pangkat/naikreg')}}" method="post">
                                             {{ csrf_field() }}
                                             <input type="hidden" name="id_pns" value={{$ukp->id}}>
                                             <input type="hidden" name="verifikasi" value={{$ukp->verifikasi}}>
                                             <button type="submit" class="btn btn-success" id="kirim">
                                             <i class="fa fa-send"></i> Usul ke OPD Tk. I
                                             </button>
                                           </form>
                                         @else
                                           <button class=class="btn btn-success" disabled="disabled">
                                             <i class="fa fa-send"></i>  Usul ke OPD Tk. I
                                            </button>
                                         @endif

                                    </td>
                                    @elseif($ukp->verifikasi==1)
                                    <td colspan="2" class="bg-yellow disabled color-palette" align="center">
                                      @php $nm = \App\opd::find($ukp->parent); @endphp
                                       <i class="icon fa fa-check"></i> - Usulan di {{$nm->nm_opd}} -
                                     </td>
                                     @else
                                     <td colspan="2" class="bg-green disabled color-palette" align="center">
                                        <i class="icon fa fa-check"></i> - Usulan di Verifikator BKPSDM -
                                      </td>
                                  @endif
                                  @elseif($cek_tkt->tingkat==1)
                                  @if($ukp->verifikasi==1)
                                    <td>
                                    <a href="{{url('pangkat/uploadreg')."/".$ukp->id}}" class="btn btn-primary"><i class="fa fa-upload"></i> Upload berkas</a>
                                    </td>
                                    <td>
                                      @if($tot == 7)
                                         <form action="{{url('pangkat/naikreg')}}" method="post">
                                             {{ csrf_field() }}
                                             <input type="hidden" name="id_pns" value={{$ukp->id}}>
                                             <input type="hidden" name="verifikasi" value={{$ukp->verifikasi}}>
                                             <button type="submit" class="btn btn-success" id="kirim">
                                             <i class="fa fa-send"></i> Kirim ke BKPSDM
                                             </button>
                                           </form>
                                         @else
                                           <button class=class="btn btn-success" disabled="disabled">
                                             <i class="fa fa-send"></i>  Kirim ke BKPSDM
                                            </button>
                                         @endif
                                    </td>
                                    @else
                                    <td colspan="2" class="bg-green disabled color-palette" align="center">
                                      @php $nm = \App\opd::find($ukp->parent); @endphp
                                       <i class="icon fa fa-check"></i> - Usulan di Verifikator BKPSDM -
                                     </td>
                                     @endif
                                  @endif
                                @php $i++ @endphp
                              </tr>

                                  @endforeach
                                </tbody>
                            </table>
                          </div>
          </div>
        </div>
      </div>
      </div>


    <script type="text/javascript">
      $(document).on('click', '#kirim', function (e) {
         e.preventDefault();
        var form = $(this).parents('form');
         swal({
                 title: "Konfirmasi Kirim",
                 text: "Data tidak akan bisa diubah setelah dikirim, Apakah anda yakin ?",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Ya, Kirim!",
                 closeOnConfirm: true
             },
             function(isConfirm) {
                if(isConfirm) form.submit();
         });
      });
    </script>
@stop
