<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">REKAP PEMAKAIAN SPAREPART PER UNIT</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">PERIODE : {{$bln}}/{{$thn}}</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>          
          <tr>
            <td colspan="14"></td>
          </tr>         
          <tr>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Kode</td>
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Unit/Alat</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Spare Part</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Jml Ban Luar</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Ban Luar(Rp)</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Ban Dalam</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Flape</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Under Carriage</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">1 1/8 “ - Roll</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Wire Rope</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">Bangun Alat</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;" rowspan="2">TOTAL</td>
          </tr>
          <tr>
            <td align="center" style="font-size: 7;border-bottom: 1px solid #000000;">Jml Wire Roope</td>
          </tr>
          @php
            $totalSpart = 0;
            $totalJumBanLuar = 0;
            $totalBanLuar = 0;
            $totalBanDalam = 0;
            $totalFlape = 0;
            $totalUnderCarriage = 0;
            $totalWrQty = 0;
            $totalWrNil = 0;
            $totalTtl = 0;
          @endphp
          @foreach ($getSumNilai as $gsn)
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kdfa']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['nmfa']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['spart'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['jumBanLuar']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['banLuar'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['banDalam'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['flape'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['underCarriage'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['wrQty']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['wrNil'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['total'], 2, ',', '.') }}</td>
          </tr>
          <tr>
            <td></td>
          </tr>
            @php
              $totalSpart += $gsn['spart'];
              $totalJumBanLuar += $gsn['jumBanLuar'];
              $totalBanLuar += $gsn['banLuar'];
              $totalBanDalam += $gsn['banDalam'];
              $totalFlape += $gsn['flape'];
              $totalUnderCarriage += $gsn['underCarriage'];
              $totalWrQty += $gsn['wrQty'];
              $totalWrNil += $gsn['wrNil'];
              $totalTtl += $gsn['total'];
            @endphp
          @endforeach          
          
        <tbody>
        <tfoot>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalSpart, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$totalJumBanLuar}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalBanLuar, 2, ',', '.') }}</td>            
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalBanDalam, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalFlape, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalUnderCarriage, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$totalWrQty}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalWrNil, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl, 2, ',', '.') }}</td>
          </tr>
        </tfoot>    
    </table>
  </body>
</html>
