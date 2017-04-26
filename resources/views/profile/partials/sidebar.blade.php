<div class="profile-container">
    <img class="profile" src="{{ $user->getGravatar() }}" alt=""/>
    <h1 class="name">{{ $user->getFullName() }}</h1>
    <p>
        {{ $user->sex() . ', ' . $user->age() }}<br>
        @if($user->isProfileCompleted())
            {{ $user->weight() }}<br>
        @endif
        @if($user->hasMultipleMeasurements())
            {!! $user->weightBalance() !!}
        @endif
    </p>
    <h3 class="tagline">{!! $user->getMembershipTime()  !!}</h3>
</div><!--//profile-container-->

<div class="contact-container container-block">
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