<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Undangan Call Out</title>
</head>
<body>
    <h3>Hi <?= $CanProfile['Name'] ?>!</h3>
    <p>Dengan ini kami mengundang Anda mengikuti proses seleksi untuk <?= $JobVacancy['Position'] ?> di JNE. Adapun tahapan proses seleksi selanjutnya adalah (Psikotes; Interview HRD; Interview User) pada waktu dan tempat sebagai berikut :</p>
    
    <p>Hari & Tanggal : Kamis, 23 Januari 2024</p>
    <p>Waktu : 08:00 WIB</p>
    <p>Tempat : JNE Learning Center, Jl. Tomang Raya no. 9, Jakarta Barat</p>
    <p>Bertemu : Recruitment Team - Talent Management Dept</p>
    <p>Membawa : Alat tulis</p>

    <p>Mohon konfirmasi kehadiran Anda dengan membalas/accept undangan ini.</p>

    <p>Terima kasih.</p>

    <p>Regards,</p>
    <p>Recruitment JNE</p>
    <p><?= $JobVacancy['CompanyName'] ?></p>
</body>
</html>