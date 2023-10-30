

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>LAPORAN SURAT MASUK</title>
    <style type="text/css">
      @page {
        margin-top: 0.5cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 0.1cm;
      }

      .name-instansi {
        font-size: 15pt;
        font-weight: bold;
        text-transform: uppercase;
      }

      .alamat {
        font-size: 11pt;
        margin-top: -15px;
        margin-bottom: -10px;
      }

      .alamat2 {
        font-size: 9pt;
      }

      .ttd-kiri {
        font-size: 9pt;
        margin-left: 50px;
      }

      .ttd-kanan {
        font-size: 9pt;
        margin-left: 250px;
        text-align: left;
      }

      body {
        font-family: sans-serif;
      }

      table {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: none;
        border-collapse: collapse;
        width: 100%;
      }

      th {
        padding-bottom: 8px;
        padding-top: 8px;
        border-color: #666666;
        background-color: #dedede;
        text-align: center;
      }

      td {
        padding-bottom: 8px;
        padding-top: 8px;
        padding-left: 8px;
        border-color: #666666;
        background-color: #ffffff;
        text-align: left;
      }

      hr {
        border: 1;
        height: 2px;
        color: #333;
        background-color: #333;
      }

      .container {
        position: relative;
      }

      .topright {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 18px;
        border-width: thin;
        padding: 5px;
      }

      .topright2 {
        position: absolute;
        top: 30px;
        right: 50px;
        font-size: 18px;
        border: 1px solid;
        padding: 5px;
        color: red;
      }
    </style>
  </head>
  <body onload="window.print()">
    {{-- <table width="100%">
      <tr>
        <td width="120">
          <img src="foto/logo1.png" alt="logo1" width="80" />
        </td>
        <td align="left">
          <p class="name-school"><!-- Your school name here --></p>
          <p class="alamat">
            <b><!-- Your school address here --></b>
          </p>
          <p class="alamat2"><!-- Your school phone number here --></p>
        </td>
      </tr>
    </table> --}}
    {{-- <hr /> --}}
    <h3 align="center">
      L A P O R A N <br />
      ARSIP DIGITAL SURAT MASUK<br />
      NOMOR
    </h3>
    <p class="alamat2">
      Laporan tanggal:
      <b
        ><u></u></b
      >
      s/d
      <b
        ><u><!-- End date here --></u></b
      >
    </p>
    <table border="1" width="100%">
      <thead>
          <tr>
              <th width="1%" rowspan="2">No.</th>
              <th width="10%" rowspan="2">No Surat</th>
              <th width="20%" rowspan="2">Instansi Pengirim</th>
              <th colspan="3">Surat</th>
              <th width="5%" rowspan="2">Kode Klasifikasi</th>
              <th width="19%" rowspan="2">Keterangan</th>
          </tr>
          <tr>
              <th width="10%">Tanggal Surat</th>
              <th width="15%">No. Surat</th>
              <th width="20%">Perihal</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($cetakPertanggal as $index => $item)
          <tr>
              <td align="center">{{ $index + 1 }}</td>
              <td>{{ $item->No_surat }}</td>
              <td>{{ $item->Instansi_pengirim }}</td>
              <td align="center">{{ $item->Tgl_surat_di_terima }}</td>
              <td align="center">{{ $item->Tgl_surat }}</td>
              <td>{{ $item->Perihal }}</td>
              <td align="center">{{ $item->kls_id }}</td>
              <td>{{ $item->keterangan }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
  
    <table>
      <tr>
        <td width="50%">
          <p class="ttd-kiri">&nbsp;</p>
          <p class="ttd-kiri">Mengetahui,</p>
          <p class="ttd-kiri"><!-- School position here --></p>
          <br /><br /><br />
          <p class="ttd-kiri">
            <b><!-- School head name here --></b>
          </p>
        </td>
        <td width="50%">
            <div class="ttd-kanan">
                <p><!-- Current date here --></p>
                <p>&nbsp;</p>
                <p >Petugas,</p>
                <br /><br /><br />
                <p>
                    <b></b>
                </p>
            </div>
        </td>
        
      </tr>
    </table>
  </body>
</html>
