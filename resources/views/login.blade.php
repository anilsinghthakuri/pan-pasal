<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>add user</title>
</head>
<body class="login__images">


        <div class="login__section">
            <div class="login__contain">
                <form method="POST" action="/login" enctype="multipart/form-data" >
                    @csrf
                    <div class="input-group mb-3">
                        <h2 class="login__title">Sign In to POS</h2>
                        <p class="login__text">The work, the thought and the organization you put into this app is incredible.</p>
                    </div>
                    {{-- <div class="images mb-3">
                        <img class="logo__img" src="img/food3.jpg" class="img-thumbnail" alt="logo">
                    </div> --}}


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="email" class="form-control login__input" placeholder="Email" name="email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">**</span>
                        <input type="password" class="form-control login__input" placeholder="Password"  name="password" aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" value="Login" class="btn btn-primary btn-primary-login">Log In</button>
                </form>

            </div>

        </div>


</body>
</html>
