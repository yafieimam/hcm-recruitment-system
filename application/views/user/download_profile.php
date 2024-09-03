<!DOCTYPE html>
<html>
<head>
    <title>Download Profile</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template_home/theme/css/user-styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
    <style>
    /* Gaya umum untuk memastikan tampilan yang tepat */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    /* Gaya div utama */
    .container-fluid-main {
      min-height: 0;
      display: flex;
      flex-direction: column;
      padding: 10px;
      background-color: white;
    }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid-main">
                <div class="row">
                    <div class="col-10">
                        <h2 style="text-align: center; padding-top: 10px;">Profile</h2>
                    </div>
                </div>
                <hr>
                <table style="width: 100%;">
                    <tr>
                        <td width="20%" rowspan="6">
                            <?php
                                if(empty($CanProfile['PhotoProfile'])){
                                    $imageInfo = getimagesize(base_url('/assets/template/images/avatar/no-photo.png'));
                                    $imageMimeType = $imageInfo['mime'];
                                    $imageData = file_get_contents(base_url('/assets/template/images/avatar/no-photo.png'));
                                    $base64Image = base64_encode($imageData);
                            ?>
                            <img src="data:<?= $imageMimeType; ?>;base64,<?= $base64Image; ?>" alt="Profile Picture"
                                style="margin-left: 25px; width: 110px;">
                            <?php
                                } else {
                                    $imageInfo = getimagesize(base_url('/assets/template/images/avatar/' . $CanProfile['PhotoProfile']));
                                    $imageMimeType = $imageInfo['mime'];
                                    $imageData = file_get_contents(base_url('/assets/template/images/avatar/' . $CanProfile['PhotoProfile']));
                                    $base64Image = base64_encode($imageData);
                            ?>
                            <img src="data:<?= $imageMimeType; ?>;base64,<?= $base64Image; ?>" alt="Profile Picture"
                                style="margin-left: 25px; width: 110px;">
                            <?php
                                }
                            ?>
                            
                        </td>
                        <td colspan="6"><strong>Basic Information</strong></td>
                    </tr>
                    <tr>
                        <td width="13%">Full Name</td>
                        <td width="2%">:</td>
                        <td width="25%"><?= (!empty($CanProfile['FirstName'])) ? $CanProfile['FirstName'] . ' ' . $CanProfile['LastName'] : '-' ?></td>
                        <td width="8%">Email</td>
                        <td width="2%">:</td>
                        <td width="30%"><?= (!empty($CanProfile['Email'])) ? $CanProfile['Email'] : '-' ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td colspan="4">
                            <?= (!empty($CanProfile['Address'])) ? $CanProfile['Address']: '' ?>
                            <?= (!empty($CanProfile['HouseNo'])) ? 'No. ' . $CanProfile['HouseNo']: '' ?>
                            <?= (!empty($CanProfile['RT'])) ? 'RT ' . $CanProfile['RT']: '' ?>
                            <?= (!empty($CanProfile['RW'])) ? 'RW ' . $CanProfile['RW']: '' ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="4">
                            <?= (!empty($CanProfile['KelurahanName'])) ? $CanProfile['KelurahanName'] . ', ': '' ?>
                            <?= (!empty($CanProfile['KecamatanName'])) ? $CanProfile['KecamatanName'] . ', ': '' ?>
                            <?= (!empty($CanProfile['CityName'])) ? $CanProfile['CityName'] . ', ': '' ?>
                            <?= (!empty($CanProfile['ProvinceName'])) ? $CanProfile['ProvinceName'] . ', ': '' ?>
                            <?= (!empty($CanProfile['CountryName'])) ? $CanProfile['CountryName'] . ', ': '' ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="13%">Birth Date</td>
                        <td width="2%">:</td>
                        <td colspan="4"><?= (!empty($CanProfile['BirthDay'])) ? date('d M Y', strtotime($CanProfile['BirthDay'])) : '-' ?></td>
                        
                    </tr>
                    <tr>
                        <td width="13%">Phone Number</td>
                        <td width="2%">:</td>
                        <td colspan="4"><?= (!empty($CanProfile['PhoneNumberCode'])) ? $CanProfile['PhoneNumberCode'] . $CanProfile['PhoneNumber'] : '-' ?></td>
                        
                    </tr>
                </table>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td width="30%"><strong>Salary Expectation :</strong></td>
                        <td width="70%"><?= (!empty($SalaryExpectation[0]['Display'])) ? $SalaryExpectation[0]['Display'] : '-' ?></td>
                    </tr>
                </table>
                <?php
                if(!empty($WorkExperience)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Work Experience</strong></td>
                    </tr>
                <?php
                    foreach($WorkExperience as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Education)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Education</strong></td>
                    </tr>
                <?php
                    
                    foreach($Education as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Skill)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Skills</strong></td>
                    </tr>
                <?php
                    
                    foreach($Skill as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['LevelSkillName'] ?></td>
                        <td width="70%"><?= $value['SkillName'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Summary)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td><strong>Summary</strong></td>
                    </tr>
                <?php
                    
                    foreach($Summary as $value){
                ?>
                    <tr>
                        <td><?= $value['description'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Affiliation)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Affiliations</strong></td>
                    </tr>
                <?php
                    
                    foreach($Affiliation as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Seminar)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Seminars and Trainings</strong></td>
                    </tr>
                <?php
                    
                    foreach($Seminar as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['SeminarTrainingName'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Award)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Awards and Achievements</strong></td>
                    </tr>
                <?php
                    
                    foreach($Award as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($TestScore)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Test Scores</strong></td>
                    </tr>
                <?php
                    
                    foreach($TestScore as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Volunteerism)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Volunteerism and Non-Profit Work</strong></td>
                    </tr>
                <?php
                    
                    foreach($Volunteerism as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Reference)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>References</strong></td>
                    </tr>
                <?php
                    
                    foreach($Reference as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Name'] ?></td>
                        <td width="70%"><?= $value['Occupation'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($CoCurricular)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Co-curricular Activities</strong></td>
                    </tr>
                <?php
                    
                    foreach($CoCurricular as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Project)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2"><strong>Projects</strong></td>
                    </tr>
                <?php
                    
                    foreach($Project as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Period'] ?></td>
                        <td width="70%"><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Language)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td><strong>Languages</strong></td>
                    </tr>
                <?php
                    
                    foreach($Language as $value){
                ?>
                    <tr>
                        <td><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($Certification)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td><strong>Certifications and Licenses</strong></td>
                    </tr>
                <?php
                    
                    foreach($Certification as $value){
                ?>
                    <tr>
                        <td><?= $value['Name'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
                <?php
                if(!empty($CanApply)){
                ?>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3"><strong>Job Applications</strong></td>
                    </tr>
                <?php
                    
                    foreach($CanApply as $value){
                ?>
                    <tr>
                        <td width="30%"><?= $value['Position'] ?></td>
                        <td width="50%"><?= $value['CompanyName'] ?></td>
                        <td width="20%"><?= $value['Applydate'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>