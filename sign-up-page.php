<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TeaProj. E-Sip - Sign Up</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/sign-up-page.css">
   <link rel="stylesheet" href="css/snackbar.css">
</head>
<body>

   <?php 
   session_start();
   include ('components/index-header.php'); 
   ?>

<main>
<section class="form-container">
   <form action="sign-up-handler.php" method="post" onsubmit="return validateForm()">
      <div class="step active" id="step1">
         <h3>Personal Information</h3>
         <input type="text" id="fname" name="fname" required placeholder="First Name" class="box" maxlength="50" pattern="[a-zA-Z\s]{1,50}$" title="First name must contain only letters and be maximum 50 characters long." oninput="validateInput(this)">
         <input type="text" id="lname" name="lname" required placeholder="Last Name" pattern="[a-zA-Z\s]{1,50}$" class="box" maxlength="50" oninput="validateInput(this)" title="Last name must contain only letters and be maximum 50 characters long.">
         <input type="email" id="email" name="email" required placeholder="E-mail Address" class="box" oninput="validateInput(this)" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
         <input class="box" type="password" id="pass" name="pass" required placeholder="Password" maxlength="50" oninput="validateInput(this)" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$" title="Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character.">
         <input class="box" type="password" name="confirmPass" id="confirmPassword" placeholder="Confirm Password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$" title="Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character.">
         <div class="show-pass">
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
            <label for="show-password">Show Passwords</label>
         </div>
         <div id="password-message"></div>
         <script>
            document.getElementById("confirmPassword").addEventListener("input", function () {
               var password = document.getElementById("pass");
               var confirmPassword = document.getElementById("confirmPassword");
               var message = document.getElementById("password-message");

               if (confirmPassword.value === '') {
                  message.innerHTML = '';
                  message.style.display = 'none';
               } else if (password.value === confirmPassword.value) {
                  confirmPassword.setCustomValidity('');
                  message.innerHTML = '';
                  message.style.display = 'none';
               } else {
                  confirmPassword.setCustomValidity('Passwords do not match');
                  message.innerHTML = 'Passwords do not match';
                  message.style.display = 'block';
               }
            });
         </script>
         <input class="box" type="text" id="num" name="num" required placeholder="Phone Number" required pattern="^(09\d{9}|0\d{11})$" maxlength="11" title="Contact number should start with '0' and be exactly 11 digits" oninput="validateInput(this)">
         <div class="button-container">
            <input type="reset" id="clear-fields" value="clear fields" name="submit" class="btn">
            <button type="button" class="btn next" onclick="showStep(2)">Next</button>
         </div>
      </div>
      <div class="step" id="step2">
         <h3>Security Questions</h3>
         <select class="box" name="questions1" required>
            <option value="" disabled selected>Security Question 1</option>
            <option value="What is the name of your first pet?">What is the name of your first pet?</option>
            <option value="In what city were you born?">In what city were you born?</option>
            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
            <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
            <option value="What is the name of your favorite teacher?">What is the name of your favorite teacher?</option>
            <option value="What is the title of your favorite book?">What is the title of your favorite book?</option>
            <option value="What is your favorite movie?">What is your favorite movie?</option>
            <option value="What was the name of your first school?">What was the name of your first school?</option>
            <option value="What is your favorite food?">What is your favorite food?</option>
            <option value="What is the name of the street you grew up on?">What is the name of the street you grew up on?</option>
            <option value="What was your childhood nickname?">What was your childhood nickname?</option>
            <option value="What is the name of your first employer?">What is the name of your first employer?</option>
         </select>
         <input class="box" type="text" name="answer1" placeholder="Answer 1" maxlength="20" required>
         <select class="box" name="questions2" required>
            <option value="" disabled selected>Security Question 2</option>
            <option value="What is the name of your first pet?">What is the name of your first pet?</option>
            <option value="In what city were you born?">In what city were you born?</option>
            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
            <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
            <option value="What is the name of your favorite teacher?">What is the name of your favorite teacher?</option>
            <option value="What is the title of your favorite book?">What is the title of your favorite book?</option>
            <option value="What is your favorite movie?">What is your favorite movie?</option>
            <option value="What was the name of your first school?">What was the name of your first school?</option>
            <option value="What is your favorite food?">What is your favorite food?</option>
            <option value="What is the name of the street you grew up on?">What is the name of the street you grew up on?</option>
            <option value="What was your childhood nickname?">What was your childhood nickname?</option>
            <option value="What is the name of your first employer?">What is the name of your first employer?</option>
         </select>
         <input class="box" type="text" name="answer2" placeholder="Answer 2" maxlength="20" required>

         <div class="button-container">
            <button type="button" class="btn" onclick="showStep(1)">Previous</button>
            <input type="submit" id="register" value="register now" name="submit" class="btn confirm">
         </div>
      </div>
            <p>already have an account? <a href="sign-in-page.php">login now</a></p>
   </form>
</section>
</main>
<script>
   function validateInput(input) {
      if (!input.checkValidity()) {
         input.classList.add('invalid-input');
      } else {
         input.classList.remove('invalid-input');
      }
   }

   function validateForm() {
      var inputs = document.getElementsByTagName('input');
      for (var i = 0; i < inputs.length; i++) {
         if (!inputs[i].checkValidity()) {
            inputs[i].classList.add('invalid-input');
            return false;
         }
      }
      return true;
   }

   function togglePasswordVisibility() {
      var passwordInput = document.getElementById('pass');
      var confirmPasswordInput = document.getElementById('confirmPassword');
      var showPasswordCheckbox = document.getElementById('show-password');

      if (showPasswordCheckbox.checked) {
         passwordInput.type = 'text';
         confirmPasswordInput.type = 'text';
      } else {
         passwordInput.type = 'password';
         confirmPasswordInput.type = 'password';
      }
   }

   function showStep(step) {
      var steps = document.getElementsByClassName('step');
      for (var i = 0; i < steps.length; i++) {
         steps[i].classList.remove('active');
      }
      document.getElementById('step' + step).classList.add('active');
   }

   document.addEventListener('DOMContentLoaded', function () {
      var questionDropdowns = document.querySelectorAll('select[name^="questions"]');
      questionDropdowns.forEach(function (dropdown) {
         dropdown.addEventListener('change', function () {
            var selectedValue = this.value;
            questionDropdowns.forEach(function (otherDropdown) {
               if (otherDropdown !== dropdown) {
                  var options = otherDropdown.options;
                  for (var i = 0; i < options.length; i++) {
                     if (options[i].value === selectedValue) {
                        options[i].disabled = true;
                     } else {
                        options[i].disabled = false;
                     }
                  }
               }
            });
         });
      });
   });
</script>    
<?php if (isset($_SESSION['error_message'])): ?>
         <div class="snack-bar-container">
            <div id="snackbar" class="snack-bar show"><?php echo $_SESSION['error_message']; ?></div>
         </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <script>
        // Automatically hide the snackbar after it fades out
        setTimeout(function() {
            var x = document.getElementById("snackbar");
            x.className = x.className.replace("show", "");
        }, 3000);
    </script>
<?php include "components/footer.php"; ?>

</body>
</html>
