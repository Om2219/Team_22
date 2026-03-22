<x-layout>

    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

    <div class="name-container">
        <h1>Change name & title</h1>

        <div class="name-entry-labels">
            <label for="title"><b>Current title</b></label>
            <label for="forename"><b>Current forename</b></label>
            <label for="surname"><b>Current surname</b></label>
        </div>

        <div class="name-entry-inputs">
            <input type="text" value="{{auth()->user()->title}}" disabled class="greyed-out-input">

            <input type="text" value="{{auth()->user()->forename}}" disabled class="greyed-out-input">

            <input type="text" value="{{auth()->user()->surname}}" disabled class="greyed-out-input">
        </div>

        <form action="{{route('update.name')}}" method="POST">
            @csrf

            <div class="name-entry-labels">
                <label for="title"><b>Title</b></label>
                <label for="forename"><b>Forename</b></label>
                <label for="surname"><b>Surname</b></label>
            </div>

            <div class="name-entry-inputs">
                <select id="title" name="title" required>
                    <option value=""></option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                    <option value="Mx.">Mx.</option>
                </select>

                <input id="forename" type="text" placeholder="Enter forename" name="forename" required>

                <input id="surname" type="text" placeholder="Enter surname" name="surname" required>
            </div>

            <button type="submit" class="save-btn">Update details</button>
        </form>

        <br>

        <div class="back-btn-wrapper">
            <a href="/mydetails" class="save-btn">Go back</a>
        </div>
    </div>

</x-layout>

<style>
    .name-container{
        width: 600px;
        margin: 40px auto;
        border: 3px solid #7a4900;
        border-radius: 8px;
        padding:20px;
    }
    
    [data-bs-theme="light"] .name-container {
        background: white;
    }
    [data-bs-theme="dark"] .name-container {
        background: rgb(44, 46, 48);
    }

    .name-container h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
    }

    .name-container .name-entry-labels {
        display: flex;
        justify-content: space-between;
        padding-top: 5px;
        margin-bottom: 8px;
    }

    .name-container .name-entry-labels label {
        width: 30%;
        text-align: center;
    }

    .name-container .name-entry-inputs {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .name-container .name-entry-inputs input[type="text"], .name-container .name-entry-inputs select {
        width: 30%;
        height: 45px;
        padding: 12px 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .name-container button {
        width: 100%;
        padding: 14px 20px;
        margin-top: 16px;
        background-color: #bdab53;
        color: black;
        font-weight: 600;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .name-container a.save-btn {
        display: inline-block;
        text-align: center;
        margin-top: 15px;
        font-weight: 600;
        padding: 12px 20px;
        background-color: #bdab53;
        color: black;
        border-radius: 4px;
        text-decoration: none;
    }

    [data-bs-theme="light"] .name-container a.save-btn {
        background-color: #bdab53;
        color: black;
    }
    [data-bs-theme="dark"] .name-container a.save-btn {
        background-color: #8d7f3e;
        color: rgb(255, 255, 255);
    }

    .name-container button:hover, .name-container a.save-btn:hover {
        opacity: 0.8;
    }
</style>