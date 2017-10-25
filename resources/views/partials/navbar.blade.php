  <nav>
    <div class="nav-wrapper">
        <div class="navbar-fixed">
        <a href="#!" class="brand-logo show-on-large">Paybobby</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse">
          <i class="fa fa-bars white-text fa-2x"></i>
        </a>

        <ul class="right hide-on-med-and-down">
            @include('partials.nav_links')
        </ul>
     </div>
        <ul class="side-nav" id="mobile-demo">
            @include('partials.nav_links')
        </ul>
    </div>
</nav>


