<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Encode / Decode</title>
  </head>
  <body>

    <form method="POST">
    @csrf   
        <div class="m-3">
            <label for="stringtest" class="form-label">String here</label>
            <textarea class="form-control" name="stringtest" id="stringtest" cols="30" rows="10"></textarea>
        </div>

        {!! Form::submit( 'encryption', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'encryption']) !!}
        {!! Form::submit( 'decryption', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'decryption']) !!}

    </form>

    @if($data)
    <div class="mt-5" style="background-color: #e9ecef;">
        <div class="">
            <div class="">
                <pre>
                    {{ $data }}
                </pre>
            </div>
        </div>
    </div>
    @endif

  </body>
</html>