@php(date_default_timezone_set('Asia/Manila'))
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
    <title>Released</title>
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
            <table data-table="released">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pretrip ID</th>
                    <th>Plate Number</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Customer Name</th>
                    <th>Return Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $element)
                    <tr>
                        <td>{{$element->released_ID}}</td>
                        <td>{{$element->pretrip_ID}}</td>
                        <td>{{$element->vehicle_plateNo}}</td>
                        <td>{{$element->vehicle_type}}</td>
                        <td>{{$element->vehicle_model}}</td>
                        <td>{{$element->customer_name}}</td>
                        <td>{{date_create($element->pretrip_dateend)->format('Y-m-d h:i:s A')}}</td>
                        <td>
                            <form method="get">
                                <button type="submit" formmethod="get" formaction=
                                    "/released/extend/{{$element->released_ID}}/{{$element->pretrip_ID}}/{{$element->vehicle_type}}/{{$element->pretrip_dateend}}">
                                    <svg style="width: 18px; height: 18px;" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="m13.8 33.3c0 10.1 8.2 18.2 18.2 18.2s18.2-8.2 18.2-18.2c0-10.1-8.1-18.3-18.2-18.3s-18.2 8.2-18.2 18.3zm16.2-1c0-3.2 0-6.4 0-9.7 0-1.1.9-2 2-2s2 1 2 2v1.4 7.7h5.8c1.1 0 2 .9 2 2s-1 2-2 2c-2.6 0-5.2 0-7.8 0-1.1 0-2-.9-2-2 0-.5 0-.9 0-1.4z"/><path d="m56.5 25.5c-3-9.5-11.4-16.3-21.2-17.7.1-.3.2-.6.2-.8 0-.8-.5-1.5-1.1-1.8-.8-.4-1.6-.2-2.3.4s-1.4 1.2-2.1 1.8c-.3.3-.7.5-.9.8s-.3.7-.3 1.1c0 .9.6 1.4 1.1 2.1.6.7 1.2 1.5 1.9 2.2 1.1 1.3 3.4.3 3.4-1.3v-.1c0-.1 0-.2 0-.3 7.1 1.1 13.4 5.6 16.6 12.2 3.6 7.5 2.4 16.9-3 23.2-5.4 6.4-14.1 9.2-22.2 7.1-8-2.1-14.1-8.7-15.7-16.7-2.1-10 3.5-20 12.6-24.2 1-.4 1.2-1.9.7-2.7-.6-1-1.7-1.2-2.7-.7-9.5 4.3-15.6 14.3-15 24.8.6 9.9 6.8 18.6 15.9 22.4 9.2 3.8 20 1.8 27.2-4.9 7.1-6.9 9.9-17.5 6.9-26.9z"/>
                                        </g>
                                    </svg>
                                </button>
                                <button type="submit" formmethod="get" formaction=
                                    "/generate/post-trip/{{$element->pretrip_ID}}">
                                    <svg style="width: 18px; height: 18px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Arrow_Outline" data-name="Arrow Outline">
                                            <path d="m19.5078 8.3394h-11.5585l1.1722-1.7419a1.5326 1.5326 0 0 0 -1.2683-2.3931h-.0032a1.67 1.67 0 0 0 -1.3042.6268l-3.6065 4.5088a.8.8 0 0 0 0 .9995l3.6069 4.5085a1.67 1.67 0 0 0 1.3042.6269h.0028a1.5326 1.5326 0 0 0 1.2683-2.393l-1.1725-1.7425h11.5588a6.728 6.728 0 1 1 0 13.456h-3.2715a1.5 1.5 0 0 0 0 3h3.2715a9.728 9.728 0 1 0 0-19.456z"/>
                                        </g>
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

    <template id="return-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g id="Arrow_Outline" data-name="Arrow Outline">
                <path d="m19.5078 8.3394h-11.5585l1.1722-1.7419a1.5326 1.5326 0 0 0 -1.2683-2.3931h-.0032a1.67 1.67 0 0 0 -1.3042.6268l-3.6065 4.5088a.8.8 0 0 0 0 .9995l3.6069 4.5085a1.67 1.67 0 0 0 1.3042.6269h.0028a1.5326 1.5326 0 0 0 1.2683-2.393l-1.1725-1.7425h11.5588a6.728 6.728 0 1 1 0 13.456h-3.2715a1.5 1.5 0 0 0 0 3h3.2715a9.728 9.728 0 1 0 0-19.456z"/>
            </g>
        </svg>
    </template>
    <template id="extend-icon">
        <svg style="width: 18px; height: 18px;" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path d="m13.8 33.3c0 10.1 8.2 18.2 18.2 18.2s18.2-8.2 18.2-18.2c0-10.1-8.1-18.3-18.2-18.3s-18.2 8.2-18.2 18.3zm16.2-1c0-3.2 0-6.4 0-9.7 0-1.1.9-2 2-2s2 1 2 2v1.4 7.7h5.8c1.1 0 2 .9 2 2s-1 2-2 2c-2.6 0-5.2 0-7.8 0-1.1 0-2-.9-2-2 0-.5 0-.9 0-1.4z"/><path d="m56.5 25.5c-3-9.5-11.4-16.3-21.2-17.7.1-.3.2-.6.2-.8 0-.8-.5-1.5-1.1-1.8-.8-.4-1.6-.2-2.3.4s-1.4 1.2-2.1 1.8c-.3.3-.7.5-.9.8s-.3.7-.3 1.1c0 .9.6 1.4 1.1 2.1.6.7 1.2 1.5 1.9 2.2 1.1 1.3 3.4.3 3.4-1.3v-.1c0-.1 0-.2 0-.3 7.1 1.1 13.4 5.6 16.6 12.2 3.6 7.5 2.4 16.9-3 23.2-5.4 6.4-14.1 9.2-22.2 7.1-8-2.1-14.1-8.7-15.7-16.7-2.1-10 3.5-20 12.6-24.2 1-.4 1.2-1.9.7-2.7-.6-1-1.7-1.2-2.7-.7-9.5 4.3-15.6 14.3-15 24.8.6 9.9 6.8 18.6 15.9 22.4 9.2 3.8 20 1.8 27.2-4.9 7.1-6.9 9.9-17.5 6.9-26.9z"/>
            </g>
        </svg>
    </template>

    <script src="{{asset('/js/vehicles/released/search.js')}}"></script>

</body>
</html>
