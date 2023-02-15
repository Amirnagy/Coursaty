<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>My CV</title>
    <style>
        /* Add some styling for the CV */
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .section h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .section p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <h1>My CV</h1>

    <div class="section">
        <h2>Name</h2>
        <p>{{ $user->name }}</p>
    </div>

    <div class="section">
        <h2>Occupation</h2>
        <p>{{ $userInfoInstractor->occupation }}</p>
    </div>

    <div class="section">
        <h2>Education</h2>
        <p>{{ $userInfoInstractor->education }}</p>
    </div>

    <div class="section">
        <h2>Certifications</h2>
        <p>{{ $userInfoInstractor->certifications }}</p>
    </div>

    <div class="section">
        <h2>Experience</h2>
        <p>{{ $userInfoInstractor->experience }}</p>
    </div>

    <div class="section">
        <h2>Skills</h2>
        <p>{{ $userInfoInstractor->skills }}</p>
    </div>
</body>

</html>
