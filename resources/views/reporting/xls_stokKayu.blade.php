<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" >
    

    <h2>PT. BTJ</h2>
    <h5>Stock Log Per Tgl : {{ $tgl_laporan }}</h5>    
    <table id="tb2" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 49</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN MANTOBAR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 57</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">SANGAI DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">SANGAI AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TANJUNG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">KABUAU DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">KABUAU AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">HANJALIPAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 1px solid #000000;">MERANTI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
         
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
 
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>        
        <tr style="border: 1px solid #000000;background-color:#Dcdedb;">
          <td style="border: 1px solid #000000;background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif

          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'600','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'731','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
        </tr>
      </tbody>
    </table>

    <h2>PT. BTJ</h2>
    <h5>Stock Log Per Tgl : {{ $tgl_laporan }}</h5>    
    <table id="tb3" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 49</th>    
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN MANTOBAR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 57</th>      
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">SANGAI DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">SANGAI AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TANJUNG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">KABUAU DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TONGKANG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">KABUAU AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">HANJALIPAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TONGKANG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th>M3</th>  
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th>M3</th>        
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>      
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>    
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th> 
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th> 
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>          
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th> 
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = $arr1; 

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
            <td style="border: 1px solid #000000;">Total Kayu {{ $jsnx['thnprod'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpnQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['tpnVol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpk49Qty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['tpk49Vol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpn2Qty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['tpn2Vol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpk57Qty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['tpk57Vol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lsdQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['lsdVol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lsaQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['lsaVol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['ltQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['ltVol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lkdQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['lkdVol']) }}</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lkaQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['lkaVol']) }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lhQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['lhVol']) }}</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ round($jsnx['totalVol']) }}</td>
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
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Grand Total</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpnQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpnVol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpk49Qty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpk49Vol) }}</th>

          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpn2Qty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpn2Vol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpk57Qty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpk57Vol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lsdQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_lsdVol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lsaQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_lsaVol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_ltQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_ltVol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lkdQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_lkdVol) }}</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lkaQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_lkaVol) }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lhQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_lhVol) }}</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_totalVol) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->