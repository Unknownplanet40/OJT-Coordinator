<form action="EvaluteProccess.php" method="POST" enctype="multipart/form-data">
    <div class="table-responsive-md rounded" style="min-width: 460px;">

        <ul class="list-group rounded" style="min-width: 460px;">
            <li class="list-group-item text-bg-success" aria-current="true">Trainee Details</li>
            <li class="list-group-item bg-dark"><span class="text-muted">Trainee ID: </span><b class="text-light">
                    <?php echo $ID; ?>
                </b>
                <input type="hidden" name="EvID" value="<?php echo $ID; ?>">
            </li>
            <li class="list-group-item bg-dark"><span class="text-muted">Trainee Name: </span><b class="text-light">
                    <?php echo $name; ?>
                    <input type="hidden" name="EvName" value="<?php echo $name; ?>">
            </li>
            <li class="list-group-item bg-dark"><span class="text-muted">Trainee Email: </span><b class="text-light">
                    <?php echo $email; ?>
                </b>
                <input type="hidden" name="EvEmail" value="<?php echo $email; ?>">
            </li>
            <li class="list-group-item bg-dark"><span class="text-muted">Trainee Username: </span><b class="text-light">
                    <?php echo $trainee_uname; ?>
                </b>
                <input type="hidden" name="EvUname" value="<?php echo $trainee_uname; ?>">
            </li>
        </ul>
        <br>
        <table class="table table-dark caption-top rounded" style="min-width: 460px;">
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
                        <small class="text-muted">Comments, general impressions & observations regarding the capability,
                            behavior's & personality of the trainee.</small>
                        <textarea class="form-control text-bg-dark" name="Comments" id="Comments" cols="30" rows="8"
                            maxlength="1000" placeholder="Maximum of 1,000 characters"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <input type="submit" class="btn btn-success w-25" name="evaluate" value="Submit" style="min-width: 100px;">
            <input type="reset" class="btn btn-danger" value="Reset">
            <a href="../../Admin/AdminTraineeEvaluation.php" class="btn btn-secondary">Back</a>

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