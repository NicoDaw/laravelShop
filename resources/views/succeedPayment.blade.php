<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('productos') }}";
    }, 3000);
</script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center"
                style="display: flex; justify-content: center; flex-direction: column; align-items: center  ">
                <i class="fa fa-check-circle text-success" style="color: green; font-size: 20em"></i>
                <h2>El pago ha sido satisfactorio</h2>
                <h5>Será redirigido en breves</h5>
            </div>
        </div>
    </div>
</body>

</html>
