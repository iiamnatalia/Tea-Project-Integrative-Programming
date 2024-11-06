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

   <style>

      main {
        overflow-y: auto;
      }

      .form-container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 95vh; /* Ensure the form container takes at least the full viewport height */
         padding: 2rem; /* Add padding to the container to allow space for scrolling when zoomed in */
         box-sizing: border-box; /* Include padding in the element's total width and height */
      }

      .form-container form {
         width: 600px;
         margin: 0 auto;
         padding: 3.3rem;
         text-align: center;
         color: var(--coffee-text);
         backdrop-filter: blur(10px) saturate(200%);
         -webkit-backdrop-filter: blur(10px) saturate(200%);
         background-color: rgba(232, 245, 216, 0.32);
         border-radius: 12px;
         border: 1px solid rgba(209, 213, 219, 0.3);
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .invalid-input {
         border: 1px solid red;
      }

      input[type="email"],
      input[type="password"],input[type="text"], select  {
         width: calc(100% - 30px);
         /*Adjustedwidth*/padding: 10px;
         margin-bottom: 10px;
         border: 1px solid #ccc;
         border-radius: 15px;
         box-sizing: border-box;
         display: inline-block;
         
         -webkit-border-radius: 6px;
         -moz-border-radius: 6px;
         -ms-border-radius: 6px;
         -o-border-radius: 6px;
}

      .form-container form h3 {
         font-size: 3rem;
         text-transform: uppercase;
         color: var(--coffee-text);
      }

      .button-container {
         display: flex;
         justify-content: space-between;
         margin-top: -5px; /* Adjust margin as needed */
         width: 100%; /* Ensure the container spans the entire width */
      }

      .btn {
         display: inline-block;
         margin-top: 1rem;
         padding: 1.3rem 3rem;
         cursor: pointer;
         border-radius: 6px;
         font-size: 1.5rem;
         text-transform: capitalize;
         width: 49.6%; /* Allow buttons to take only the necessary width */
      }


      .show-pass {
         display: flex;
         justify-content: center;
         align-content: center;
         font-size: 15px;
         gap: 5px;
         margin-top: 5px;
      }

      .show-password-container input[type="checkbox"] {
         margin-right: 0.5rem;
      }

      input.btn.confirm {
          background-color: #0e3d30;
      }

      #password-message {
        color: rgb(229 1 1 / 73%);
        font-weight: 600;
        display: none;
        font-size: 13px;
        padding: 2px 0px 5px;
      } 
      input#register {
         color: white;
      }
      .form-container form .box {
         border-radius: 6px;
      }
   </style>
</head>
<body>

   <?php 
   include ('components/index-header.php'); 
   ?>

<main>

<section class="form-container">
   <form action="sign-up-handler.php" method="post" onsubmit="return validateForm()">
      <div>
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
                  message.style.display = 'none'; // Hide the message
               } else if (password.value === confirmPassword.value) {
                  confirmPassword.setCustomValidity('');
                  message.innerHTML = '';
                  message.style.display = 'none'; // Hide the message
               } else {
                  confirmPassword.setCustomValidity('Passwords do not match');
                  message.innerHTML = 'Passwords do not match';
                  message.style.display = 'block'; // Show the message
               }
            });
         </script>

         <input class="box" type="text" id="num" name="num" required placeholder="Phone Number" required pattern="^(09\d{9}|0\d{11})$" maxlength="11" title="Contact number should start with '0' and be exactly 11 digits" oninput="validateInput(this)">
      </div>
      <div>
         <h3>Security Questions</h3>
          <!-- Inside the form for sign-up -->
          <select class="box" name="questions1" required>
              <option value="" disabled selected>Security Question 1</option>
              <option value="What is the name of your first pet?">What is the name of your first pet?</option>
              <option value="In what city were you born?">In what city were you born?</option>
              <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
              <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
              <option value="What is the name of your favorite teacher?">What is the name of your favorite teacher?</option>
              <option value="What is the title of your favorite book?">What is the title of your favorite book?</option>
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
          </select>

          <input class="box" type="text" name="answer2" placeholder="Answer 2" maxlength="20" required>

      </div>

      <div class="button-container">
         <input type="reset" id="clear-fields" value="clear fields" name="submit" class="btn">
         <input type="submit" id="register" value="register now" name="submit" class="btn confirm">
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
            return false; // prevent form submission if any input is invalid
         }
      }
      return true;
   }

   function togglePasswordVisibility() {
      var passwordInput = document.getElementById('password');
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
<?php include "components/footer.php"; ?>

</body>
</html>
