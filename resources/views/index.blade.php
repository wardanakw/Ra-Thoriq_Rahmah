<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

</head>

<body>

<h2>Login Sistem Penilaian Perkembangan Anak</h2>

<form action="{{ route('login.proses') }}" method="POST">

@csrf

<label>Username</label>

<input type="text" name="username">

<br><br>

<label>Password</label>

<input type="password" name="password">

<br><br>

<button type="submit">

Login

</button>

</form>

</body>

</html>