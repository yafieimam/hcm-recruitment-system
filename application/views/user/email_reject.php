<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Undangan Reject</title>
</head>
<body>
    <h3>Hi <?= $CanProfile['Name'] ?>!</h3>
    <p>Terima kasih atas atensi Anda melamar untuk posisi <?= $JobVacancy['Position'] ?> di JNE. Namun kami mohon maaf untuk saat ini profile Anda masih belum memenuhi kualifikasi yang kami butuhkan.</p>

    <p>Terima kasih dan sukses selalu.</p>

    <p>Regards,</p>
    <p>Recruitment JNE</p>
    <p><?= $JobVacancy['CompanyName'] ?></p>
</body>
</html>