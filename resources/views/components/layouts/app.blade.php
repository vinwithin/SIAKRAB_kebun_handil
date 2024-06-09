<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>{{ $title ?? 'Page Title' }}</title>
        <style>
            .org-chart {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .org-level {
                display: flex;
                justify-content: center;
                margin: 10px 0;
            }
            .org-card {
                margin: 5px;
                min-width: 200px;
            }
            .connector {
                width: 2px;
                height: 20px;
                background-color: #000;
                margin: 0 auto;
            }
            .horizontal-connector {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .horizontal-connector::before,
            .horizontal-connector::after {
                content: '';
                width: 50%;
                height: 2px;
                background-color: #000;
            }
        </style>
    </head>
    <body style="background-color: #F8F9FA">
        <div>
            @include('components/layouts/navbar')
        
        
            {{$slot}}
            @include('components/layouts/footer')

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
