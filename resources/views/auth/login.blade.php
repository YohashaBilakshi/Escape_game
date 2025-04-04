<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Permanent+Marker&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<section class="forms-section">
  <h1 class="section-title"><img src="/assets/img/title.png" alt=""> <button style="background:transparent; border: none; font-family: 'Permanent Marker', cursive;" 
  onclick="window.open('/readme', '_blank')">ℹ️ info</button></h1>
 
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        <img src="/assets/img/login.png" alt="">
        <span class="underline"></span>
      </button>
      
      @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
      </div>
      @endif
     
      <form class="form form-login" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
        <x-validation-errors class="mb-4 error-msg" />
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email"><img src="/assets/img/email_text.png" alt=""></label>
            <!-- <input id="login-email" type="email" required> -->
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          </div>
          <div class="input-block">
            <label for="login-password"><img src="/assets/img/pass_txt.png" alt=""></label>
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
          </div>
        </fieldset>

        <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
          @endif

          <button type="submit" class="btn-signup ml-4">
            <img src="/assets/img/sign_up_txt.png" alt="">
          </button>
        </div>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        <img src="/assets/img/sign_up.png" alt="">
        <span class="underline"></span>
      </button>

      <form class="form form-signup" method="POST" action="{{ route('register') }}">
        @csrf
        <x-validation-errors class="mb-4 error-msg" />

        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email"><img src="/assets/img/name_txt.png" alt=""></label>
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
          </div>
          <div class="input-block">
            <label for="signup-email"><img src="/assets/img/email_text.png" alt=""></label>
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
          </div>
          <div class="input-block">
            <label for="signup-password"><img src="/assets/img/pass_txt.png" alt=""></label>
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
          </div>
          <div class="input-block">
            <label for="signup-password-confirm"><img src="/assets/img/confirm_pass_txt.png" alt=""></label>
            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
          </div>
        </fieldset>
        <div class="flex items-center justify-end mt-4">
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>

          <button type="submit" class="btn-signup ml-4">
            <img src="/assets/img/sign_up_txt.png" alt="">
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
  const switchers = [...document.querySelectorAll('.switcher')]

  switchers.forEach(item => {
    item.addEventListener('click', function() {
      switchers.forEach(item => item.parentElement.classList.remove('is-active'))
      this.parentElement.classList.add('is-active')
    })
  })
</script>