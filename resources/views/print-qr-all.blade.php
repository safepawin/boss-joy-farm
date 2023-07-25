<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media print {
            .hide-print {
                display: none
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }

        @page {
            size: A4;
            margin: 0;
        }

    </style>
</head>

<body>
    <div class="d-flex flex-wrap gap-3">
        @foreach ($urls as $item)
            <div class=" border border-dark p-2">
                <div class="visible-print text-center">
                    {!! QrCode::size(100)->generate($item['url']) !!}
                </div>
                <span class="fs-5 fw-bold">{{ session()->get('farm_name') }}</span><span> : {{ $item['name'] }}</span>
            </div>
        @endforeach
    </div>

    <button class="hide-print btn btn-primary" style="margin-top: 10px" onclick="print()">ปริ้น</button>

    <script>
        // function print() {
        //     window.print()
        // }
    </script>
</body>

</html>
