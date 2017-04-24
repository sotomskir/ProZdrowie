@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="{{ $user->getGravatar() }}" alt=""/>
                <h1 class="name">{{ $user->getFullName() }}</h1>
                <p>
                    {{ $user->sex() . ', ' . $user->age() }}<br>
                    {{ $user->weight() }}<br>
                    {!! $user->weightBalance() !!}
                </p>
                <h3 class="tagline">{!! $user->getMembershipTime()  !!}</h3>
            </div><!--//profile-container-->

            <div class="contact-container container-block">
                {{ $user->measurmentsHistory() }}
                <ul class="list-unstyled contact-list">
                    <li class="email">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto: {{ $user->getEmail() }}">{{ $user->getEmail() }}</a>
                    </li>
                    <li>Trzeba dorobić do konta użytkownika rozszerzone dane profilowe i uzupełnić je poniżej.</li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789">0123 456 789</a></li>
                    <li class="website"><i class="fa fa-globe"></i><a
                                href="http://themes.3rdwavemedia.com/website-templates/free-responsive-website-template-for-developers/"
                                target="_blank">portfoliosite.com</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/in/alandoe</a>
                    </li>
                    <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a>
                    </li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes"
                                                                        target="_blank">@twittername</a></li>
                </ul>
            </div><!--//contact-container-->

            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <li>Climbing</li>
                    <li>Snowboarding</li>
                    <li>Cooking</li>
                </ul>
            </div><!--//interests-->

        </div><!--//sidebar-wrapper-->

        <div class="main-wrapper">

            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-heart"></i>Twoje ostatnie pomiary:</h2>
                <div class="summary">
                    <ul>
                        <li>Wzrost: {{ $user->height() }} ({!! $user->heightBalance() !!})</li>
                        <li>Waga: {{ $user->weight() }} ({!! $user->weightBalance() !!})</li>
                        <li>Klatka piersiowa: {{ $user->chest() }} ({!! $user->chestBalance() !!})</li>
                        <li>Talia: {{ $user->waist() }} ({!! $user->waistBalance() !!})</li>
                        <li>Biodra: {{ $user->hips() }} ({!! $user->hipsBalance() !!})</li>
                        <li>Biceps: {{ $user->biceps() }} ({!! $user->bicepsBalance() !!})</li>
                        <li>Udo: {{ $user->thigh() }} ({!! $user->thighBalance() !!})</li>
                    </ul>
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
                <h2 class="section-title"><i class="fa fa-user"></i>PPM</h2>
                <div class="summary">
                    <p class="alert {{ $user->ppmAlert() }}">Twoje PPM według ostatniego pomiaru: <b>{{ $user->ppm() }}</b></p>
                    <p>
                    <p>Summarise your career here lorem ipsum dolor sit amet, consectetuer adipiscing elit. You can <a
                                href="http://themes.3rdwavemedia.com/website-templates/orbit-free-resume-cv-template-for-developers/"
                                target="_blank">download this free resume/CV template here</a>. Aenean commodo ligula
                        eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</p>
                </div><!--//summary-->
            </section><!--//section-->

            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>CMP</h2>
                <div class="summary">
                    <p class="alert {{ $user->cmpAlert() }}">Twoje CMP według ostatniego pomiaru: <b>{{ $user->cmp() }}</b></p>
                    <p>
                    <p>Summarise your career here lorem ipsum dolor sit amet, consectetuer adipiscing elit. You can <a
                                href="http://themes.3rdwavemedia.com/website-templates/orbit-free-resume-cv-template-for-developers/"
                                target="_blank">download this free resume/CV template here</a>. Aenean commodo ligula
                        eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</p>
                </div><!--//summary-->
            </section><!--//section-->

            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">
                    <div class="item">
                        <h3 class="level-title">Python &amp; Django</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="98%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                    <div class="item">
                        <h3 class="level-title">Javascript &amp; jQuery</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="98%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                    <div class="item">
                        <h3 class="level-title">Angular</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="98%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                    <div class="item">
                        <h3 class="level-title">HTML5 &amp; CSS</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="95%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                    <div class="item">
                        <h3 class="level-title">Ruby on Rails</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="85%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                    <div class="item">
                        <h3 class="level-title">Sketch &amp; Photoshop</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="60%">
                            </div>
                        </div><!--//level-bar-->
                    </div><!--//item-->

                </div>
            </section><!--//skills-section-->

        </div><!--//main-body-->
    </div>

@endsection
