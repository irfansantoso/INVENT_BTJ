<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR STATUS MOVING SPAREPART</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">BULAN : {{$bln}}/{{$thn}}</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Kode</td>
            <td width="30" align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Unit/Alat</td>
            <td width="20" align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Ukuran/Part No.</td>
            <td align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Satuan</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Saldo Awal</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Penerimaan</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Pengeluaran</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Saldo Akhir</td>
            <td align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Banyak Pemakaian</td>
            <td width="20" align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Status Moving</td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
        </thead>
        <tbody>
          @php
            $totalSaldoAwal = 0;
            $totalPenerimaan = 0;
            $totalPengeluaran = 0;
            $totalSaldoAkhir = 0;
          @endphp

          @foreach ($getSumNilai as $gsn)            
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kd_brg']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['nmbrg']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ukuran']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['satuan']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['saQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAwal'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['penerimaanQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['penerimaanQty'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['pengeluaranQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['pengeluaran'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['saldoAkhirQty']; }}</td>              
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAkhir'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ Helper::countKdBrg($gsn['kd_brg']) }}</td>
              @php
              if(Helper::countKdBrg($gsn['kd_brg']) > 2){
              @endphp
              <td align="right" valign="bottom" style="font-size: 8;background-color: green;">Fast Moving</td>
              @php
              }else if(Helper::countKdBrg($gsn['kd_brg']) > 0 AND Helper::countKdBrg($gsn['kd_brg']) < 3){
              @endphp
              <td align="right" valign="bottom" style="font-size: 8;background-color: yellow;">Slow Moving</td>
              @php
              }else if(Helper::countKdBrg($gsn['kd_brg']) < 1 AND $gsn['saldoAkhirQty'] > 0){
              @endphp
              <td align="right" valign="bottom" style="font-size: 8;background-color: red;">Deadstock</td>
              @php
              }else{
              @endphp
              <td align="right" valign="bottom" style="font-size: 8;background-color: #40A2D8;">Stock Kosong</td>
              @php
              }
              @endphp
            </tr>            

            @php
              $totalSaldoAwal += $gsn['saldoAwal'];
              $totalPenerimaan += $gsn['penerimaan'];
              $totalPengeluaran += $gsn['pengeluaran'];
              $totalSaldoAkhir += $gsn['saldoAkhir'];
            @endphp
          @endforeach
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">TOTAL :</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>            
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalSaldoAwal, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalPenerimaan, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalPengeluaran, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalSaldoAkhir, 2, ',', '.') }}</td>
            </tr>
          </tbody>            
    </table>
  </body>
</html>
