<section class="section summary-section">
    <div class="summary" style="height: 1000px;">
        <p class="alert alert-danger">
            <b>Brak pomiarów. Aby w pełni korzystać z serwisu dodaj pierwszy pomiar.</b>
        </p>
        <p class="text-center">
            {{--
                Linki można generować za pomocą nazwanych route:
                https://laravel.com/docs/5.4/routing#named-routes
                a samo określenie Route jako resource dodaje okresolne nazwy zgodnie z konwencją
                dlatego tutaj mam dosęp do measurements.index
                https://laravel.com/docs/5.4/controllers#resource-controllers
            --}}
            <a class="btn btn-primary" href="{{ route('measurements.create') }}">Dodaj pomiar</a>
        </p>
    </div><!--//summary-->
</section><!--//section-->