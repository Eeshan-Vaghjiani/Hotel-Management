<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{-- Sidebar --}}
                <div class="list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">Users</a>
                    <a href="{{ route('admin.settings') }}" class="list-group-item list-group-item-action">Settings</a>
                    <a href="{{ route('admin.reports') }}" class="list-group-item list-group-item-action">Reports</a>
                </div>
            </div>
            <div class="col-md-9">
                {{-- Main Content --}}
                <div class="card">
                    <div class="card-header">
                        <h1>Admin Dashboard</h1>
                    </div>
                    <div class="card-body">
                        <p>Welcome to the admin dashboard. Here you can manage users, settings, and view reports.</p>
                        {{-- Additional content can go here --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
