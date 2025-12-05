{{-- @todo Add comments to explain what this file is for, and each section of code below --}}

<!DOCTYPE html>
<html lang="en">
<head>
    {{-- @todo Add comments to the head section. Where does the CSS come from? --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- @todo Add comments to the title tag. What is the title of this page? --}}
    {{-- @todo Where is the $student variable from? --}}
    <title>Student {{$student->studentnumber}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <header>
         {{-- @todo How is the active page indicated? --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../studentlisting">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../modulelisting">Modules</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{-- @todo Add comments to explain how the $module variable is used --}}
    <h1>{{$student->firstname}} {{$student->surname}}</h1>
    <h2> Student number: {{$student->studentnumber}}</h2>
    <p><b>Degree course:</b> {{$student->degreecourse}}</p>
    <p><b>Email:</b> {{$student->email}}</p>
    <p><b>Date of birth:</b> {{$student->dob}}</p>


    <p><a href="../studentlisting">Back to student list</a></p>
</body>

</html>
