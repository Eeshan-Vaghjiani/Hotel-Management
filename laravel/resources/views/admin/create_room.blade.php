<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
        .div-deg{
            padding-top: 30px;
        }
        .div-center{
            text-align: center;
            padding-top: 40px;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="div-center">
                <h1 style="font-size: 30px; font-weight: bold;">ADD ROOMS </h1>
                <form action="{{ url('add_room') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="div-deg">
                        <label>Room Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div-deg">
                        <label>Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div-deg">
                        <label>Price</label>
                        <input type="number" name="price">
                    </div>
                    <div class="div-deg">
                        <label>Room Type</label>
                        <select name="type">
                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                    <div class="div-deg">
                        <label>Wifi</label>
                        <select name="wifi">
                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="div-deg">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-primary"type="submit" value="Add Room">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>
