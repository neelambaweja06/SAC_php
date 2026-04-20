<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card</title>
</head>
<style>
    @page {
        margin: 0px;
    }
</style>

<!-- <body style="font-family: Poppins, sans-serif;padding: 0;margin: 0;text-align:center;"> -->
<body style="font-family: Poppins, sans-serif; padding: 0; margin: 0; text-align: center; background-image: url('<?= base_url() ?>public/assets/images/back.png'); background-size: cover; background-position: center;">

    <div  style="position: relative; text-align:center;">
        <img src="<?= base_url() ?>public/assets/images/fornt.jpg" alt="" width="100%" style="z-index:0;position:fixed;">
        <?php
        foreach($report_card_data as $data){

            $dob = $data['student_dob'];
            $gendar=
            $dob = new DateTime($dob);
    $today = new DateTime();
    $age = $dob->diff($today);
        ?>
<h2 style="font-size: 25px;font-weight: 400;margin-top: 73px; margin-left:300px;margin-bottom: 0; text-transform: uppercase;z-index: 6;display-block;"><?=$data['student_code']?></h2>
 <div style="font-size: 18px;font-weight: 300;margin-bottom: 0; position: fixed; top:540px;left: 418px;z-index: 6; text-align:center;width:850px; margin:0 auto;"><?=$data['fn_year']?></div>
    </div>
 <!--the Second Page -->

            
       
                <div  style="position: relative; text-align:center;page-break-before: always;">
      
        <div style="position: relative; z-index: 1; padding: 20px;">
        <table style="width: 95%; border-collapse: collapse;  border: 1px solid #ccc;">
        <tr>
            <!-- Left Section -->
            <th style="width: 50%; padding: 20px; border-right: 1px solid #ccc; vertical-align: top; text-align: left;">
                <!-- Centered Header Text -->
                <div style="font-weight: bold; padding-bottom: 10px; text-align: center; margin-top: 8%;">HOSTEL/SCHOOL/RESIDENTIAL SCHOOL/ ORPHANAGE</div>
                <div style="padding-bottom: 8px;">Name: <?=$data['school_name']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Address: <?=$data['school_address']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Dist.: <?=$data['school_dist']?> <span style="margin-left: 30px">Pincode: <?=$data['school_pincode']?></span></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Contact Person : <?=$data['contact_person_name']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Phone Number : <?=$data['contact_person_mobile']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Email : <?=$data['contact_person_email']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Establishment Year: <?=$data['estab_year']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Total Number of Children: <?=$data['no_of_student']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Name of the Sponsoring Trust: 1</div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Address: <?=$data['school_address']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Contact No.: <?=$data['contact_person_email']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 25px;">Email: <?=$data['contact_person_email']?></div>
                
            </th>

            <!-- Right Section -->
            <th style="width: 50%; padding: 20px; vertical-align: top; text-align: left;">
                <!-- Centered Header Text -->
                <div style="font-weight: bold; padding-bottom: 10px; text-align: center;">Your Child’s Profile</div>
                <!-- Centered Photograph Box -->
                <div style="margin-left: 45%; margin-bottom: 10px;">
                    <div style="border: 1px solid #ccc; width: 100px; height: 120px; color: #999; line-height: 120px; text-align: center;">
                    <img  style="hight:150px;width:100%"src="<?= base_url() ?>student_img/<?=$data['student_img']?>" alt="student_img">
                    </div>
                </div>
                <div style="padding-bottom: 8px;">Name of Child : <?=$data['student_name_first']?> <?=$data['student_name_last']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Date of Birth <?=$data['student_name_last']?> <span style="margin-left: 30px">DD: <?= date('d', strtotime($data['student_dob'])) ?> MM: <?= date('m', strtotime($data['student_dob'])) ?> YY: <?= date('Y', strtotime($data['student_dob'])) ?></span></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Gender: <?php if ($data['student_gender'] == 'M') { echo 'Male';} elseif ($data['student_gender'] == 'F') {echo 'Female';} else { echo 'Gender not specified';}?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Father's Name:  <?=$data['student_father_name']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Mother's Name: <?=$data['student_mother_name']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">State: <?=$data['student_state_name']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Class: <?=$data['class_name']?> <span style="margin-left: 30px"> Obtained: <?=$data['obtained_per']?>%</span></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Favourite Subject:<?=$data['fav_subject']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Special Talent / Interest :<?=$data['intrest']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">Any Achievement : <?=$data['any_achiv']?></div>
                <hr style="border-top: 1px solid #ccc;">
                <div style="padding-bottom: 8px;">What does the child want to be : <?=$data['what_does_child']?></div>
            </th>
        </tr>
    </table>
    
        </div>
    </div>
                




    <?php
        }
            ?>
</body>

</html>