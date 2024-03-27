<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card shadow-sm border-light rounded">
        <div class="card-header bg-light text-center">
            <img src="gambar1.jpg" alt="Logo" style="max-width: 100px;">
            <h3>ComplexHub</h3>
          <h3>Login</h3>
        </div>
        <div class="card-body">
            <form action="#" method="post">
              <div class="mb-3">
                <label for="username" class="form-label visually-hidden">Email</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Email" aria-describedby="usernameHelp" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label visually-hidden">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
            <div class="text-right mt-3" style="font-size:15px;">
              <a href="#">Forgot Password?</a>
            </div>
          </div>
        
          
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQWJVwQvVEXyDbCsz7cyNxBiZgfNbtFcxgDJKJCxnnyOM"); ?>" crossorigin="anonymous"></script>
  </body>
</html>
