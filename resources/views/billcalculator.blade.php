<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <title>Laravel</title>
        <script src="{{URL::asset('Jquery/jquery.min.js')}}"></script>
    </head>
    <body class="antialiased">

    <div class="container">
        <div class="row">
        <h1>Bill calculator </h1>
        <form id="calculateBillForm" action="{{url('calculateBill')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="">Select City</label>
                @if(isset($cities) && count($cities))
                <select name="city_id" required id="city_id">
                    <option value="">-- Select City--</option>
                    @foreach($cities as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
                @endif
            </div>
            <div class="form-group">
                <label for="">Unit</label>
                <input type="text" onkeypress="return restrictAlphabets(event);" required name="unit" id="unit">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <h2>Total Bill :: <span class="billAmt"></span></h2>
        </div>
    </div>

        <script>
            $('#calculateBillForm').submit(function(e){
                e.preventDefault();
                let city_id = $('#city_id').val();
                let unit = $('#unit').val();
                if(city_id && unit){
                    $.ajax({
                        type: "POST",
                        url: "{{url('calculateBill')}}",
                        data: {'city_id': city_id, 'unit': unit,"_token": "{{ csrf_token() }}"},
                        beforeSend: function () {
                            $('.billAmt').html(`Loading...`);
                        },
                        success: function(response){
                            $('.billAmt').html(`RS. ${response}`);
                        }
                    });
                }
            });
            function restrictAlphabets(e){
                var x=e.which||e.keycode; 
                if((x>=48 && x<=57) || x==8)
                    return true;
                else
                    return false;
            }
        </script>
    </body>
</html>
