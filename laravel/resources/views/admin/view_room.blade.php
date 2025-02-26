<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .table-deg{
            border: 2px solid white ;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }
        .th-deg{
            background-color: navy;
            padding: 15px;
        }
        tr{
            border: 3px solid white;

        }
        td{
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table class="table-deg">
                <tr>
                    <th class="th-deg">Room Title</th>
                    <th class="th-deg">Description</th>
                    <th class="th-deg">price</th>
                    <th class="th-deg">Wifi</th>
                    <th class="th-deg">Room Type</th>
                    <th class="th-deg">Image </th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->room_title }}</td>
                    <td>{!! Str::limit($data->description,200) !!}</td>
                    <td>{{ $data->price }}$</td>
                    <td>{{ $data->wifi }}</td>
                    <td>{{ $data->type }}</td>
                    <td><img width ="100"src="room/{{ $data->image }}"></td>
                </tr>
                @endforeach

            </table>

          </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>
