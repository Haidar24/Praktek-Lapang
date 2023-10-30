<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Surat Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
        }

        .logo {
            width: 100px; /* Lebar logo */
            height: auto; /* Tinggi akan disesuaikan */
            margin: 20px auto;
            display: block;
        }

        .content {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo Perusahaan" class="logo">
        <h1>Laporan Surat Masuk</h1>
        <p>Alamat Perusahaan</p>
    </div>
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
                {{-- <th width="5%" rowspan="2">No. Urut</th> --}}
                <th width="10%" rowspan="2">Tanggal Surat</th>
                <th width="20%" rowspan="2">Tujuan/Penerima</th>
                <th colspan="3">Surat</th>
                <th width="5%" rowspan="2">Kode Klasifikasi</th>
                <th width="19%" rowspan="2">Pelaksana</th>
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
                <td align="center">{{ $item->Tgl_surat }}</td>
                <td align="center">{{ $item->Tgl_surat_di_terima }}</td>
                <td>{{ $item->Perihal }}</td>
                <td align="center">{{ $item->Lampiran_jumlah }}</td>
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
