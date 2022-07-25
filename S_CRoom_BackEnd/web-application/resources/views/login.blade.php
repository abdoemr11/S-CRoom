<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <h1>BENHA FACULTY OF ENGINEERING</h1>
</header>
<main>
    <form id="login_form" class="form_class" action="login" method="post">
        @csrf
        <p id="log">LOGIN AS</p>
        <input name="role" value="STUDENT" class="field_class , use-keyboard-input" list="list1" placeholder="Who are you?">
        <datalist id="list1">
            <option value="STUDENT"></option>
            <option value="PROFESSOR"></option>
            <option value="ADMIN"></option>
        </datalist>
        @error('role')
        {{$message}}
        @enderror
        <br>
        <div class="form_div">
            <p id="no1">ID:</p>
            <input name="id" value="47" class="field_class , use-keyboard-input"  type="text" placeholder="Enter your ID" maxlength="20">
            @error('id')
            {{$message}}
            @enderror
            <p id="no2">PASSWORD:</p>
            <input name="password" value="password" id="pass" class="field_class , use-keyboard-input" name="password_txt" type="password" placeholder="Enter the password" maxlength="20">
            @error('password')
            {{$message}}
            @enderror
            <button class="submit_class" type="submit" form="login_form">Submit</button>
        </div>

    </form>
</main>
<footer>
    <br><br>
    <p>Keep Learning</p>
</footer>
</body>
