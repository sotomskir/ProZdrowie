<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-universal-access"></i>Twoje ostatnie pomiary:</h2>
    <div class="summary">
        <ul>
            <li>Wzrost: {{ $user->height() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->heightBalance() !!})</li>
                @endif
            <li>Waga: {{ $user->weight() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->weightBalance() !!})</li>
                @endif
            <li>Klatka piersiowa: {{ $user->chest() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->chestBalance() !!})</li>
                @endif
            <li>Talia: {{ $user->waist() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->waistBalance() !!})</li>
                @endif
            <li>Biodra: {{ $user->hips() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->hipsBalance() !!})</li>
                @endif
            <li>Biceps: {{ $user->biceps() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->bicepsBalance() !!})</li>
                @endif
            <li>Udo: {{ $user->thigh() }}
                @if($user->hasMultipleMeasurements())
                    ({!! $user->thighBalance() !!})</li>
                @endif
        </ul>
    </div><!--//summary-->
</section><!--//section-->

<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-hourglass-o"></i>WHR (Waist to Hip Ratio)</h2>
    <div class="summary">
        <p class="alert {{ $user->whrAlert() }}">WHR: {{ $user->whr() }} - <b>{{ $user->obesityType() }}</b></p>
        <p>
            WHR (Waist to Hip Ratio) - czyli Stosunek Obwodu Talii Do Obwodu Bioder jest stosowany do określenia rodzaju otyłości i rozmieszczenia tkanki tłuszczowej. Otyłość ogólnie dzielimy na dwa główne typy:
            <ul>
                <li>typu jabłkowego (otyłość brzuszna, wisceralna, androidalna)- spotykana częściej u mężczyzn i kobiet po menopauzie. Znacznie groźniejsza dla zdrowia, gdyż zwiększa się ryzyko wielu chorób, m.in. chorób układu krążenia, nadciśnienia i cukrzycy typu II,</li>
                <li>typu gruszkowego (otyłość pośladkowo-udowa, obwodowa, ginoidalna) spotykana częściej u kobiet, z nagromadzeniem tkanki tłuszczowej w okolicy bioder i ud, mniej ryzykowna jeśli chodzi o ryzyko chorób.</li>
            </ul>
            Różnice częstości występowania powyższych typów otyłości, w zależności od płci, wynikają z różnego rozmieszczenia tkanki tłuszczowej uwarunkowanego czynnikami hormonalnymi i genetycznymi. Wskaźnik WHR nie jest adekwatny u kobiet w ciąży i dla osób z prawidłowym BMI.
        </p>
    </div><!--//summary-->
</section><!--//section-->

<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-heart"></i>BMI (Body Mass Index)</h2>
    <div class="summary">
        <p class="alert {{ $user->bmiAlert() }}">Twoje BMI według ostatniego pomiaru: <b>{{ $user->bmi() }}
                ({{ $user->bmiDescription() }})</b></p>
        <p>
            <b>Wskaźnik masy ciała</b> (ang. Body Mass Index (BMI); również: wskaźnik Queteleta II) –
            współczynnik powstały przez podzielenie masy ciała podanej w kilogramach przez kwadrat wysokości
            podanej w metrach. Klasyfikacja (zakres wartości) wskaźnika BMI została opracowana wyłącznie dla
            dorosłych i nie może być stosowana u dzieci. Dla oceny prawidłowego rozwoju dziecka wykorzystuje
            się siatki centylowe, które powinny być dostosowane dla danej populacji.
        </p>
        <p>Oznaczanie wskaźnika masy ciała ma znaczenie w ocenie zagrożenia chorobami związanymi z nadwagą i
            otyłością, np. cukrzycą, chorobą niedokrwienną serca, miażdżycą. Podwyższona wartość BMI
            związana jest ze zwiększonym ryzykiem wystąpienia takich chorób.</p>
    </div><!--//summary-->
</section><!--//section-->

<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-cube"></i>PPM</h2>
    <div class="summary">
        <p class="alert {{ $user->ppmAlert() }}">Twoje PPM według ostatniego pomiaru: <b>{{ $user->ppm() }}</b></p>
        <p>
        <p>
            Podstawowa przemiana materii (PPM) (ang. Basal metabolic rate) – najmniejsze tempo przemiany materii, zachodzącej w organizmie człowieka, niezbędne do podtrzymania podstawowych funkcji życiowych, znajdującego się w stanie czuwania, w warunkach zupełnego spokoju fizycznego i psychicznego, komfortu cieplnego, który na 12 godzin przed badaniem nie spożywał żadnych posiłków, po 3 dniach diety bezbiałkowej i po co najmniej 8 godzinach snu.
        </p>
        <p>W zależności od wieku oraz stylu życia podstawowa przemiana materii pochłania od 45% do 70% dziennego zapotrzebowania energetycznego człowieka.</p>
    </div><!--//summary-->
</section><!--//section-->

<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-cubes"></i>CMP</h2>
    <div class="summary">
        <p class="alert {{ $user->cmpAlert() }}">Twoje CMP według ostatniego pomiaru: <b>{{ $user->cmp() }}</b></p>
        <p>
        <p>Całkowita przemiana materii (CPM) – suma wszystkich wydatków energetycznych człowieka, które ponosi podczas aktywności fizycznej.</p>
    </div><!--//summary-->
</section><!--//section-->