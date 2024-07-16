<!--<form method="POST" action="{{ route('customer.login') }}">
    @csrf

    <label for="email">Email:</label>
    <input id="email" type="email" name="email" required>

    <label for="password">Password:</label>
    <input id="password" type="password" name="password" required>

    <button type="submit">Login</button>
</form>-->

<html>
    <head>  <link rel="stylesheet" href="/css/customerLogin.css"/><title>Login</title></head>
    <body>
        <section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Sign up a account</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Login!!!</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" method="post" action="{{ route('customer.login') }}">
            @csrf
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" placeholder="Email" name="email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" method="post" action="/register" enctype="multipart/form-data">
            @csrf
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Full Name" class="forms_field-input" name="name" required />
            </div>
            <div class="forms_field">
                <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
            </div>
            <div class="forms_field">
                <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
                <div class="forms_field">
                    <input type="text" placeholder="Phone" class="forms_field-input" name="phone" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
        <script>
            /**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)
            </script>
    </body>
</html>

