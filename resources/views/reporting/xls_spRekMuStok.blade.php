<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR MUTASI PERSEDIAAN BARANG SPAREPART</td>
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
            <td width="15" align="center" valign="bottom" style="font-size: 8;font-weight: bold;">Saldo Awal</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;font-weight: bold;">Penerimaan</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;font-weight: bold;">Pengeluaran</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;font-weight: bold;">Saldo Akhir</td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          @php
            $totalSaldoAwal = 0;
            $totalPenerimaan = 0;
            $totalPengeluaran = 0;
            $totalSaldoAkhir = 0;
          @endphp
          @foreach ($getSumNilai as $gsn)         
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kelbrg']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ketUnit']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAwal'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['penerimaan'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['pengeluaran'], 2, ',', '.') }}</td>
            @php
            if($gsn['saldoAkhir'] >= '70000000'){
            @endphp
            <td align="right" valign="bottom" style="font-size: 12;">{{ number_format($gsn['saldoAkhir'], 2, ',', '.') }}</td>
            @php
            }else{
            @endphp
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAkhir'], 2, ',', '.') }}</td>
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
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;">T O T A L  :</td>
            <td align="right" valign="bottom" style="font-size: 12;">{{ number_format($totalSaldoAwal, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 12;">{{ number_format($totalPenerimaan, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 12;">{{ number_format($totalPengeluaran, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 12;">{{ number_format($totalSaldoAkhir, 2, ',', '.') }}</td>
          </tr>            
        </tbody>
    </table>
  </body>
</html>
