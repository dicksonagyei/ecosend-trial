<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div  class="container">
  <form method="POST" action="{{ route('register') }}">
    @csrf
      <div class="text-center mb-3">
        

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" name="name"/>
        <label class="form-label" for="registerName">Name</label>
      </div>


      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" name="email" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" name="password" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" name="password_confirmation"/>
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

    

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
      <br>
      Already a member? 
      <a href="{{route('login')}}">
      Login
      </a>
    </form>
  </div>
</div>
<!-- Pills content -->
</body>
</html>