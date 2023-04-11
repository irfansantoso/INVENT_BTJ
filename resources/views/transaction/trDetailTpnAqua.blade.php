@extends('template')
@section('content')
<!-- Content Header (Page header) -->
    <!-- Default box -->
    <br>
    @if(session('success'))
      <p class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if(session('error'))
      <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('error') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-info">
      <!-- <div class="card-header">
        <h3 class="card-title">Add Form Detail</h3>
      </div> -->
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailTpnAqua.add') }}" method="POST">
         @csrf
        <input type="hidden" name="id_header_tpn_in" id="id_header_tpn_in" value="{{ $getHeaderTpn->id_header_tpn_in }}">
        <input type="hidden" name="no_tpn" id="no_tpn" value="{{ $getHeaderTpn->no_tpn }}">
        <input type="hidden" name="tgl_input_tpn" id="tgl_input_tpn" value="{{ $getHeaderTpn->tgl_input_tpn }}">
        <input type="hidden" name="thn_produksi_tpn" id="thn_produksi_tpn" value="{{ $getHeaderTpn->thn_produksi_tpn }}">
        <input type="hidden" name="lokasi_tpn" id="lokasi_tpn" value="{{ $getHeaderTpn->lokasi_tpn }}">
        <input type="hidden" name="hph" id="hph" value="BCT">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No TPN :</label>
                  {{ $getHeaderTpn->no_tpn }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl :</label>                
                  {{ $getHeaderTpn->tgl_input_tpn }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tahun :</label>                
                  {{ $getHeaderTpn->thn_produksi_tpn }}
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Lokasi :</label>
                  {{ $getHeaderTpn->lokasi_tpn }} - {{ $getLoc[0]['nama_lokasi']; }}
              </div>
            </div>          
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-1">
              <div class="form-group">
                <label>Thn Rkt</label>
                  <input type="text" class="form-control" name="thn_rkt" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask autofocus>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Btg</label>                
                  <input type="text" class="form-control" id="no_btg" name="no_btg">
                  <input type="hidden" class="form-control" id="nobtgx" name="nobtgx">            
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl Ukur</label>
                  <input type="text" class="form-control" name="tgl_ukur" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jns Kayu</label>
                  <select class="form-control select2" name="jns_kayu" id="jns_kayu" style="width: 100%;">
                    <option value="" selected="selected">-- -- --</option>
                    @foreach ($kayu as $ky)
                      <option value="{{ $ky->kode_kayu }}">{{ $ky->nama_kayu }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Chainsaw</label>
                  <select class="form-control select2" name="kode_chainsaw" id="kode_chainsaw" style="width: 100%;">
                    <option value="000" selected="selected">-- Chainsaw --</option>
                    @foreach ($chainsaw as $cs)
                      <option value="{{ $cs->kode_chainsaw }}">{{ $cs->nama_chainsaw }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Op.Traktor</label>
                  <select class="form-control select2" name="kode_driver" id="kode_driver" style="width: 100%;">
                    <option value="000" selected="selected">-- Traktor --</option>
                    @foreach ($driver as $drv)
                      <option value="{{ $drv->kode_driver }}">{{ $drv->nama_driver }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Op.Kupas</label>
                  <select class="form-control select2" name="kode_kupas" id="kode_kupas" style="width: 100%;">
                    <option value="000" selected="selected">-- Kupas --</option>
                    @foreach ($kupas as $kp)
                      <option value="{{ $kp->kode_kupas }}">{{ $kp->nama_kupas }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Pjg</label>
                  <input type="number" step="any" class="form-control" id="pjg" name="pjg">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Pkl</label>                
                  <input type="number" class="form-control" id="pkl" name="pkl">               
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Ujg</label>                
                  <input type="number" class="form-control" id="ujg" name="ujg">
              </div>
            </div>            
            <div class="col-sm-1">
              <div class="form-group">
                <label>Rt2</label>
                  <input type="text" class="form-control" id="rt2" name="rt2" readonly>                  
              </div>
            </div>            
            <div class="col-sm-1">
              <div class="form-group">
                <label>Cct</label>
                  <input type="number" class="form-control" id="cct" name="cct">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Pcct %</label>
                  <input type="text" class="form-control" id="pcct" name="pcct" readonly>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Vol</label>
                  <input type="text" class="form-control" id="vol" name="vol" readonly>
              </div>
            </div>            
            <div class="col-sm-1">
              <div class="form-group">
                <label>Petak</label>
                  <input type="text" class="form-control" id="petak" name="petak">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Kelas</label>
                  <input type="text" class="form-control" id="kelas" name="kelas" readonly>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Timbul?</label>
                  <select class="custom-select" name="timbul">
                    <option value="YA">TIMBUL</option>
                    <option value="TIDAK">TENGGELAM</option>
                  </select>
              </div>
            </div>
          </div>
        <!-- /.card-body -->
        </div>

        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>              
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Thn Rkt</th>
              <th>No Btg</th>
              <th>Tgl Ukur</th>
              <th>Jns Kayu</th>
              <th>Chainsaw</th>
              <th>Traktor</th>
              <th>Kupas</th>
              <th>Pjg</th>
              <th>Pkl</th>
              <th>Ujg</th>
              <th>Rt2</th>
              <th>Vol</th>
              <th>Cct</th>
              <th>Pcct</th>
              <th>Petak</th>
              <th>Kelas</th>
              <th>Timbul</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getDetTpn as $gdt)
            <tr>              
                <td>{{ $gdt->thn_rkt }}</td>
                <td>{{ $gdt->no_btg }}</td>
                <td>{{ $gdt->tgl_ukur }}</td>
                <td>{{ $gdt->mk }}</td>
                <td>{{ $gdt->mc }}</td>
                <td>{{ $gdt->md }}</td>
                <td>{{ $gdt->kps }}</td>
                <td>{{ $gdt->pjg }}</td>
                <td>{{ $gdt->pkl }}</td>
                <td>{{ $gdt->ujg }}</td>
                <td>{{ $gdt->rt2 }}</td>
                <td>{{ $gdt->vol }}</td>
                <td>{{ $gdt->cct }}</td>
                <td>{{ $gdt->pcct }}</td>
                <td>{{ $gdt->petak }}</td>
                <td>{{ $gdt->kelas }}</td>
                <td>{{ $gdt->timbul }}</td>
                <td>
                @if(Auth::user()->level == "administrator")
                  <a href="#" data-toggle="modal" 
                    data-target="#modal-editTpnIn" 
                    data-id="{{ $gdt->id_detail_tpn_in }}" 
                    data-thnrkt="{{ $gdt->thn_rkt }}" 
                    data-kode="{{ $gdt->no_btg }}" 
                    data-tglukur="{{ $gdt->tgl_ukur }}" 
                    data-ky="{{ $gdt->jns_kayu }}"
                    data-kc="{{ $gdt->kode_chainsaw }}"
                    data-kd="{{ $gdt->kode_driver }}"
                    data-kk="{{ $gdt->kode_kupas }}" 
                    data-pjg="{{ $gdt->pjg }}" 
                    data-pkl="{{ $gdt->pkl }}" 
                    data-ujg="{{ $gdt->ujg }}"
                    data-rt2="{{ $gdt->rt2 }}"
                    data-cct="{{ $gdt->cct }}"
                    data-pcct="{{ $gdt->pcct }}"
                    data-vol="{{ $gdt->vol }}"
                    data-petak="{{ $gdt->petak }}"
                    data-kelas="{{ $gdt->kelas }}"
                    data-timbul="{{ $gdt->timbul }}"
                    class="btn btn-warning btn-sm edit-form">Edit</a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gdt->id_detail_tpn_in }}" data-nobtg="{{ $gdt->no_btg }}" class="btn btn-danger btn-sm del-conf-det-tpn">Delete</a>
                @else
                  No Access
                @endif
                </td>
            </tr>
            @endforeach                     
          </tbody>          
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal -->
    <div class="modal fade" id="modal-editTpnIn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trDetailTpnAqua.edit') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="id_header_tpn_in" id="id_header_tpn_in" value="{{ $getHeaderTpn->id_header_tpn_in }}">
                  <div class="modal-body">
                    <div class="card-body"> 
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Thn Rkt</label>
                              <input type="text" class="form-control" name="thn_rkt" id="thnrkt" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask autofocus>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>No Btg</label>                
                              <input type="text" class="form-control" id="nobtg" name="no_btg" readonly>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Tgl Ukur</label>
                              <input type="text" class="form-control" name="tgl_ukur" id="tglukur" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Jns Kayu</label>
                              <select class="form-control select2" name="jns_kayu" id="jns_kayu_m" style="width: 100%;">
                                <option value="">-- -- --</option>
                                @foreach ($kayu as $ky)
                                  <option value="{{ $ky->kode_kayu }}">{{ $ky->nama_kayu }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Op.Chainsaw</label>
                              <select class="form-control select2" name="kode_chainsaw" id="kode_chainsaw_m" style="width: 100%;">
                                <option selected="">-- -- --</option>
                                @foreach ($chainsaw as $cs)
                                  <option value="{{ $cs->kode_chainsaw }}">{{ $cs->nama_chainsaw }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>                    
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Op.Traktor</label>
                              <select class="form-control select2" name="kode_driver" id="kode_driver_m" style="width: 100%;">
                                <option selected="">-- -- --</option>
                                @foreach ($driver as $drv)
                                  <option value="{{ $drv->kode_driver }}">{{ $drv->nama_driver }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>                      
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Op.Kupas</label>
                              <select class="form-control select2" name="kode_kupas" id="kode_kupas_m" style="width: 100%;">
                                <option value="000" selected="">-- -- --</option>
                                @foreach ($kupas as $kp)
                                  <option value="{{ $kp->kode_kupas }}">{{ $kp->nama_kupas }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>          
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Pjg</label>
                              <input type="number" step="any" class="form-control dt_pjg" id="pjg-m" name="pjg">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Pkl</label>                
                              <input type="number" class="form-control dt_pkl" id="pkl-m" name="pkl">
                              <span id="pjg-x"></span>               
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Ujg</label>                
                              <input type="number" class="form-control dt_ujg" id="ujg-m" name="ujg">
                          </div>
                        </div>            
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Rt2</label>
                              <input type="text" class="form-control dt_rt2" id="rt2-m" name="rt2" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">         
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Cct</label>
                              <input type="number" class="form-control dt_cct" id="cct-m" name="cct">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Pcct %</label>
                              <input type="text" class="form-control dt_pcct" id="pcct-m" name="pcct" readonly>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Vol</label>
                              <input type="text" class="form-control dt_vol" id="vol-m" name="vol" readonly>
                          </div>
                        </div>            
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Petak</label>
                              <input type="text" class="form-control dt_petak" id="petak-m" name="petak">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Kelas</label>
                              <input type="text" class="form-control dt_kelas" id="kelas-m" name="kelas" readonly>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Timbul?</label>
                              <select class="custom-select" name="timbul" id="dt_timbul">
                                <option value="YA">TIMBUL</option>
                                <option value="TIDAK">TENGGELAM</option>
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Edit</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trDetailTpnAqua.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus No-Btg 
                      <span id="id-destroy2"></span> ?
                      <input type='hidden' name='del_id' id='id-destroy'>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection