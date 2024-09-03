<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Undangan Lamaran Pekerjaan</title>
</head>
<body>
    <h3>Selamat <?= $CanProfile['Name'] ?>!</h3>
    <p>Kami ingin mengundang Anda untuk melamar posisi pekerjaan yang terbuka di perusahaan kami. Kami yakin Anda memiliki keterampilan dan pengalaman yang kami cari untuk memperkuat tim kami.</p>
    
    <p>Posisi yang tersedia: <?= $JobVacancy['Position'] ?></p>
    <p>Lokasi: <?= $JobVacancy['LocationName'] ?></p>
    <p>Deskripsi Pekerjaan: <?= $JobVacancy['JobDescription'] ?></p>
    
    <p>Silakan klik <a href="<?= base_url() ?>jobs/<?= $JobVacancy['JobVacancyId'] ?>">Link ke halaman lamaran pekerjaan</a> untuk melihat informasi lebih lanjut tentang posisi ini dan mengirimkan lamaran Anda.</p>
    
    <p>Kami menantikan untuk menerima lamaran Anda sebelum batas waktu pendaftaran, yang berakhir pada <?= date('j F Y', strtotime($JobVacancy['Dateline'])) ?>. Jika Anda memiliki pertanyaan atau perlu informasi tambahan, jangan ragu untuk menghubungi kami melalui web <?= base_url() ?>.</p>
    
    <p>Terima kasih atas minat Anda untuk bergabung dengan tim kami. Kami berharap dapat bertemu dengan Anda dalam proses seleksi.</p>
    
    <p>Salam,</p>
    <p>Human Capital</p>
    <p><?= $JobVacancy['CompanyName'] ?></p>
</body>
</html>