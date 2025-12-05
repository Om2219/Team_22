{{-- @todo Add comments to explain what this file is for, and each section of code below --}}

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @todo Add comments to the head section. Where does the CSS come from? --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module list</title>
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
                            <a class="nav-link " aria-current="page" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./studentlisting ">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./modulelisting">Modules</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1>Module List</h1>
    <table class="table table-hover">
        {{-- @todo What is the <tr> tag used for? --}}
        <tr>
            {{-- @todo What is the <th> tag used for? --}}
            {{-- @todo Why do we use these names for the table headings? --}}
            <th>Module Code</th>
            <th>Module Name</th>
            <th>Optional?</th>
            <th>Max. Students</th>
            <th>Enrolled Students</th>
        </tr>

        {{-- @todo Add comments to explain the purpose of the @foreach loop --}}
        {{-- @todo Add comments to explain how the $modules array is used. Where does it come from? --}}
        {{-- @todo Add comments to explain how the $module variable is used --}}
        @foreach ($modules as $module)
        <tr>
            <td>
                {{-- @todo Add comments to explain how the module code is displayed as a hyperlink --}}
                {{-- @todo Add comments to explain how the module id is linked to the module details page --}}
                <a href="./moduledetails/{{$module->id}}">{{$module->modulecode}}</a>
            </td>

            <td>{{$module->modulename}}</td>
            <td>
                {{-- @todo Add comments to explain the if statement below --}}
                @if ($module->optional == 0)
                No
                @else
                Yes
                @endif
            </td>
            <td>{{$module->maxstudents}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
