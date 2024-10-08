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
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR PEMAKAIAN BBM (HM) DAN PELUMAS</td>            
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
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Kode</td>
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Unit/Alat</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Tt HM/KM</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Ltr Solar</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Rata2 HM/KM</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Total Solar (Rp)</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Bensin</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Minyak Tanah</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Minyak Rem</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Minyak Grease</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Ltr Pelumas</td>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Pelumas</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">TOTAL</td>
          </tr>
          
          @php
            $totalLtr_solar = 0;
            $totalRata_hmkm = 0;
            $totalTtl_solar_rupiah = 0;
            $totalTtl_bensin_rupiah = 0;
            $totalTtl_mtanah_rupiah = 0;
            $totalTtl_mrem_rupiah = 0;
            $totalTtl_mgrease_rupiah = 0;
            $totalLtr_pelumas= 0;
            $totalTtl_pelumas_rupiah = 0;
            $totalTtl_mrem_rupiah = 0;
            $totalTtlAll_rupiah = 0;
          @endphp
          @foreach ($getSumNilai as $gsn)
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kdfa']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['nmfa']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['ttl_hmkm']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['ltr_solar']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['rata_hmkm']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_solar_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_bensin_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_mtanah_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_mrem_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_mgrease_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ltr_pelumas'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttl_pelumas_rupiah'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['ttlAll'], 2, ',', '.') }}</td>
          </tr>
            @php
              $totalLtr_solar += $gsn['ltr_solar'];
              $totalRata_hmkm += $gsn['rata_hmkm'];
              $totalTtl_solar_rupiah += $gsn['ttl_solar_rupiah'];
              $totalTtl_bensin_rupiah += $gsn['ttl_bensin_rupiah'];
              $totalTtl_mtanah_rupiah += $gsn['ttl_mtanah_rupiah'];
              $totalTtl_mrem_rupiah += $gsn['ttl_mrem_rupiah'];
              $totalTtl_mgrease_rupiah += $gsn['ttl_mgrease_rupiah'];              
              $totalLtr_pelumas += $gsn['ltr_pelumas'];
              $totalTtl_pelumas_rupiah += $gsn['ttl_pelumas_rupiah'];
              $totalTtlAll_rupiah += $gsn['ttlAll'];
            @endphp
          @endforeach          
          <tr>
            <td></td>
          </tr>
        <tbody>
        <tfoot>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalLtr_solar, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$totalRata_hmkm}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_solar_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_bensin_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_mtanah_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_mrem_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_mgrease_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalLtr_pelumas, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtl_pelumas_rupiah, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalTtlAll_rupiah, 2, ',', '.') }}</td>
          </tr>
        </tfoot>    
    </table>
  </body>
</html>
