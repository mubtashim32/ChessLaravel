<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/editProfile.css') }}">
    @vite(['resources/js/editProfile.js'])
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="c">
        <div class="headingC">
            <div>Edit Profile</div>
        </div>
        <div class="infoC">
            <form action="" class="info">
                @csrf
                <div class="nameC">
                    <div class="inputC">
                        <input type="text" placeholder="First Name: {{ $user->firstname }}" id="firstname" name="firstname">
                    </div>
                    <div class="inputC">
                        <input type="text" placeholder="Last Name: {{ $user->lastname }}" id="lastname" name="lastname">
                    </div>
                    <div class="inputC">
                        <input type="text" placeholder="Username: {{ $user->username }}" id="username" name="username">
                    </div>
                </div>
                <div class="othersC">
                    <div class="inputC">
                        <input type="email" placeholder="Email: {{ $user->email }}" id="email" name="email">
                    </div>
                    <div class="inputC">
                        <input type="text" placeholder="Country: {{ $user->country }}" id="country" name="country">
                    </div>
                    <div class="inputC">
                        <input type="text" placeholder="Language: {{ $user->language }}" id="language" name="language">
                    </div>
                    <div class="inputC">
                        <input type="text" placeholder="Timezone: {{ $user->timezone }}" id="timezone" name="timezone">
                    </div>
                    <div class="btn">
                        <a onclick="updateInfo()">save changes</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="passC">
            <form action="" class="pass">
                <div class="old">
                    <div class="inputC">
                        <input type="password" placeholder="Old Password" id="oldpass" name="oldpass">
                    </div>
                </div>
                <div class="new">
                    <div class="inputC">
                        <input type="password" placeholder="New Password" id="newpass" name="newpass">
                    </div>
                    <div class="inputC">
                        <input type="password" placeholder="Confirm Password" id="confirmpass" name="confirmpass">
                    </div>
                    <div class="btn">
                        <a onclick="updatePassword()">change password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="cardContainer" id="cardContainer">
        <div class="cookieCard" id="cookieCard">
            <p class="cookieHeading">Update</p>
            <p class="cookieDescription" id="cookieDescription">User Information Updated Successfully.</p>
            <button class="acceptButton" onclick="refresh()">OK</button>
        </div>
    </div>
</body>
</html>
