@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptStokAkhGab.rpt') }}" method="POST">
     @csrf        
    <div class="card-body">          
      <div class="row">        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal</label>
              <input type="text" class="form-control" value="{{ $dtNow }}" name="tgl_laporan" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
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

@if(session('tgl_laporan') != "")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    @php
      $tglPeriode = date("d-m-Y", strtotime(session('tgl_laporan')));
    @endphp
    <h4 style="text-align:center;">STOK PER </h4>
    <h6 style="text-align:center;">PERIODE S/D {{ $tglPeriode }}</h6>
    <br>
    <table id="" class="table table-bordered">
      <thead>
        <tr style="border-color: #000000;">
          <th rowspan="3" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Jenis Kayu</th>
          <th colspan="6" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">KELAS DIAMETER</th>          
          <th rowspan="2" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>              
        </tr>
        <tr>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 40 - 49 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 50 - 59 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 60 Up )</th>
        </tr>
        <tr>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = Session::get('getSel'); 

          $sum_lowQty = 0;
          $sum_lowVol = 0;
          $sum_middleQty = 0;
          $sum_middleVol = 0;
          $sum_highQty = 0;
          $sum_highVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @php ($nama_lokasi = false);($nama_lokasi2 = false); @endphp
        @foreach ($getSelDt as $jsnx)
          @if($nama_lokasi != $jsnx['nama_lokasi'])
              @if($nama_lokasi != false)
                    
                      </td>
                  </tr>
              @endif
          @php ($nama_lokasi = $jsnx['nama_lokasi']) @endphp
          <tr>
            <td colspan="9" style="border: 1px solid #000000;font-weight: bold;">{{ $jsnx['nama_lokasi']; }}</td>
          </tr>
          @endif        
          <tr>              
              <td style="border: 1px solid #000000;">{{ $jsnx['namakayu'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['lowQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['lowVol'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['middleQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['middleVol'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['highQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['highVol'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ $jsnx['totalVol'] }}</td>
          </tr>                 
          @php          
            $sum_lowQty += $jsnx['lowQty'];
            $sum_lowVol += $jsnx['lowVol'];
            $sum_middleQty += $jsnx['middleQty'];
            $sum_middleVol += $jsnx['middleVol'];
            $sum_highQty += $jsnx['highQty'];
            $sum_highVol += $jsnx['highVol'];
            $sum_totalQty += $jsnx['totalQty'];
            $sum_totalVol += $jsnx['totalVol'];
          @endphp
          @if($nama_lokasi2 != $jsnx['nama_lokasi'])
              @if($nama_lokasi2 != false)
                  </td>
                </tr>
              @endif
          
          <tr>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">TOTAL</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_lowQty }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_lowVol }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_middleQty }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_middleVol }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_highQty }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_highVol }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_totalQty }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ $sum_totalVol }}</td>
          </tr>  
           
      </tbody>
      @php ($nama_lokasi2 = $jsnx['nama_lokasi']) @endphp
          @endif      
        @endforeach
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">GRAND TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot> 

    </table>
    <br>    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection