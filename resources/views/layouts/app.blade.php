<!DOCTYPE html>
<html lang="en">

    <head>
        @include("layouts.partials._styles")
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            * {
                font-family: "Poppins", sans-serif;
                font-weight: 500;
                font-style: normal;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">

        @include("layouts.partials._topbar")

        <div id="layoutSidenav">

            @include("layouts.partials._sidebar")

            <div id="layoutSidenav_content">

                <main>
                    @yield("content")
                </main>

                @include("layouts.partials._footer")

            </div>
        </div>

        @include("layouts.partials._scripts")

    </body>

</html>
