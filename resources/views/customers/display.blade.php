<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/navigation-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/content-style.css')}}">
    <title>Customers</title>
</head>
<body>

    <x-navigation />
    <div class="content">
        <div class="container-search">
            <button class="btn" onclick="window.location.href='{{ route('customers.create')}}'">Add a customer</button>
            <div class="actionable">
                <div class="actionable-content">
                    <svg id="Glyph" width="24" height="24" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                        <path d="m57.43912 57.55984-12.53612-14.54825a22.58833 22.58833 0 0 0 6.77517-14.54959c1.57683-20.0629-22.3539-32.12578-37.5801-18.93981-15.97607 13.95881-6.08427 39.95005 14.88377 40.01781a22.67416 22.67416 0 0 0 13.69116-4.601l12.53273 14.54435a1.47393 1.47393 0 0 0 2.23339-1.92351zm-43.49346-17.84118c-11.07256-12.74753-1.71407-32.88705 15.00653-32.76242 11.10839-.24055 20.85452 9.96065 19.78728 21.28776-1.22532 17.48-23.37979 24.78391-34.79381 11.47466z"/>
                    </svg>
                    <input type="text" id="search-bar" name="search">
                </div>
            </div>
        </div>
        <div class="container-table">
            <table data-table="customers">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Civil Status</th>
                    <th>Contact Number</th>
                    <th>Facebook</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $element)
                    <tr>
                        @foreach($element->attributesToArray() as $displayable)
                            <td>{{$displayable}}</td>
                        @endforeach
                        <td>
                            <form method="POST">
                                <button type="submit" formmethod="get" formaction=
                                    "/customer/edit/{{$element->getAttribute($element->getKeyName())}}">
                                    <svg style="width: 18px; height: 18px;" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m25.287 8.025a2.431 2.431 0 0 0 0-3.44l-1.872-1.873a2.437 2.437 0 0 0 -3.44 0l-1.2 1.2 5.313 5.312z"/>
                                        <path d="m9 14.1v3.9a1 1 0 0 0 1 1h3.9a1 1 0 0 0 .707-.293l8.065-8.065-5.315-5.312-8.064 8.07a1 1 0 0 0 -.293.7z"/>
                                        <path d="m26 13a1 1 0 0 0 -1 1v7.853a3.151 3.151 0 0 1 -3.147 3.147h-15.706a3.151 3.151 0 0 1 -3.147-3.147v-15.706a3.151 3.151 0 0 1 3.147-3.147h7.853a1 1 0 0 0 0-2h-7.853a5.154 5.154 0 0 0 -5.147 5.147v15.706a5.154 5.154 0 0 0 5.147 5.147h15.706a5.154 5.154 0 0 0 5.147-5.147v-7.853a1 1 0 0 0 -1-1z"/>
                                    </svg>
                                </button>
                                <button type="submit" formmethod="get" formaction=
                                    "/customer/delete/{{$element->getAttribute($element->getKeyName())}}">
                                    <svg style="width: 18px; height: 18px;" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m25 5h-6.1a5 5 0 0 0 -9.8 0h-6.1a1 1 0 0 0 0 2h1v15.331a4.675 4.675 0 0 0 4.67 4.669h10.66a4.675 4.675 0 0 0 4.67-4.669v-15.331h1a1 1 0 0 0 0-2zm-11-2a3.006 3.006 0 0 1 2.829 2h-5.658a3.006 3.006 0 0 1 2.829-2zm-2 17a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0zm6 0a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <template id="edit-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
            <path d="m25.287 8.025a2.431 2.431 0 0 0 0-3.44l-1.872-1.873a2.437 2.437 0 0 0 -3.44 0l-1.2 1.2 5.313 5.312z"/>
            <path d="m9 14.1v3.9a1 1 0 0 0 1 1h3.9a1 1 0 0 0 .707-.293l8.065-8.065-5.315-5.312-8.064 8.07a1 1 0 0 0 -.293.7z"/>
            <path d="m26 13a1 1 0 0 0 -1 1v7.853a3.151 3.151 0 0 1 -3.147 3.147h-15.706a3.151 3.151 0 0 1 -3.147-3.147v-15.706a3.151 3.151 0 0 1 3.147-3.147h7.853a1 1 0 0 0 0-2h-7.853a5.154 5.154 0 0 0 -5.147 5.147v15.706a5.154 5.154 0 0 0 5.147 5.147h15.706a5.154 5.154 0 0 0 5.147-5.147v-7.853a1 1 0 0 0 -1-1z"/>
        </svg>
    </template>
    <template id="bin-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
            <path d="m25 5h-6.1a5 5 0 0 0 -9.8 0h-6.1a1 1 0 0 0 0 2h1v15.331a4.675 4.675 0 0 0 4.67 4.669h10.66a4.675 4.675 0 0 0 4.67-4.669v-15.331h1a1 1 0 0 0 0-2zm-11-2a3.006 3.006 0 0 1 2.829 2h-5.658a3.006 3.006 0 0 1 2.829-2zm-2 17a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0zm6 0a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0z"/>
        </svg>
    </template>

    <script src="{{asset('/js/customers/search.js')}}"></script>

</body>
</html>
