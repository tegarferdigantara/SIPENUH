<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Pembuatan Paspor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .header img {
            width: 150px;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            margin: 5px 0;
        }

        .content .signature {
            margin-top: 50px;
        }

        .footer {
            margin-top: 50px;
        }

        .attachment {
            page-break-before: always;
            margin-top: 20px;
        }

        .attachment img {
            max-width: 100%;
            height: auto;
        }

        .attachment p {
            margin: 5px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Arhas Logo">
    </div>
    <div class="content">
        <p>NO : </p>
        <p>Lampiran : -</p>
        <p>Perihal : Permohonan Pembuatan Paspor</p>

        <p>Kepada Yth,</p>
        <p>Kantor Imigrasi Kelas I TPI Pontianak</p>
        <p>Di Tempat</p>

        <p>Assalamu’alaikum.Wr.Wb</p>

        <p>Yang bertanda tangan dibawah ini :</p>
        <p>Nama : Abdul Rahman Muhammad</p>
        <p>Jabatan : Direktur Utama PT. ARHAS BUGIS TOURS & TRAVEL</p>

        <p>Bersama ini kami menyatakan bahwa atas nama :</p>
        <p>Nama : {{ $customer->full_name }}</p>
        <p>Jenis Kelamin : {{ $customer->gender }}</p>
        <p>Tempat Tgl Lahir : {{ $customer->birth_place . ',' . $customer->birth_date }}</p>
        <p>Pekerjaan : {{ $customer->profession }}</p>
        <p>Alamat :
            {{ $customer->address . ', ' . $customer->subdistrict . ', ' . $customer->city . ', ' . $customer->province }}
        </p>

        <p>Demikian surat permohonan ini, atas perhatian dan kerja samanya kami ucapkan terima kasih</p>

        <p>Wassalamu’alaikum.Wr.Wb</p>

        <div class="signature">
            <p>Hormat kami,</p>
            <p>PT. Arhas Bugis Tours & Travel</p>
            <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Stamp" width="100">
            <p>Abdul Rahman Muhammad</p>
            <p>Direktur Utama</p>
        </div>
    </div>
    <div class="footer">
        <p>Ruko Mutiara Taman Palem, Blok A6 No. 27, Cengkareng, Jakarta Barat, Indonesia 11730</p>
        <p>Telp: (021) 54363408</p>
        <p>Email: arhasbugistravel@yahoo.co.id / arhastours@gmail.com</p>
        <p>Website: <a href="https://www.arhostours.com">www.arhostours.com</a></p>
    </div>

    <div class="attachment">
        <p>Lampiran:</p>
        <p>Foto KTP</p>
        <img src="{{ public_path('storage/' . $customer->customerDocument->id_photo) }}" alt="Foto" width="400">
    </div>
    <div class="attachment">
        <img src="{{ public_path('storage/' . $customer->customerDocument->family_card_photo) }}" alt="Foto"
            width="600">
    </div>
    <div class="attachment">
        <img src="{{ public_path('storage/' . $customer->customerDocument->birth_certificate_photo) }}" alt="Foto"
            width="1200">
    </div>
</body>

</html>
