<html>
<head>  
  
  <style type="text/css">
    .fontSize {
      font-size: xx-small;
    }
    .fontSizeDet {
      font-size: 8px;
    }
  </style>
  
</head>

<body>
    <table cellspacing="0" border="0" width="100%">
      <colgroup width="29"></colgroup>
      <colgroup width="92"></colgroup>
      <colgroup width="159"></colgroup>
      <colgroup width="85"></colgroup>
      <colgroup width="37"></colgroup>
      <colgroup width="182"></colgroup>
      <colgroup width="253"></colgroup>
      <colgroup span="3" width="64"></colgroup>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">PT. BUMI TRIKAMA JAYASRI</font></td>
      </tr>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">Base Camp Mantobar</font></td>
      </tr>
      <tr>
        <td colspan="10" height="28" align="center" valign=middle><b><font size=4 color="#000000">BUKTI PERMINTAAN BARANG</font></b></td>
        </tr>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">Kepada Yth : {{ $getHeaderPb->kepada }}</font></td>
      </tr>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">Dari : Pimpinan Camp / Logistic Camp / Mechanic Camp</font></td>
      </tr>
      <tr>
        <td height="10" align="left" valign=bottom><font color="#000000"><br></font></td>
      </tr>
      <tr>
        <td colspan="7" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">NO BPB : {{ $getHeaderPb->no_pb }}</font></td>
        <td colspan="3" align="left" valign=bottom><font color="#000000" class="fontSize">Spare Parts/BBM</font></td>
      </tr>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">DATE : {{ date('d-m-Y', strtotime($getHeaderPb->tgl_pb)) }}</font></td>
      </tr>
      <tr>
        <td colspan="7" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">CAMP : {{ $getHeaderPb->kd_area }}</font></td>
        <td colspan="3" align="left" valign=bottom><font color="#000000" class="fontSize">Status : </font><font color="#ff0000" class="fontSize">{{ $getHeaderPb->status_pb }}</font></td>
      </tr>
      <tr>
        <td colspan="10" height="10" align="left" valign=bottom><font color="#000000" class="fontSize">Kode Unit : {{ $getHeaderPb->kd_unit }}</font></td>
      </tr>
      <tr>
        <td height="10" align="left" valign=bottom><font color="#000000"><br></font></td>
      </tr>
      <tr>
        <td style="border-bottom: 2px double #000000" height="15" align="left" valign="middle" width="20px"><font color="#000000" class="fontSize">No.</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">KD.BARANG &nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">UKURAN/PART#&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">FIG/NO&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">Stk</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">NAMA BARANG&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">KEL BARANG&nbsp;&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">MERK&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">ORDER&nbsp;</font></td>
        <td style="border-bottom: 2px double #000000" align="left" valign="middle"><font color="#000000" class="fontSize">Stn</font></td>
      </tr>
      <?php
      if (count($getDetailPb) > 0) {
      ?>
      @foreach ($getDetailPb as $key => $gds)
      <?php 
        if(empty($gds->jumQty))
        {
          $jumQty = 0;
        }else{
          $jumQty = $gds->jumQty;
        }
      ?>
      <tr>
        <td height="5" align="center" valign=bottom><font color="#000000" class="fontSizeDet">{{ $key + 1}}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->kdbrg }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->ukuran }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet"><br></font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $jumQty }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->part_numb }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->ketjnsalat }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->merk }}</font></td>
        <td align="right" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->qty }}</font></td>
        <td align="left" valign=bottom><font color="#000000" class="fontSizeDet">{{ $gds->uom }}</font></td>
      </tr>
      @endforeach
      <?php } else { ?>
        <tr><td height="20" colspan="10" style="text-align: center;">Data not found</td></tr>
      <?php } ?>
      <tr>
        <td style="border-bottom: 3px solid #000000" height="10" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 3px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
      </tr>
      <tr>
        <td colspan="10" height="20" align="left" valign=bottom><font color="#000000" class="fontSize"></font></td>
      </tr>
      <tr>
        <td colspan="2" height="10" align="center" valign=bottom><font color="#000000" class="fontSize">Disetujui Oleh,</font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize"></font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize">D i p e r i k s a &nbsp; O l e h,</font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize"></font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize"></font></td>
      </tr>
      <tr>
        <td colspan="2" height="10" align="center" valign=bottom><font color="#000000" class="fontSize">Camp Manager</font></td>
        <td colspan="3" align="center" valign=bottom><font color="#000000" class="fontSize">Kepala Gudang</font></td>
        <td colspan="3" align="center" valign=bottom><font color="#000000" class="fontSize">Kepala Mekanik</font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize">Dipesan Mekanik</font></td>
      </tr>
      <tr>
        <td colspan="10" height="40" align="right" valign=bottom><font color="#000000" class="fontSize"></font></td>
      </tr>
      <tr>
        <td colspan="2" height="10" align="center" valign=bottom><font color="#000000" class="fontSize">{{ $getHeaderPb->camp_manager }}</font></td>
        <td colspan="3" align="center" valign=bottom><font color="#000000" class="fontSize">{{ $getHeaderPb->kepala_gudang }}</font></td>
        <td colspan="3" align="center" valign=bottom><font color="#000000" class="fontSize">{{ $getHeaderPb->kepala_mekanik }}</font></td>
        <td colspan="2" align="center" valign=bottom><font color="#000000" class="fontSize">{{ $getHeaderPb->mekanik }}</font></td>
      </tr>

    </table>
  </body>

</html>