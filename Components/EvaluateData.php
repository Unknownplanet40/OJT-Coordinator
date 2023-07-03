<?php
function scoreWidth($score)
{
    $score_width = $score * 20;
    if ($score >= 4) {
        $color = 'text-bg-success';
    } else if ($score >= 2) {
        $color = 'text-bg-warning';
    } else {
        $color = 'text-bg-danger';
    }
    return '<div class="progress-bar ' . $color . '" role="progressbar" aria-label="Segment one" style="width: ' . $score_width . '%">' . $score . '</div>';
}
?>

<div style="margin: 10px; min-width: 90%;">
    <ul class="list-group">
        <li class="list-group-item text-bg-success" aria-current="true">QUALITY OF WORK</li>
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
        <li class="list-group-item text-bg-success" aria-current="true">PRODUCTIVITY</li>
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
        <li class="list-group-item text-bg-success" aria-current="true">WORK HABITS, TALENTS & SKILLS</li>
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
        <li class="list-group-item text-bg-success" aria-current="true">INTERPERSONAL WORK RELATIONSHIP</li>
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
                <textarea class="form-control" style="resize:none; height: 256px;" readonly>
                    <?php
                    echo $fed;
                    ?>
                    </textarea>
                <label for="floatingTextarea2" class="text-success"></label>
            </div>
        </div>
    </div>
    <!-- Evaluated by -->
    <div class="row mt-3">
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
                ?>
                <input type="text" class="form-control" value="<?php echo $Total_Score . '% - ' . $grade ?>" readonly>
                <label for="floatingInput">Overall Score:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" value="Admin: Jeric Dayandante" readonly>
                <label for="floatingInput">Evaluated by:</label>

            </div>
        </div>
    </div>
</div>