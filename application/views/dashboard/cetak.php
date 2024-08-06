<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .certificate-container {
            width: 1720px;
            height: 720px;
            background-color: #fff;
            border: 10px solid #000;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            text-align: center;
        }

        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .certificate-body {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .certificate-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .signature {
            text-align: center;
        }

        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="certificate-title">SERTIFIKAT</div>
        <div class="certificate-body">
            Diberikan kepada<br>
            <b>Nama Penerima</b><br>
            atas prestasi yang luar biasa dalam<br>
            <b>Acara atau Kegiatan</b><br>
            yang diselenggarakan pada<br>
            <b>Tanggal Acara</b>.
        </div>
        <div class="certificate-footer">
            <div class="signature">
                <div class="signature-line"></div>
                <div>Nama Penanda Tangan 1</div>
                <div>Jabatan</div>
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <div>Nama Penanda Tangan 2</div>
                <div>Jabatan</div>
            </div>
        </div>
    </div>
</body>

</html>