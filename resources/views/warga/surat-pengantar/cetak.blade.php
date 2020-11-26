<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<table align="center">
    <tr>
        <td><img src="{{ public_path("/images/logo.png") }}" width="80" height="80"></td>
        <td width="520">
            <center>
                <font size="4"><b>PEMERINTAH KOTA KEDIRI</b></font><br>
                <font size="3"><b>KECAMATAN MOJOROTO</b></font><br>
                <font size="4"><b>KELURAHAN BANDAR LOR</b></font><br>
                <font size="4"><b>RUKUN TETANGGA 42 WARGA 06</b></font><br>
            </center>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr height="5">
        </td>
    </tr>

</table>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="300"> : {{ $surat->nomor_surat }}</td>
        <td width="220">Kepada</td>
    </tr>
    <tr>
        <td>Lamp.</td>
        <td width="300"> : -</td>
        <td width="200">Yth. Kepala Kelurahan</td>
    </tr>
    <tr>
        <td>Sifat</td>
        <td width="300"> : Penting</td>
        <td width="200">Bandar Lor Kec. Mojoroto</td>
    </tr>
    <tr>
        <td>Perihal </td>
        <td width="300"> : Surat Pengantar</td>
        <td width="200">di</td>
    </tr>
    <tr>
        <td></td>
        <td width="300"> </td>
        <td width="200"><u> K e d i r i </u></td>
    </tr>
    <tr>
        <td height="50" colspan="3" align="center"><b><u>SURAT PENGANTAR</u></b></td>
    </tr>
</table>
<table align="center">
    <tr>
        <td width="576" align="justify" style="text-indent: 35px;">
            Yang bertanda tangan di bawah ini Ketua RT. 42 RW 06 Kelurahan Bandar Lor <br>
            Kecamatan Mojoroto Kota Kediri menerangkan bahwa pemohon tersebut di bawah ini :
        </td>
    </tr>
</table>
<br>
<table align="center">
    <tr>
        <td>Nama</td>
        
        <td>: {{ $user->nama }}</td>
        
        <td width="340"></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>: {{ $user->nik }}</td>
        <td width="340"></td>
    </tr>
    <tr>
        <td>Tempat, tanggal lahir</td>
        <td>: {{ $user->tempat_lahir }}, {{ date('d-m-Y', strtotime($user->tanggal_lahir))}}</td>
        <td width="340"></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>: {{ $surat->status_perkawinan }}</td>
        <td width="340"></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $user->agama }}</td>
        <td width="340"></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $surat->pekerjaan }}</td>
        <td width="340"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $user->alamat }}</td>
        <td width="340"></td>
    </tr>
</table>
<table align="center">
    <tr>
        <td align="justify" style="text-indent: 39px;">
            Benar-benar warga RT. 42 RW 06 Kelurahan Bardar Lor Kecamatan Mojoroto Kota<br>
            Kediri dan selama berada dilingkungan RT. 42 RW 06 berkelakuan baik. Selanjutnya yang<br>
            bersangkutan tersebut diatas, mohon pelayanan {{ $surat->pelayanan }}</td>
    </tr>
    <tr>
        <td height="50">
            Demikian untuk menjadikan periksa dan seperlunya.</td>
    </tr>
</table>
<br>
<table align="center">
    <tr>
        <td width="250"></td>
        <td width="250">
            <center>Kediri, {{ date('d-m-Y', strtotime($surat->tanggal)) }}</center>
        </td>
    </tr>
    <tr>
        <td width="250">
            <center>Pemohon</center>
        </td>
        <td width="250">
            <center>Rukun Tetangga 42</center>
        </td>
    </tr>
    <tr>
        <td height="70"></td>
        <td height="70">
            <center>                <img src="{{ public_path("/img/foto/".$ttd->stempel) }}" width="150" height="150" alt="" srcset="" style="position: absolute; padding-left:50px;">
                <img src="{{ public_path("/img/foto/".$ttd->foto) }}" width="100" height="100"></center>
        </td>
    </tr>
    <tr>
        <td width="250">
            <center><b><u>{{ $user->nama }}</u></b></center>
        </td>
        <td width="250">
            <center><b><u>{{ $ttd->nama }}</u></b></center>
        </td>
    </tr>
</table>

<body>

</body>

</html>