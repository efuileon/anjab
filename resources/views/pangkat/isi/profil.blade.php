@extends('pangkat.layoutLTE.app')
@section('isi')
        <section class="content">

          <div class="lockscreen-wrapper">
                <div class="lockscreen-logo">
                  @php
                  $user = \App\opd::where('id_opd','=',Auth::user()->OPD)->get();
                  @endphp
                  <b>{{ $user[0]->nm_opd }}</b>
                </div>
                <!-- User name -->
                <center><div class="lockscreen-name">{{Auth::user()->username}}</div></center>

                <!-- START LOCK SCREEN ITEM -->
                <div class="lockscreen-item">
                  <!-- lockscreen image -->
                  <div class="lockscreen-image">
                    @if(empty(Auth::user()->img))
                    <img src="{{asset('storage/files/foto/def.jpg')}}" alt="user image">
                    @else
                    <img src="{{asset(Auth::user()->lokasi)}}" alt="user image">
                    @endif
                  </div>
                  <!-- /.lockscreen-image -->

                  <!-- lockscreen credentials (contains the form) -->
                  <form class="lockscreen-credentials" action="{{url('pangkat/ubah_profil')}}" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <input type="file" class="form-control" name="file" placeholder="ganti avatar" accept="image/jpeg">
                      <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                      </div>
                    </div>
                    <div class="input-group">
                      <input type="text" class="form-control" name="name" placeholder="ganti nama" value="{{Auth::user()->name}}">
                      <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                      </div>
                    </div>
                    <div class="input-group">
                      <input type="text" class="form-control" name="email" placeholder="ganti email" value="{{Auth::user()->email}}">
                      <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                      </div>
                    </div>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="ganti password">
                      <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                      </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  </form><!-- /.lockscreen credentials -->

                </div><!-- /.lockscreen-item -->

              </div>
            <!-- /page content -->

</section>
@stop
