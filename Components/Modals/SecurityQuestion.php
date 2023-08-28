<form method="POST">
  <div class="modal fade" id="SecQue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="headtitle"><?php print isset($secmodalTitle) ? $secmodalTitle : "Security Question" ?></h1>
        </div>
        <div class="modal-body">
          <p class="text-muted"><?php isset($sectitle) ? print $sectitle . " " . $secQueDate : print "Please select three security questions and provide answers to each question." ?></p>
          <small class="text-muted">*Please remember your answers as you will need them to reset your password.</small>
          <div class="mb-3">
            <div class="row g-2">
              <div class="col-md-8">
                <div class="form-floating">
                  <select class="form-select" id="Q1" name="Q1" required>
                    <?php if (empty($Q1))
                      echo '<option value="" selected hidden>Choose...</option>'; ?>
                    <option value="1" <?php if (isset($Q1) && $Q1 == "1")
                      echo 'selected'; ?>>What is your mother's maiden
                      name?</option>
                    <option value="2" <?php if (isset($Q1) && $Q1 == "2")
                      echo 'selected'; ?>>What was the name of your
                      first pet?</option>
                    <option value="3" <?php if (isset($Q1) && $Q1 == "3")
                      echo 'selected'; ?>>In which city were you born?
                    </option>
                    <option value="4" <?php if (isset($Q1) && $Q1 == "4")
                      echo 'selected'; ?>>What is your favorite movie?
                    </option>
                    <option value="5" <?php if (isset($Q1) && $Q1 == "5")
                      echo 'selected'; ?>>What is the name of your
                      favorite teacher?</option>
                    <option value="6" <?php if (isset($Q1) && $Q1 == "6")
                      echo 'selected'; ?>>What was the first concert
                      you attended?</option>
                    <option value="7" <?php if (isset($Q1) && $Q1 == "7")
                      echo 'selected'; ?>>What is the name of your
                      favorite book?</option>
                    <option value="8" <?php if (isset($Q1) && $Q1 == "8")
                      echo 'selected'; ?>>What is the make and model
                      of your first car?</option>
                    <option value="9" <?php if (isset($Q1) && $Q1 == "9")
                      echo 'selected'; ?>>What is your favorite
                      vacation spot?</option>
                    <option value="10" <?php if (isset($Q1) && $Q1 == "10")
                      echo 'selected'; ?>>What was your high school
                      mascot?</option>
                    <option value="11" <?php if (isset($Q1) && $Q1 == "11")
                      echo 'selected'; ?>>What is the name of your
                      childhood best friend?</option>
                    <option value="12" <?php if (isset($Q1) && $Q1 == "12")
                      echo 'selected'; ?>>What is your favorite
                      food?</option>
                    <option value="13" <?php if (isset($Q1) && $Q1 == "13")
                      echo 'selected'; ?>>What is the name of the
                      street you grew up on?</option>
                    <option value="14" <?php if (isset($Q1) && $Q1 == "14")
                      echo 'selected'; ?>>What is the year of your
                      parents' wedding anniversary?</option>
                    <option value="15" <?php if (isset($Q1) && $Q1 == "15")
                      echo 'selected'; ?>>What was the name of your
                      first boss?</option>
                    <option value="16" <?php if (isset($Q1) && $Q1 == "16")
                      echo 'selected'; ?>>What is your favorite
                      sports team?</option>
                    <option value="17" <?php if (isset($Q1) && $Q1 == "17")
                      echo 'selected'; ?>>What is the name of the
                      hospital where you were born?</option>
                    <option value="18" <?php if (isset($Q1) && $Q1 == "18")
                      echo 'selected'; ?>>What is your favorite
                      color?</option>
                    <option value="19" <?php if (isset($Q1) && $Q1 == "19")
                      echo 'selected'; ?>>What was the name of your
                      first crush?</option>
                    <option value="20" <?php if (isset($Q1) && $Q1 == "20")
                      echo 'selected'; ?>>What is the name of the
                      town where you had your first job?</option>
                  </select>

                  <label for="Q1">Question 1</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="QInput1" name="QInput1" placeholder="Your Answer" <?php isset($ans1) ? print "value='$ans1' required" : print "required disabled" ?>
                  minlength="3" maxlength="50" pattern="^[a-z0-9\s]+$" title="Only small letters, numbers, and spaces are allowed">
                  <label for="QInput1">Answer</label>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row g-2">
              <div class="col-md-8">
                <div class="form-floating">
                  <select class="form-select" id="Q2" name="Q2" required>
                    <?php if (empty($Q2))
                      echo '<option value="" selected hidden>Choose...</option>'; ?>
                    <option value="1" <?php if (isset($Q2) && $Q2 == "1")
                      echo 'selected'; ?>>What is your mother's maiden
                      name?</option>
                    <option value="2" <?php if (isset($Q2) && $Q2 == "2")
                      echo 'selected'; ?>>What was the name of your
                      first pet?</option>
                    <option value="3" <?php if (isset($Q2) && $Q2 == "3")
                      echo 'selected'; ?>>In which city were you born?
                    </option>
                    <option value="4" <?php if (isset($Q2) && $Q2 == "4")
                      echo 'selected'; ?>>What is your favorite movie?
                    </option>
                    <option value="5" <?php if (isset($Q2) && $Q2 == "5")
                      echo 'selected'; ?>>What is the name of your
                      favorite teacher?</option>
                    <option value="6" <?php if (isset($Q2) && $Q2 == "6")
                      echo 'selected'; ?>>What was the first concert
                      you attended?</option>
                    <option value="7" <?php if (isset($Q2) && $Q2 == "7")
                      echo 'selected'; ?>>What is the name of your
                      favorite book?</option>
                    <option value="8" <?php if (isset($Q2) && $Q2 == "8")
                      echo 'selected'; ?>>What is the make and model
                      of your first car?</option>
                    <option value="9" <?php if (isset($Q2) && $Q2 == "9")
                      echo 'selected'; ?>>What is your favorite
                      vacation spot?</option>
                    <option value="10" <?php if (isset($Q2) && $Q2 == "10")
                      echo 'selected'; ?>>What was your high school
                      mascot?</option>
                    <option value="11" <?php if (isset($Q2) && $Q2 == "11")
                      echo 'selected'; ?>>What is the name of your
                      childhood best friend?</option>
                    <option value="12" <?php if (isset($Q2) && $Q2 == "12")
                      echo 'selected'; ?>>What is your favorite
                      food?</option>
                    <option value="13" <?php if (isset($Q2) && $Q2 == "13")
                      echo 'selected'; ?>>What is the name of the
                      street you grew up on?</option>
                    <option value="14" <?php if (isset($Q2) && $Q2 == "14")
                      echo 'selected'; ?>>What is the year of your
                      parents' wedding anniversary?</option>
                    <option value="15" <?php if (isset($Q2) && $Q2 == "15")
                      echo 'selected'; ?>>What was the name of your
                      first boss?</option>
                    <option value="16" <?php if (isset($Q2) && $Q2 == "16")
                      echo 'selected'; ?>>What is your favorite
                      sports team?</option>
                    <option value="17" <?php if (isset($Q2) && $Q2 == "17")
                      echo 'selected'; ?>>What is the name of the
                      hospital where you were born?</option>
                    <option value="18" <?php if (isset($Q2) && $Q2 == "18")
                      echo 'selected'; ?>>What is your favorite
                      color?</option>
                    <option value="19" <?php if (isset($Q2) && $Q2 == "19")
                      echo 'selected'; ?>>What was the name of your
                      first crush?</option>
                    <option value="20" <?php if (isset($Q2) && $Q2 == "20")
                      echo 'selected'; ?>>What is the name of the
                      town where you had your first job?</option>
                  </select>

                  <label for="Q2">Question 2</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="QInput2" name="QInput2" placeholder="" <?php isset($ans2) ? print "value='$ans2' required" : print "required disabled" ?>
                  minlength="3" maxlength="50" pattern="^[a-z0-9\s]+$" title="Only small letters, numbers, and spaces are allowed">
                  <label for="QInput2">Answer</label>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row g-2">
              <div class="col-md-8">
                <div class="form-floating">
                  <select class="form-select" id="Q3" name="Q3" required>
                    <?php if (empty($Q3))
                      echo '<option value="" selected hidden>Choose...</option>'; ?>
                    <option value="1" <?php if (isset($Q3) && $Q3 == "1")
                      echo 'selected'; ?>>What is your mother's maiden
                      name?</option>
                    <option value="2" <?php if (isset($Q3) && $Q3 == "2")
                      echo 'selected'; ?>>What was the name of your
                      first pet?</option>
                    <option value="3" <?php if (isset($Q3) && $Q3 == "3")
                      echo 'selected'; ?>>In which city were you born?
                    </option>
                    <option value="4" <?php if (isset($Q3) && $Q3 == "4")
                      echo 'selected'; ?>>What is your favorite movie?
                    </option>
                    <option value="5" <?php if (isset($Q3) && $Q3 == "5")
                      echo 'selected'; ?>>What is the name of your
                      favorite teacher?</option>
                    <option value="6" <?php if (isset($Q3) && $Q3 == "6")
                      echo 'selected'; ?>>What was the first concert
                      you attended?</option>
                    <option value="7" <?php if (isset($Q3) && $Q3 == "7")
                      echo 'selected'; ?>>What is the name of your
                      favorite book?</option>
                    <option value="8" <?php if (isset($Q3) && $Q3 == "8")
                      echo 'selected'; ?>>What is the make and model
                      of your first car?</option>
                    <option value="9" <?php if (isset($Q3) && $Q3 == "9")
                      echo 'selected'; ?>>What is your favorite
                      vacation spot?</option>
                    <option value="10" <?php if (isset($Q3) && $Q3 == "10")
                      echo 'selected'; ?>>What was your high school
                      mascot?</option>
                    <option value="11" <?php if (isset($Q3) && $Q3 == "11")
                      echo 'selected'; ?>>What is the name of your
                      childhood best friend?</option>
                    <option value="12" <?php if (isset($Q3) && $Q3 == "12")
                      echo 'selected'; ?>>What is your favorite
                      food?</option>
                    <option value="13" <?php if (isset($Q3) && $Q3 == "13")
                      echo 'selected'; ?>>What is the name of the
                      street you grew up on?</option>
                    <option value="14" <?php if (isset($Q3) && $Q3 == "14")
                      echo 'selected'; ?>>What is the year of your
                      parents' wedding anniversary?</option>
                    <option value="15" <?php if (isset($Q3) && $Q3 == "15")
                      echo 'selected'; ?>>What was the name of your
                      first boss?</option>
                    <option value="16" <?php if (isset($Q3) && $Q3 == "16")
                      echo 'selected'; ?>>What is your favorite
                      sports team?</option>
                    <option value="17" <?php if (isset($Q3) && $Q3 == "17")
                      echo 'selected'; ?>>What is the name of the
                      hospital where you were born?</option>
                    <option value="18" <?php if (isset($Q3) && $Q3 == "18")
                      echo 'selected'; ?>>What is your favorite
                      color?</option>
                    <option value="19" <?php if (isset($Q3) && $Q3 == "19")
                      echo 'selected'; ?>>What was the name of your
                      first crush?</option>
                    <option value="20" <?php if (isset($Q3) && $Q3 == "20")
                      echo 'selected'; ?>>What is the name of the
                      town where you had your first job?</option>
                  </select>
                  <label for="Q3">Question 3</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="QInput3" name="QInput3" placeholder="" <?php isset($ans3) ? print "value='$ans3' required" : print "required disabled" ?>
                  minlength="3" maxlength="50" pattern="^[a-z0-9\s]+$" title="Only small letters, numbers, and spaces are allowed">
                  <label for="QInput3">Answer</label>
                </div>
              </div>
            </div>
          </div>
          <!-- Error Message -->
          <p id="error" class="text-danger text-center fw-bold"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <input type="submit" value="Submit" class="btn btn-primary w-25">
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  //dom ready
  document.addEventListener("DOMContentLoaded", function (event) {

    let Que1 = document.getElementById('Q1');
    let Que2 = document.getElementById('Q2');
    let Que3 = document.getElementById('Q3');
    let error = document.getElementById('error');
    let QInput1 = document.getElementById('QInput1');
    let QInput2 = document.getElementById('QInput2');
    let QInput3 = document.getElementById('QInput3');

    error.innerHTML = "";


    Que1.addEventListener('change', function () {
      if (Que1.value == Que2.value || Que1.value == Que3.value) {
        error.innerHTML = "Question cannot be the same as the other questions";
        Que1.value = "Choose...";
        QInput1.setAttribute('disabled', 'disabled');
      } else {
        error.innerHTML = "";
        QInput1.removeAttribute('disabled');
      }
    });

    Que2.addEventListener('change', function () {
      if (Que2.value == Que1.value || Que2.value == Que3.value) {
        error.innerHTML = "Question cannot be the same as the other questions";
        Que2.value = "Choose...";
        QInput2.setAttribute('disabled', 'disabled');
      } else {
        error.innerHTML = "";
        QInput2.removeAttribute('disabled');
      }
    });

    Que3.addEventListener('change', function () {
      if (Que3.value == Que1.value || Que3.value == Que2.value) {
        error.innerHTML = "Question cannot be the same as the other questions";
        Que3.value = "Choose...";
        QInput3.setAttribute('disabled', 'disabled');
      } else {
        error.innerHTML = "";
        QInput3.removeAttribute('disabled');
      }
    });



    document.querySelector('form').addEventListener('submit', function (e) {
      if (Que1.value == "Choose...") {
        error.innerHTML = "Please select a question for Question 1";
        e.preventDefault();
      } else if (Que2.value == "Choose...") {
        error.innerHTML = "Please select a question for Question 2";
        e.preventDefault();
      } else if (Que3.value == "Choose...") {
        error.innerHTML = "Please select a question for Question 3";
        e.preventDefault();
      } else {
        error.innerHTML = "";
        // set form action to the php file
        this.action = "../Components/SecQue.php";
      }
    });



    // clear error after 5 seconds
    setTimeout(function () {
      error.innerHTML = "";
    }, 5000);












  });
</script>