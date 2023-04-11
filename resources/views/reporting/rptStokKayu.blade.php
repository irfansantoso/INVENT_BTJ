@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptStokKayu.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>HPH</label><br>
              <select class="form-control" name="hph" id="hph" style="width: 100%;">
                <option value="BCT">BCT</option>
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal</label>
              <input type="text" class="form-control" name="tgl_laporan" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Jenis Laporan</label><br>
              <select class="form-control" name="jnsLap" id="jnsLap" style="width: 100%;">
                  <option value="xls">XLS</option>
                  <option value="view">VIEW</option>
              </select>
          </div>
        </div>
      </div>
    <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <button class="btn btn-success">Submit</button>
    </div>
    <!-- /.card-footer -->
  </form>              
</div>
  <!-- /.card -->

@if(session('hph') != "")
<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BTJ</h2>
    <h6>Stock Log Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="bct" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 49</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN MANTOBAR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 57</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">SANGAI DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">SANGAI AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TANJUNG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">KABUAU DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">KABUAU AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">HANJALIPAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#f8ec84;">Btg</th>
          <th style="background-color:#f8ec84;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th style="background-color:#f8ec84;">Btg</th>
          <th style="background-color:#f8ec84;">M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>MERANTI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
         
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif

          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif

          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif

          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
 
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td>KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif

          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif

          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>        
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->  
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BTJ</h2>
    <h6>Stock Log Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="bct2" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 49</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN MANTOBAR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 57</th>         
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">SANGAI DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">SANGAI AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TANJUNG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">KABUAU DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TONGKANG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">KABUAU AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">HANJALIPAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TONGKANG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>         
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>      
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>    
          <th>Btg</th>
          <th>M3</th> 
          <th style="background-color:#f8ec84;">Btg</th>
          <th style="background-color:#f8ec84;">M3</th> 
          <th>Btg</th>
          <th>M3</th>          
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th style="background-color:#f8ec84;">Btg</th>
          <th style="background-color:#f8ec84;">M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = Session::get('getSel'); 

          $sum_tpnQty = 0;
          $sum_tpnVol = 0;
          $sum_tpk49Qty = 0;
          $sum_tpk49Vol = 0;
          $sum_tpn2Qty = 0;
          $sum_tpn2Vol = 0;
          $sum_tpk57Qty = 0;
          $sum_tpk57Vol = 0;
          $sum_lsdQty = 0;
          $sum_lsdVol = 0;
          $sum_lsaQty = 0;
          $sum_lsaVol = 0;
          $sum_ltQty = 0;
          $sum_ltVol = 0;
          $sum_lkdQty = 0;
          $sum_lkdVol = 0;
          $sum_tongQty = 0;
          $sum_tongVol = 0;
          $sum_lkaQty = 0;
          $sum_lkaVol = 0;
          $sum_lhQty = 0;
          $sum_lhVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td>Total Kayu {{ $jsnx['thnprod'] }}</td>
            <td>{{ $jsnx['tpnQty'] }}</td>
            <td>{{ round($jsnx['tpnVol']) }}</td>
            <td>{{ $jsnx['tpk49Qty'] }}</td>
            <td>{{ round($jsnx['tpk49Vol']) }}</td>
            <td>{{ $jsnx['tpn2Qty'] }}</td>
            <td>{{ round($jsnx['tpn2Vol']) }}</td>
            <td>{{ $jsnx['tpk57Qty'] }}</td>
            <td>{{ round($jsnx['tpk57Vol']) }}</td>
            <td>{{ $jsnx['lsdQty'] }}</td>
            <td>{{ round($jsnx['lsdVol']) }}</td>
            <td>{{ $jsnx['lsaQty'] }}</td>
            <td>{{ round($jsnx['lsaVol']) }}</td>
            <td>{{ $jsnx['ltQty'] }}</td>
            <td>{{ round($jsnx['ltVol']) }}</td>
            <td>{{ $jsnx['lkdQty'] }}</td>
            <td>{{ round($jsnx['lkdVol']) }}</td>
            <td style="background-color:#f8ec84;">-</td>
            <td style="background-color:#f8ec84;">-</td>
            <td>{{ $jsnx['lkaQty'] }}</td>
            <td>{{ round($jsnx['lkaVol']) }}</td>
            <td>{{ $jsnx['lhQty'] }}</td>
            <td>{{ round($jsnx['lhVol']) }}</td>
            <td style="background-color:#f8ec84;">-</td>
            <td style="background-color:#f8ec84;">-</td>
            <td>{{ $jsnx['totalQty'] }}</td>
            <td>{{ round($jsnx['totalVol']) }}</td>
        </tr>
        @php
          $sum_tpnQty += $jsnx['tpnQty'];
          $sum_tpnVol += $jsnx['tpnVol'];
          $sum_tpk49Qty += $jsnx['tpk49Qty'];
          $sum_tpk49Vol += $jsnx['tpk49Vol'];
          $sum_tpn2Qty += $jsnx['tpn2Qty'];
          $sum_tpn2Vol += $jsnx['tpn2Vol'];
          $sum_tpk57Qty += $jsnx['tpk57Qty'];
          $sum_tpk57Vol += $jsnx['tpk57Vol'];
          $sum_lsdQty += $jsnx['lsdQty'];
          $sum_lsdVol += $jsnx['lsdVol'];
          $sum_lsaQty += $jsnx['lsaQty'];
          $sum_lsaVol += $jsnx['lsaVol'];
          $sum_ltQty += $jsnx['ltQty'];
          $sum_ltVol += $jsnx['ltVol'];
          $sum_lkdQty += $jsnx['lkdQty'];
          $sum_lkdVol += $jsnx['lkdVol'];
          $sum_lkaQty += $jsnx['lkaQty'];
          $sum_lkaVol += $jsnx['lkaVol'];
          $sum_lhQty += $jsnx['lhQty'];
          $sum_lhVol += $jsnx['lhVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color:#C0c1c0;">Grand Total</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpnQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpnVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpk49Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpk49Vol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpn2Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpn2Vol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpk57Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpk57Vol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lsdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_lsdVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lsaQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_lsaVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_ltQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_ltVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lkdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_lkdVol) }}</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lkaQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_lkaVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lhQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_lhVol) }}</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_totalVol) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->  
</div>
<!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection