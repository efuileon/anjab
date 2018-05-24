@extends('pangkat.layoutLTE.app')
@section('isi')
        <section class="content">
          <div class="box box-primary collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Tambah User</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <div class="box-body" style="display: none;">
                        <!-- start box -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('pangkat/admin/adduser') }}">
                          {!! csrf_field() !!}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Name</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                             <label class="col-md-4 control-label">Username</label>

                              <div class="col-md-6">
                                 <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                 @if ($errors->has('username'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                 @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Level</label>

                              <div class="col-md-6">
                                    <select class="form-control" name="level">
                                      <option value="2">User</option>
                                      <option value="1">Verifikator</option>
                                      <option value="0">Admin</option>
                                    </select>
                                  </div>
                          </div>
                          <div class="col-md-12">
                          @php $i =1 @endphp
                          <table width="100%">
                            <tr>
                          @foreach($opd as $opd)
                          <td width="300px">
                          <div class="checkbox">
                                      <label class="">
                                        <input  type="checkbox" value="{{$opd->id_opd}}" name="verif_opd[]"> {{$opd->id_opd.". ".$opd->nm_opd}}
                                      </label>
                          </div>
                          </td>
                          @php $i++ @endphp
                          @if($i ==4)
                          </tr>
                          @php $i =1 @endphp
                          @endif
                          @endforeach
                        </tr>
                        </table>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-user"></i>Tambah User
                                  </button>
                              </div>
                          </div>
                      </form>

                      </div><!-- /.box-body -->
                    </div>

                    <div class="box box-warning">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Kelola User</h3>
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
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>email</th>
                                                    <th>OPD</th>
                                                    <th>Level</th>
                                                    <th>Opsi</th>


                                                  </thead>
                                                  <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach($user as $user)
                                                    <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->verif_OPD}}</td>
                                                    <td>{{level($user->level)}}</td>
                                                    <td>{{level($user->level)}}</td>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                  </tbody>
                                              </table>

                                </div><!-- /.box-body -->
                              </div>

</section>
@stop
