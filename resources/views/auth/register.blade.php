<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drip&Co Register</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #fce5cd, #fff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .title {
            background: #d18c1d;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #d18c1d;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            background: #000;
            color: white;
            margin-top: 10px;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #c2a378;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #c2a378;
        }

        .divider:not(:empty)::before {
            margin-right: .5em;
        }

        .divider:not(:empty)::after {
            margin-left: .5em;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid #d18c1d;
            background: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .google-btn img {
            width: 20px;
        }

        .switch {
            margin-top: 15px;
            font-size: 14px;
        }

        .switch a {
            color: #d18c1d;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Drip&Co Register</div>
        <h1>SELAMAT DATANG DI DRIP&CO</h1>

        <form method="POST" action="{{ route('register') }}">
@csrf
            <!-- Name -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Kata sandi (minimal 8 karakter)</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                @error('password_confirmation')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Daftar</button>
        </form>

        <div class="divider">Atau</div>

        <button class="google-btn">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google">
            Lanjutkan dengan Google
        </button>

        <div class="switch">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>

</html>