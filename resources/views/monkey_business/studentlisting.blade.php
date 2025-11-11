{{-- @todo Add comments to explain what this file is for, and each section of code below --}}

<!DOCTYPE html>
<html lang="en">

<head>
{{-- @todo Add comments to the head section. Where does the CSS come from? --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        {{-- @todo How is the active page indicated? --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./studentlisting ">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./modulelisting">Modules</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1>Student List</h1>
    {{-- @todo What is the <tr> tag used for? --}}
    <table class="table table-hover">
        <tr>
            {{-- @todo What is the <th> tag used for? --}}
            {{-- @todo Why do we use these names for the table headings? --}}
            <th>Student number</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Degree course</th>
            <th>Email</th>
            <th>Date of birth</th>
        </tr>

        {{-- @todo Add comments to explain the purpose of the @foreach loop --}}
        {{-- @todo Add comments to explain how the $modules array is used. Where does it come from? --}}
        {{-- @todo Add comments to explain how the $module variable is used --}}
        @foreach ($students as $student)
        <tr>
            <td>
                {{-- @todo Add comments to explain how the student number is displayed as a hyperlink --}}
                {{-- @todo Add comments to explain how the student id is linked to the student details page --}}
                <a href="./studentprofile/{{ $student->id }}">{{ $student->studentnumber }}</a>
            </td>               
            {{-- @todo Add comments to explain how the student details are displayed --}}
            <td>{{ $student->firstname }}</td>
            <td>{{ $student->lastname }}</td>
            <td>{{ $student->degreecourse }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->dob }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>