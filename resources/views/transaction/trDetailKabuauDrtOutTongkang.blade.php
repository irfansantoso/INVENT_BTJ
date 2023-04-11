@extends('template')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Default box -->
    <br>
    @if(session('success'))
      <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if(session('error'))
      <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('error') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-success">
      <!-- <div class="card-header">
        <h3 class="card-title">Add Form Detail</h3>
      </div> -->
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailKabuauAirOutTongkang.add') }}" method="POST">
         @csrf
        <input type="hidden" name="id_header_tpn_out" id="id_header_tpn_out" value="{{ $getHeaderTpnOut[0]['id_header_tpn_out'] }}">
        <input type="hidden" name="no_tpn_out" id="no_tpn_out" value="{{ $getHeaderTpnOut[0]['no_tpn_out'] }}">
        <input type="hidden" name="no_loglist" id="no_loglist" value="{{ $getHeaderTpnOut[0]['no_loglist'] }}">
        <input type="hidden" name="tgl_input_tpn_out" id="tgl_input_tpn_out" value="{{ $getHeaderTpnOut[0]['tgl_input_tpn_out'] }}">
        <input type="hidden" name="lokasi_tpk" id="lokasi_tpk" value="{{ $getHeaderTpnOut[0]['lokasi_tpn'] }}">
        <input type="hidden" name="lokasi_tujuan" id="lokasi_tujuan" value="{{ $getHeaderTpnOut[0]['tujuan'] }}">
        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No LKD :</label><br>
                  {{ $getHeaderTpnOut[0]['no_tpn_out'] }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl :</label><br>                
                  {{ $getHeaderTpnOut[0]['tgl_input_tpn_out'] }}
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Trip :</label><br>                
                  {{ $getHeaderTpnOut[0]['trip'] }}
              </div>
            </div>            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Lokasi :</label><br>
                  {{ $getHeaderTpnOut[0]['nama_lokasi'] }}
              </div>
            </div>    
            <div class="col-sm-3">
              <div class="form-group">
                <label>Tujuan :</label><br>
                  {{ $getHeaderTpnOut[0]['mlo'] }}
              </div>
            </div>       
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama Kapal :</label><br/>
                  {{ $getHeaderTpnOut[0]['md'] }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama Tongkang :</label><br/>                
                  {{ $getHeaderTpnOut[0]['mua'] }}
              </div>
            </div>                  
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No Batang</label>
                  <select class="form-control select2" name="no_btg" id="no_btg" style="width: 100%;">
                    <option value="" selected="selected">-- Pilih No Btg --</option>
                    @foreach ($getNoBtg as $gnb)
                      <option value="{{ $gnb->no_btg }}">{{ $gnb->no_btg }}</option>
                    @endforeach
                  </select>
              </div>
            </div>          
          </div>
          
        <!-- /.card-body -->
        </div>

        <div class="card-footer">
          <button class="btn btn-info">Simpan</button>
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
              <th>Thn Prod</th>
              <th>No Btg</th>
              <th>Thn RKT</th>
              <th>Petak</th>
              <th>Jns Kayu</th>
              <th>Pjg</th>
              <th>Pkl</th>
              <th>Ujg</th>
              <th>Rt2</th>
              <th>Cct</th>
              <th>Pcct</th>
              <th>Vol</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getDetPos as $gdp)
            <tr>              
                <td>{{ $gdp->thn_prod }}</td>
                <td>{{ $gdp->no_btg }}</td>
                <td>{{ $gdp->thn_rkt }}</td>
                <td>{{ $gdp->petak }}</td>
                <td>{{ $gdp->nm_kayu }}</td>
                <td>{{ $gdp->pjg }}</td>
                <td>{{ $gdp->pkl }}</td>
                <td>{{ $gdp->ujg }}</td>
                <td>{{ $gdp->rt2 }}</td>                
                <td>{{ $gdp->cct }}</td>
                <td>{{ $gdp->pcct }}</td>
                <td>{{ $gdp->vol }}</td>   
                <td>
                @if(Auth::user()->level == "administrator")
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gdp->id_detail_position }}" data-nobtg="{{ $gdp->no_btg }}" data-fromlok="{{ $gdp->from_lokasi }}" data-tolok="{{ $gdp->to_lokasi }}" class="btn btn-danger btn-sm del-conf-det-tpn">Delete</a>
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
                <form action="{{ route('trDetailKabuauAirOutTongkang.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus No-Btg 
                      <span id="id-destroy2"></span> ?
                      <input type='hidden' name='nobtg_del' id='id-destroy'>
                      <input type='hidden' name='fromlok_del' id='from-lok'>
                      <input type='hidden' name='tolok_del' id='to-lok'>
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