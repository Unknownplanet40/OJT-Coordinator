<?php
function scoreWidth($score)
{
    $score_width = $score * 20;
    switch ($score) {
        case 1:
            $color = 'text-bg-danger';
            $value = 'Unacceptable';
            break;
        case 2:
            $color = 'text-bg-danger';
            $value = 'Needs Improvement';
            break;
        case 3:
            $color = 'text-bg-warning';
            $value = 'Satisfactory';
            break;
        case 4:
            $color = 'text-bg-info';
            $value = 'Very Satisfactory';
            break;
        case 5:
            $color = 'text-bg-success';
            $value = 'Outstanding';
            break;
        default:
            $color = 'text-bg-danger';
            $value = 'Unacceptable';
            break;
    }
    return '<div class="progress-bar ' . $color . '" role="progressbar" aria-label="Segment one" style="width: ' . $score_width . '%; cursor: default;" title="' . $value . '">' . $score . ' - ' . $value . '</div>';
}

function generateData()
{
    global $Q1, $Q2, $Q3, $Q4, $Q5, $Q6, $Q7, $Q8, $Q9, $Q10, $Q11, $Q12, $Q13, $Q14, $Q15, $Q16, $Q17, $Q18, $fed, $evaby, $datetaken, $Total_Score, $grade;
    $questionTitles = [
        '1. Accuracy of completed work according to the operational standards',
        '2. Thoroughness & attention to detail in performing the assigned tasks',
        '3. Neatness & presentation of work',
        '1. Effective use of time',
        '2. Task Accomplished',
        '3. Prompt completion of work assignments',
        '4. Useful or effective application of knowledge & skills',
        '1. Appropriate Attire',
        '2. Appropriate Grooming',
        '3. Attendance & punctuality',
        '4. Ability to communicate effectively to guest, supervisor & colleagues',
        '5. Ability to think independently',
        '6. Ability to remain calm & in control when presented with stressful situations',
        '7. Demonstrates an interest & willingness to learn the task required to maintain operational standards',
        '1. Demonstrates positive relationship with the establishment\'s workers',
        '2. Relates effectively with visitors in a friendly & courteous manner',
        '3. Accepts suggestions, directions & constructive criticism from employees & supervisors',
        '4. Cooperative team player',
    ];

    $questions_count = count($questionTitles);
    //                1              2              3              4              5 
    $ratings = [';*; ; ; ; ;', '; ;*; ; ; ;', '; ; ;*; ; ;', '; ; ; ;*; ;', '; ; ; ; ;*;'];

    $content = '';
    $info = '';

    // Loop through all questions
    for ($i = 0; $i < $questions_count; $i++) {
        $questionNumber = $i + 1;
        $questionTitle = $questionTitles[$i];

        // Get the rating for the current question
        $questionKey = 'Q' . $questionNumber;
        $ratingIndex = $$questionKey - 1;

        // Add the question title and rating to the content
        $content .= $questionTitle . $ratings[$ratingIndex] . "\n";
    }

    $breakFeedback = wordwrap($fed, 90, ";", true);

    $info .= "Evaluated by; " . $evaby . "\n";
    $info .= "Date; " . $datetaken . "\n";
    $info .= "Overall Score; " . $Total_Score . "% - " . $grade . "\n";
    $info .= "Trainee Name; " . $_SESSION['GlobalName'] . "\n";
    $info .= "Feedback; " . $breakFeedback . "\n";


    // Now, $content contains the formatted content for all questions
    // Save the content to a file
    $fileData = $_SESSION['GlobalUsername'] . '_EvalData.txt';
    $handle1 = fopen($fileData, 'w');
    fwrite($handle1, $content);
    fclose($handle1);

    //move file to another directory
    $source = $fileData;
    $destination = '../Components/EvaluatePDF/' . $fileData;
    rename($source, $destination);

    //get the data from EvalInfo.txt
    $FileInfo = $_SESSION['GlobalUsername'] . '_EvalInfo.txt';
    $handle2 = fopen($FileInfo, 'w');
    fwrite($handle2, $info);
    fclose($handle2);

    //move file to another directory
    $source = $FileInfo;
    $destination = '../Components/EvaluatePDF/' . $FileInfo;
    rename($source, $destination);

}


