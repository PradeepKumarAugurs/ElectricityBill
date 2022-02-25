
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        span.relative.z-0.inline-flex.shadow-sm.rounded-md {
            display: none;
        }
    </style>
</head>
<body>
    
<div class="container">
    <h1>Users List  </h1>
    <a href="{{url('adduser')}}" class="btn btn-xs btn-primary">Add New user</a>
    <a href="{{url('Billcalculate')}}" class="btn btn-xs btn-success">calculate Bill</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->mobile }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    {!! $data->links() !!}
</div>
     
</body>
</html>