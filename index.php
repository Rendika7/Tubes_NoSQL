<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Telkom Surabaya</title>
    <link rel="icon" href="Source\ITTS_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lumanosimo&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <input type="checkbox" aria-hidden="true" id="chk">
        <div class="signup">
            <form action="signup.php"  method="POST">
                <label for="chk" aria-hidden="true">Signup</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="password" id="password" placeholder="Confirm Password">
                <input class="button" type="submit" name="signup" id="signup" value="Signup"><br/><br/>
            </form>
            <div class="icon-container">
                <a href="https://ittelkom-sby.ac.id/ "target="_blank"><img src="Source\Website.png" alt="Icon 1"></a>
                <a href="https://www.instagram.com/ittelkomsurabaya/" target="_blank"><img src="Source\Instagram.png" alt="Icon 2"></a>
                <a href="https://tr.ee/oJL_5s1A-4" target="_blank"><img src="Source\WhatsApp.png" alt="Icon 3"></a>
            </div>
        </div>
        <div class="login">
            <form action="login.php" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input class="button" type="submit" name="login" id="login" value="Login">
            </form>

            <div class="icon-container">
                <a href="https://ittelkom-sby.ac.id/" target="_blank"><img src="Source\Website.png" alt="Icon 1"></a>
                <a href="https://www.instagram.com/ittelkomsurabaya/" target="_blank"><img src="Source\Instagram.png" alt="Icon 2"></a>
                <a href="https://tr.ee/oJL_5s1A-4" target="_blank"><img src="Source\WhatsApp.png" alt="Icon 3"></a>
            </div>

            <div class="text">
                <p>Solution For The Nation.</p>
            </div>
        </div>
    </div>
</body>
</html>