?>

<div class="container-xl">
    <ul class="list-group">
        <li class="list-group-item text-light" aria-current="true" style="background-color: #3ea34c;">QUALITY OF WORK
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    1. Accuracy of completed work according to the operational standards
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q1);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    2. Thoroughness & attention to detail in performing the assigned tasks.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q2)
                            ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    3. Neatness & presentation of work.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q3);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item text-light" aria-current="true" style="background-color: #3ea34c;">PRODUCTIVITY</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    1. Effective use of time
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q4);
                        ?>
                    </div>
                </div>
            </div>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    2. Task Accomplished
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q5);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    3. Prompt completion of work assignments
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q6);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    4. Useful or effective application of knowledge & skills
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q7);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item text-light" aria-current="true" style="background-color: #3ea34c;">WORK HABITS,
            TALENTS & SKILLS</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    1. Appropriate Attire
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q8);
                        ?>
                    </div>
                </div>
            </div>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    2. Adherence to policies & procedures
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q9);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    3. Attendance & punctuality
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q10);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    4. Ability to communicate effectively to guest, supervisor & colleagues.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q11);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    5. Ability to think independently.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q12);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    6. Ability to remain calm & in control when presented with stressful situations.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q13);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    7. Demonstrates an interest & willingness to learn the task required to maintain
                    operational standards.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q14);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item text-light" aria-current="true" style="background-color: #3ea34c;">INTERPERSONAL WORK
            RELATIONSHIP</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    1. Demonstrates positive relationship with the establishments’ workers.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q15);
                        ?>
                    </div>
                </div>
            </div>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    2. Relates effectively with visitors in a friendly & courteous manner.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q16);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    3. Accepts suggestions, directions & constructive criticism from employees &
                    supervisors.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q17);
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    4. Cooperative team player.
                </div>
                <div class="col-md-8">
                    <div class="progress mt-1" style="height: 20px;">
                        <?php
                        echo scoreWidth($Q18);
                        ?>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="text">Comments</div>
    <small class="text-muted">Comments, general impressions & observations regarding the capability, behavior's &
        personality of the trainee.</small>
    <div class="row">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" readonly>
                    <?php echo $fed; ?>
                    </textarea>
                <label for="floatingTextarea2" class="text-success"></label>
                <script>
                    //auto resize textarea
                    var tx = document.getElementsByTagName('textarea');
                    for (var i = 0; i < tx.length; i++) {
                        tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
                        tx[i].addEventListener("input", OnInput, false);
                    }
                </script>
            </div>
        </div>
    </div>
    <!-- Evaluated by -->
    <div class="row mt-3 g-3 mb-3">
        <div class="col-md-2">
            <!-- Score -->
            <div class="form-floating">
                <?php
                $Total_Score;

                if ($Total_Score >= 80) {
                    $grade = 'Excellent';
                } else if ($Total_Score >= 60) {
                    $grade = 'Very Good';
                } else if ($Total_Score >= 40) {
                    $grade = 'Good';
                } else if ($Total_Score >= 20) {
                    $grade = 'Fair';
                } else {
                    $grade = 'Poor';
                }
                generateData();
                ?>
                <input type="text" class="form-control" value="<?php echo $Total_Score . '% - ' . $grade ?>" readonly>
                <label for="floatingInput">Overall Score:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" value="Admin: <?php echo $evaby ?>" readonly>
                <label for="floatingInput">Evaluated by:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" value="<?php echo $datetaken ?>" readonly>
                <label for="floatingInput">Date:</label>
            </div>
        </div>
        <!-- Under Construction -->
        <div class="col-md-2">
            <div class="form-floating">
                <button type="button" class="btn btn-sm btn-success" id="print">Download Evaluation</button>
                <script>
                    let btnDownload = document.getElementById('print');

                    // confermation SweetAlert2
                    btnDownload.addEventListener('click', function () {
                        Swal.fire({
                            text: "Would you like to download a copy of this evaluation?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes Download it!',
                            allowOutsideClick: false,

                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Please wait...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    onOpen: () => {
                                        Swal.showLoading();
                                    }
                                }).then((result) => {
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        window.location.href = '../Components/EvaluatePDF/GenerateEval.php';
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // Do nothing
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>