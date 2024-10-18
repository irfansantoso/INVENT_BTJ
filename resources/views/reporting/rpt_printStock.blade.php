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
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">STOCK INVENTORY</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
          </tr>
          <tr>
            <td colspan="8"></td>
          </tr>         
          <tr>
            <td style="font-size: 8;">Kd_Brg</td>
            <td style="font-size: 8;">Kel_Brg</td>
            <td style="font-size: 8;">Stock Akhir</td>
            <td style="font-size: 8;" width="30">Nama Brg</td>
            <td style="font-size: 8;">Ukuran</td>
            <td style="font-size: 8;">UOM</td>
            <td style="font-size: 8;">Merk</td>
            <td style="font-size: 8;">Status</td>
          </tr> 
        </thead>
        <tbody>

        @foreach ($dataStock as $gsn) 

          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kd_brg']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kel_brg']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['qty']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['part_numb']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['ukuran']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['uom']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['merk']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['status']}}</td>
          </tr>
          
        @endforeach        
        </tbody>
                   
    </table>
  </body>

</html>