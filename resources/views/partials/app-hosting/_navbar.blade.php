<!--
 Fixed Navigation
 ==================================== -->
<header id="navigation" class="navbar navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand logo" href="#body">
                <!-- <img src="/img/app-main/logo.png" alt="Website Logo" /> -->
                <img src="{{ asset('img/logo-main.png') }}" style="width:50px; height:50px;" alt="">
            </a>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav navigation-menu">
                <li><a data-scroll href="#body">Home</a></li>
                <li><a data-scroll href="#about">About Us</a></li>
                <li><a data-scroll href="#our-team">Team</a></li>
                <li><a data-scroll href="#pricing">Pricing</a></li>
            </ul>
        </nav>
        <!-- /main nav -->

    </div>
</header>
<!--
End Fixed Navigation
==================================== -->
