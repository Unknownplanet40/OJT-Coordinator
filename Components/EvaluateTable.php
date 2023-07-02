<form action="EvaluteProccess.php" method="POST" enctype="multipart/form-data">
    <div class="table-responsive-md rounded" style="min-width: 460px;">
        <ul class="list-group" style="min-width: 460px;">
            <li class="list-group-item text-bg-success" aria-current="true">Trainee Details</li>
            <li class="list-group-item bg-dark">
                <span class="text-muted">Trainee ID: </span>
                <b class="text-light">
                    <?php echo $ID; ?>
                </b>
                <input type="hidden" name="EvID" value="<?php echo $ID; ?>">
            </li>
            <li class="list-group-item bg-dark">
                <span class="text-muted">Trainee Name: </span>
                <b class="text-light">
                    <?php echo $name; ?>
                </b>
                <input type="hidden" name="EvName" value="<?php echo $name; ?>">
            </li>
            <li class="list-group-item bg-dark">
                <span class="text-muted">Trainee Email: </span>
                <b class="text-light">
                    <?php echo $email; ?>
                </b>
                <input type="hidden" name="EvEmail" value="<?php echo $email; ?>">
            </li>
            <li class="list-group-item bg-dark">
                <span class="text-muted">Trainee Username: </span>
                <b class="text-light">
                    <?php echo $trainee_uname; ?>
                </b>
                <input type="hidden" name="EvUname" value="<?php echo $trainee_uname; ?>">
            </li>
        </ul>
        <hr class="text-muted">
        <div class="contailner-lg">
            <table class="table table-dark caption-top table-borderless table-sm" style="min-width: 460px;">
                <style>
                    .tbhead {
                        width: 50%;
                        min-width: 360px;
                    }
                </style>
                <caption class="text-center text-bg-dark rounded-top">
                    <p class="text-uppercase">Trainee Evaluation Form</p>
                    <div class="row">
                        <div class="col">
                            <p class="mb-1 text-center" style="font-size: 14px;">1 - Unacceptable (<b
                                    class="text-success">U</b>)</p>
                        </div>
                        <div class="col">
                            <p class="mb-1 text-center" style="font-size: 14px;">2 - Needs Improvement (<b
                                    class="text-success">NI</b>)</p>
                        </div>
                        <div class="col">
                            <p class="mb-1 text-center" style="font-size: 14px;">3 - Satisfactory (<b
                                    class="text-success">S</b>)</p>
                        </div>
                        <div class="col">
                            <p class="mb-1 text-center" style="font-size: 14px;">4 - Very Satisfactory (<b
                                    class="text-success">VS</b>)</p>
                        </div>
                        <div class="col">
                            <p class="mb-1 text-center" style="font-size: 14px;">5 - Outstanding (<b
                                    class="text-success">O</b>)</p>
                        </div>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th class="tbhead" scope="col">Question</th>
                        <th class="text-center">U</th>
                        <th class="text-center">NI</th>
                        <th class="text-center">S</th>
                        <th class="text-center">VS</th>
                        <th class="text-center">O</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="tbhead text-center text-bg-success" scope="row" colspan="6">QUALITY OF
                            WORK
                        </th>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">1. Accuracy of completed work according to the
                            operational
                            standards</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q1" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q1" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q1" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q1" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q1" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">2. Thoroughness & attention to detail in performing
                            the
                            assigned tasks.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q2" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q2" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q2" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q2" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q2" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">3. Neatness & presentation of work.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q3" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q3" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q3" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q3" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q3" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead text-center text-bg-success" scope="row" colspan="6">PRODUCTIVITY
                        </th>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">1. Effective use of time</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q4" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q4" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q4" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q4" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q4" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">2. Task Accomplished</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q5" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q5" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q5" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q5" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q5" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">3. Prompt completion of work assignments</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q6" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q6" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q6" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q6" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q6" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">4. Useful or effective application of knowledge &
                            skills
                        </th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q7" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q7" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q7" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q7" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q7" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead text-center text-bg-success" scope="row" colspan="6">WORK HABITS,
                            TALENTS & SKILLS</th>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">1. Appropriate Attire</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q8" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q8" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q8" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q8" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q8" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">2. Adherence to policies & procedures</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q9" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q9" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q9" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q9" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q9" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">3. Attendance & punctuality</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q10" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q10" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q10" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q10" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q10" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">4. Ability to communicate effectively to guest,
                            supervisor & colleagues.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q11" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q11" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q11" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q11" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q11" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">5. Ability to think independently.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q12" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q12" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q12" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q12" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q12" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">6. Ability to remain calm & in control when presented
                            with stressful situations.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q13" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q13" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q13" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q13" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q13" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">7. Demonstrates an interest & willingness to learn
                            the
                            task required to maintain operational standards.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q14" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q14" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q14" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q14" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q14" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead text-center text-bg-success" scope="row" colspan="6">INTERPERSONAL
                            WORK RELATIONSHIP</th>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">1. Demonstrates positive relationship with the
                            establishments’ workers.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q15" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q15" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q15" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q15" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q15" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">2. Relates effectively with visitors in a friendly &
                            courteous manner.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q16" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q16" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q16" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q16" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q16" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">3. Accepts suggestions, directions & constructive
                            criticism from employees & supervisors.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q17" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q17" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q17" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q17" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q17" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead" scope="row">4. Cooperative team player.</th>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q18" value="1"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q18" value="2"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q18" value="3"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q18" value="4"></td>
                        <td class="text-center"><input class="form-check-input" type="radio" name="Q18" value="5"></td>
                    </tr>
                    <tr>
                        <th class="tbhead text-center text-bg-success" scope="row" colspan="6">Comments</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <small class="text-muted">Comments, general impressions & observations regarding the
                                capability,
                                behavior's & personality of the trainee.</small>
                            <textarea class="form-control text-bg-dark" name="Comments" id="Comments" cols="30" rows="8"
                                maxlength="1000" placeholder="Maximum of 1,000 characters"></textarea>
                                <br>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <?php
                    if ($evaluated == "true") {

                        if ($TotalScore >= 90) {
                            $grade = "<b class='text-success'>Excellent</b>";
                        } else if ($TotalScore >= 80) {
                            $grade = "<b class='text-success'>Very Good</b>";
                        } else if ($TotalScore >= 70) {
                            $grade = "<b class='text-warning'>Good</b>";
                        } else if ($TotalScore >= 60) {
                            $grade = "<b class='text-warning'>Fair</b>";
                        } else {
                            $grade = "<b class='text-danger'>Poor</b>";
                        }

                        $date = date("F d, Y", strtotime($date));

                        echo '<script>
                                window.onload = function() {
                                    document.getElementById("EvalResult").scrollIntoView();
                                }
                            </script>';

                        echo '<tr>
                            <th class="tbhead text-center text-bg-success" scope="row" colspan="6">Evaluation Result</th>
                        </tr>';

                        $output = 
                        '<div class="container-lg rounded text-bg-dark">
                        <table class="table table-dark table-borderless table-sm" id="EvalResult">
                            <tbody>
                                <tr class="text-uppercase">
                                    <th scope="row" class="text-center">Category</th>
                                    <th scope="row" colspan="2" class="text-center">Score</th>
                                    <th scope="row" colspan="2" class="text-center">Percentage</th>
                                </tr>
                                <tr>
                                    <th scope="row">Quality of Work</th>
                                    <td colspan="2" class="text-center">' . ($Q1 + $Q2 + $Q3) . ' / 15</td>
                                    <td colspan="2" class="text-center">' . $QualityOfWork . '%</td>
                                </tr>
                                <tr>
                                    <th scope="row">Productivity</th>
                                    <td colspan="2" class="text-center">' . ($Q4 + $Q5 + $Q6 + $Q7) . ' / 20</td>
                                    <td colspan="2" class="text-center">' . $Productivity . '%</td>
                                </tr>
                                <tr>
                                    <th scope="row">Work Habits, Talents & Skills</th>
                                    <td colspan="2" class="text-center">' . ($Q8 + $Q9 + $Q10 + $Q11 + $Q12 + $Q13 + $Q14) . ' / 35</td>
                                    <td colspan="2" class="text-center">' . $WorkHabitsTalentsSkills . '%</td>
                                </tr>
                                <tr>
                                    <th scope="row">Interpersonal Work Relationship</th>
                                    <td colspan="2" class="text-center">' . ($Q15 + $Q16 + $Q17 + $Q18) . ' / 20</td>
                                    <td colspan="2" class="text-center">' . $InterpersonalWorkRelationship . '%</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Score &nbsp;&nbsp;&nbsp; <small class="text-muted">(10% of the total
                                            score is for the comment section)</small></th>
                                    <td colspan="2" class="text-center border-top">' . ($Q1 + $Q2 + $Q3 + $Q4 + $Q5 + $Q6 + $Q7 + $Q8 + $Q9 + $Q10 + $Q11 + $Q12 + $Q13 + $Q14 + $Q15 + $Q16 + $Q17 + $Q18 + 10) . ' / 100</td>
                                    <td colspan="2" class="text-center border-top">' . $TotalScore . '%</td>
                                </tr>
                                <tr>
                                <th class="text-end text-muted" scope="row" colspan="2"></th>
                                    <td class="text-end text-uppercase">Remarks</td>
                                    <td class="text-center text-uppercase" colspan="2">' . $grade . '</td>
                                </tr>
                                <tr>
                                    <th class="text-end text-muted" scope="row" colspan="2"></th>
                                    <td class="text-end text-uppercase">Date Taken</td>
                                    <td class="text-end text-uppercase" colspan="2">' . $date . '</td>
                                </tr>
                                <tr>
                                    <th class="text-end text-muted" scope="row" colspan="2"></th>
                                    <td class="text-end text-uppercase">Evaluated By</td>
                                    <td class="text-end text-uppercase" colspan="2">' . $evaluator . '</td>
                                </tr>
                                <tr>
                                    <td class="text-start text-success" scope="row" colspan="6">Feedback</td>
                                </tr>
                                <tr>
                                    <td class="text-start text-light text-wrap user-select-none" colspan="6" style="text-align: justify;">' . $Comment .'</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>';
                        echo '<tr colspan="6">
                            <td colspan="6">' . $output . '</td>
                        </tr>';
                    }
                    ?>
                </tfoot>
            </table>
        </div>
        <div class="text-end">
            <input type="submit" class="btn btn-success w-25" name="evaluate" value="Submit" style="min-width: 100px;"
                title="Submit the evaluation result">
            <input type="reset" class="btn btn-danger" value="Reset"
                title="Reset the form (will not reset the evaluation result)">
            <a href="../../Admin/AdminTraineeEvaluation.php" class="btn btn-secondary"
                title="Go back to the evaluation page">Back</a>
            <Script>
                // add confirm box before submitting
                $(document).ready(function () {
                    $('form').submit(function (e) {
                        var form = this;
                        e.preventDefault();
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Please review your evaluation before submitting it.",
                            icon: 'warning',
                            footer: 'Form will reset after submitting.',
                            showCancelButton: true,
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#dc3545',
                            confirmButtonText: 'Yes, submit it!',
                            backdrop: `rgba(0,0,0,0.4)`,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            background: "#19191a",
                            color: "#fff"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        })
                    });
                });
            </Script>
        </div>
        <br>
    </div>
</form>