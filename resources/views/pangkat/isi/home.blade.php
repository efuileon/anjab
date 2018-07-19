@extends('pangkat.layoutLTE.app')
@section('isi')
        <section class="content">
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">SUB BIDANG KENAIAKAN PANGKAT DAN PEMBERHENTIAN</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  <div class="row">
                    @php $cek_tingkat = \App\opd::find(Auth::user()->OPD); @endphp
                    @php $jum_reg = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('jenis_kp','=',1)->where('verifikasi','>=',$cek_tingkat->tingkat)->count(); @endphp
                             <div class="col-lg-2 col-xs-6 wow tada" data-wow-delay="0.2s">
                               <div class="small-box bg-purple">
                                 <div class="inner">
                                   <h3>{{$jum_reg}}<sup style="font-size: 20px">Orang</sup></h3>
                                   <p>Kenaikan Pangkat Reguler</p>
                                 </div>
                                 <div class="icon">
                                   <i class="fa fa-line-chart"></i>
                                 </div>
                                 <a href="{{url('pangkat/reguler')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                               </div>
                             </div><!-- ./col -->
                             <div class="col-lg-2 col-xs-6 wow tada" data-wow-delay="0.3s" >
                               <!-- small box -->

                               @php $jum_jft = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('jenis_kp','=',2)->where('verifikasi','>=',$cek_tingkat->tingkat)->count(); @endphp
                               <div class="small-box bg-green">
                                 <div class="inner">
                                   <h3>{{$jum_jft}}<sup style="font-size: 20px">Orang</sup></h3>
                                   <p>Kenaikan Pangkat JFT </p>
                                 </div>
                                 <div class="icon">
                                   <i class="fa fa-line-chart"></i>
                                 </div>
                                 <a href="{{url('pangkat/jft')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                               </div>
                             </div><!-- ./col -->
                             <div class="col-lg-2 col-xs-6 wow tada" data-wow-delay="0.4s">
                               <!-- small box -->
                               @php $jum_struk = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('jenis_kp','=',3)->where('verifikasi','>=',$cek_tingkat->tingkat)->count(); @endphp
                               <div class="small-box bg-yellow">
                                 <div class="inner">
                                   <h3>{{$jum_struk}}<sup style="font-size: 20px">Orang</sup></h3>
                                   <p>KP Jabatan Struktural</p>
                                 </div>
                                 <div class="icon">
                                   <i class="fa fa-line-chart"></i>
                                 </div>
                                 <a href="{{url('pangkat/struk')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                               </div>
                             </div><!-- ./col -->
                             <div class="col-lg-2 col-xs-6 wow tada" data-wow-delay="0.5s">
                               <!-- small box -->
                               @php $jum_pi_jfu = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('jenis_kp','=',4)->where('verifikasi','>=',$cek_tingkat->tingkat)->count(); @endphp
                               <div class="small-box bg-red">
                                 <div class="inner">
                                   <h3>{{$jum_pi_jfu}}<sup style="font-size: 20px">Orang</sup></h3>
                                   <p>KP Penyesuaian Ijazah JFU</p>
                                 </div>
                                 <div class="icon">
                                   <i class="fa fa-line-chart"></i>
                                 </div>
                                 <a href="{{url('pangkat/pi_jfu')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                               </div>
                             </div><!-- ./col -->
                             <div class="col-lg-2 col-xs-6 wow tada" data-wow-delay="0.6s">
                               <!-- small box -->
                               @php $jum_pi_jft = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('jenis_kp','=',5)->where('verifikasi','>=',$cek_tingkat->tingkat)->count(); @endphp
                               <div class="small-box bg-red">
                                 <div class="inner">
                                   <h3>{{$jum_pi_jft}}<sup style="font-size: 20px">Orang</sup></h3>
                                   <p>KP Penyesuaian Ijazah JFT</p>
                                 </div>
                                 <div class="icon">
                                   <i class="fa fa-line-chart"></i>
                                 </div>
                                 <a href="{{url('pangkat/pi_jft')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                               </div>
                             </div><!-- ./col -->

                           </div><!-- /.row -->
                           <hr>
                           <div class="row">
                             @php $cek_tingkat = \App\opd::find(Auth::user()->OPD); @endphp
                             @if($cek_tingkat->tingkat==0)
                             @php $jum_usul = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->whereRaw('((verifikasi = 2) or (verifikasi = 1))')->count(); @endphp
                             @else
                             @php $jum_usul = \App\z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi', '=', '2')->count(); @endphp
                             @endif
                                <div class="col-lg-3 col-xs-6 wow fadeInLeft" data-wow-delay="0.2s">
                                  <div class="small-box bg-aqua">
                                    <div class="inner">
                                      <h3>{{$jum_usul}}<sup style="font-size: 20px">Usulan</sup></h3>
                                      <p>Daftar Usulan Terkirim</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fa fa-files-o"></i>
                                    </div>
                                    <a href="{{url('pangkat/daftar_usulan')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                              </div>
                              <hr>
                              @if($cek_tingkat->tingkat==0)
                               @php $jum_kembali = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi','=','3')->count(); @endphp
                              @else
                               @php $jum_kembali = \App\z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi', '=', '3')->count(); @endphp
                              @endif

                           <div class="row">
                                <div class="col-lg-3 col-xs-6 wow fadeInDown" data-wow-delay="0.2s">
                                  <!-- small box -->
                                  <div class="small-box bg-red">
                                    <div class="inner">
                                      <h3>{{$jum_kembali}}<sup style="font-size: 20px">Usulan Kembali</sup></h3>
                                      <p>Daftar Pengembalian Berkas</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fa fa-edit"></i>
                                    </div>
                                    <a href="{{url('pangkat/daftar_pengembalian')}}" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div><!-- ./col -->
                              </div>
                             <hr>
                          </div><!-- /.box-body -->


              </div>

</section>
@stop
