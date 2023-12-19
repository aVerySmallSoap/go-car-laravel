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
    <title>Receipts</title>
</head>
<body>

    <x-navigation />
    <div class="content">
        <div class="container-search">
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
        <table data-table="receipts">
            <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Agent</th>
                <th>Type</th>
                <th>Plate Number</th>
                <th>Destination</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $element)
                <tr>
                    <td>{{$element->receipt_ID}}</td>
                    <td>{{$element->customer_name}}</td>
                    <td>{{$element->agent_name}}</td>
                    <td>{{$element->vehicle_type}}</td>
                    <td>{{$element->vehicle_plateNo}}</td>
                    <td>{{$element->pretrip_destination}}</td>
                    <td>{{$element->receipt_total}}</td>
                    <td>
                        <form action="">
                            <button>
                                <svg style="width: 18px; height: 18px;" height="512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="m422.5 99v-24c0-41.355-33.645-75-75-75h-184c-41.355 0-75 33.645-75 75v24z"/>
                                        <path d="m118.5 319v122 26 15c0 16.568 13.431 30 30 30h214c16.569 0 30-13.432 30-30v-15-26-122zm177 128h-80c-8.284 0-15-6.716-15-15s6.716-15 15-15h80c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-80c-8.284 0-15-6.716-15-15s6.716-15 15-15h80c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>
                                        <path d="m436.5 129h-361c-41.355 0-75 33.645-75 75v120c0 41.355 33.645 75 75 75h13v-80h-9c-8.284 0-15-6.716-15-15s6.716-15 15-15h24 304 24c8.284 0 15 6.716 15 15s-6.716 15-15 15h-9v80h14c41.355 0 75-33.645 75-75v-120c0-41.355-33.645-75-75-75zm-309 94h-48c-8.284 0-15-6.716-15-15s6.716-15 15-15h48c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>
                                    </g>
                                </svg>
                            </button>
                            <button formaction="/receipt/{{$element->receipt_ID}}">
                                <svg style="width: 18px; height: 18px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g id="_44_Visibility" data-name="44 Visibility">
                                        <path d="m16 13c-4 0-4 6 0 6s4-6 0-6z"/>
                                        <path d="m29 14.214c-3.312-4.585-8.051-7.214-13-7.214s-9.688 2.629-13 7.214a3.043 3.043 0 0 0 0 3.572c3.312 4.585 8.051 7.214 13 7.214s9.688-2.629 13-7.214a3.043 3.043 0 0 0 0-3.572zm-13 6.786c-6.6 0-6.6-10 0-10 6.526 0 6.807 10 0 10z"/>
                                    </g>
                                </svg>
                            </button>
                            <button formaction="/receipt/delete/{{$element->receipt_ID}}">
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

    <template id="generate-icon">
        <svg style="width: 18px; height: 18px;" height="512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path d="m422.5 99v-24c0-41.355-33.645-75-75-75h-184c-41.355 0-75 33.645-75 75v24z"/>
                <path d="m118.5 319v122 26 15c0 16.568 13.431 30 30 30h214c16.569 0 30-13.432 30-30v-15-26-122zm177 128h-80c-8.284 0-15-6.716-15-15s6.716-15 15-15h80c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-80c-8.284 0-15-6.716-15-15s6.716-15 15-15h80c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>
                <path d="m436.5 129h-361c-41.355 0-75 33.645-75 75v120c0 41.355 33.645 75 75 75h13v-80h-9c-8.284 0-15-6.716-15-15s6.716-15 15-15h24 304 24c8.284 0 15 6.716 15 15s-6.716 15-15 15h-9v80h14c41.355 0 75-33.645 75-75v-120c0-41.355-33.645-75-75-75zm-309 94h-48c-8.284 0-15-6.716-15-15s6.716-15 15-15h48c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>
            </g>
        </svg>
    </template>
    <template id="view-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g id="_44_Visibility" data-name="44 Visibility">
                <path d="m16 13c-4 0-4 6 0 6s4-6 0-6z"/>
                <path d="m29 14.214c-3.312-4.585-8.051-7.214-13-7.214s-9.688 2.629-13 7.214a3.043 3.043 0 0 0 0 3.572c3.312 4.585 8.051 7.214 13 7.214s9.688-2.629 13-7.214a3.043 3.043 0 0 0 0-3.572zm-13 6.786c-6.6 0-6.6-10 0-10 6.526 0 6.807 10 0 10z"/>
                </g>
            </svg>
    </template>
    <template id="bin-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
            <path d="m25 5h-6.1a5 5 0 0 0 -9.8 0h-6.1a1 1 0 0 0 0 2h1v15.331a4.675 4.675 0 0 0 4.67 4.669h10.66a4.675 4.675 0 0 0 4.67-4.669v-15.331h1a1 1 0 0 0 0-2zm-11-2a3.006 3.006 0 0 1 2.829 2h-5.658a3.006 3.006 0 0 1 2.829-2zm-2 17a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0zm6 0a1 1 0 0 1 -2 0v-8a1 1 0 0 1 2 0z"/>
        </svg>
    </template>

    <script src="{{asset('/js/receipts/search.js')}}"></script>

</body>
</html>
