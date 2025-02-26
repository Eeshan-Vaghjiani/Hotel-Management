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
                    <th class="th-deg">Price</th>
                    <th class="th-deg">Wifi</th>
                    <th class="th-deg">Room Type</th>
                    <th class="th-deg">Image</th>
                    <th class="th-deg">Actions</th>
                </tr>
                @foreach ($data as $room)
                <tr>
                    <td>{{ $room->room_title }}</td>
                    <td>{!! Str::limit($room->description,200) !!}</td>
                    <td>{{ $room->price }}$</td>
                    <td>{{ $room->wifi }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td><img width ="100"src="room/{{ $room->image }}" alt="Room Image"></td>
                    <td>
                            <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                            </form>
                        </td>
                </tr>
                @endforeach

            </table>

          </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>
