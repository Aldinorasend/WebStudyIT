<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
    <style>
        body { font-family: 'Arial', sans-serif; }
        .certificate {
            border: 2px solid #000;
            padding: 50px;
            text-align: center;
            width: 800px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .recipient {
            font-size: 24px;
            margin: 40px 0;
            color: #2c3e50;
        }
        .signature {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }
        .date {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="title">SERTIFIKAT PENGHARGAAN</div>
        <div>Diberikan kepada:</div>
        <div class="recipient">{{ $recipientName }}</div>
        <div>Atas Pencapaiannya Menyelesaikan Task Expert</div>
        <div class="date">Tanggal: {{ date('d F Y') }}</div>
        <div class="signature">
            <div>Instructor</div>
            <div>Pengoreksi</div>
        </div>
    </div>
</body>
</html>