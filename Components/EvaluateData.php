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
                        echo scoreWidth(4);
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
                        echo scoreWidth(5);
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
                        echo scoreWidth(3);
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
                        echo scoreWidth(1);
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
                        echo scoreWidth(2);
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
                        echo scoreWidth(3);
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
                        echo scoreWidth(4);
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
                        echo scoreWidth(5);
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
                        echo scoreWidth(4);
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
                        echo scoreWidth(3);
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
                        echo scoreWidth(2);
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
                        echo scoreWidth(1);
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
                        echo scoreWidth(5);
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
                        echo scoreWidth(4);
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
                        echo scoreWidth(3);
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
                        echo scoreWidth(4);
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
                        echo scoreWidth(1);
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
                        echo scoreWidth(2);
                        ?>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="text">Comments</div>
    <small class="text-muted">Comments, general impressions & observations regarding the capability, behavior's & personality of the trainee.</small>
    <div class="row">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" style="resize:none; height: 256px;"
                    readonly>The trainee demonstrated remarkable capability throughout the training program, consistently showcasing a strong understanding of the concepts and techniques taught. Their competence was evident in their exceptional performance.

In terms of behavior, the trainee maintained a professional demeanor, displaying punctuality, attentiveness, and a commendable work ethic. They approached tasks with dedication and remained focused on their objectives, fostering a productive learning environment.

The trainee's personality played a significant role in their success. They exhibited high motivation and sought additional learning opportunities beyond the curriculum, inspiring others with their enthusiasm. Their excellent communication skills facilitated active participation in discussions, allowing them to convey ideas effectively.

Moreover, the trainee exhibited adaptability and resilience. They embraced challenges with a problem-solving mindset, adjusted strategies in the face of obstacles, and showed perseverance under pressure.

In conclusion, the trainee's capability, behavior, and personality make them a highly promising individual. With their exceptional skills, professionalism, and positive attitude, they are poised for success in their chosen field. The trainee's remarkable performance, combined with their adaptability and resilience, ensures a bright future ahead. Their dedication to continuous growth and collaboration will undoubtedly contribute to their ongoing achievements.</textarea>
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
                    $overall_score = 56; // get this from the database
                    $total = 100;
                    $bonus = 10;
                    $percentage = (($overall_score + $bonus) / $total) * 100; // get the percentage
                    $percentage = floor($percentage); // round down

                    if ($percentage >= 80) {
                        $grade = 'Excellent';
                    } else if ($percentage >= 60) {
                        $grade = 'Very Good';
                    } else if ($percentage >= 40) {
                        $grade = 'Good';
                    } else if ($percentage >= 20) {
                        $grade = 'Fair';
                    } else {
                        $grade = 'Poor';
                    }
                ?>
                <input type="text" class="form-control" value="<?php echo $percentage . '% - ' . $grade ?>" readonly>
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