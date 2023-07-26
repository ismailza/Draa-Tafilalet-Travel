<?php session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); ?>
<header id="header" class="header-main">
  <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="index.php">Drâa Tafilalet</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="page-scroll" href="index">Accueil</a></li>
          <li><a class="page-scroll" href="destinations">Destinations</a></li>
          <li><a class="page-scroll" href="restaurants">Restaurants</a></li>
          <li><a class="page-scroll" href="hotels">Hôtels</a></li>                     
          <li><a class="page-scroll" href="contact">Contact</a></li>
          <?php if(isset($_SESSION['auth'])): ?>
          <li class="dropdown_signin">
            <a class="page-scroll" href="account" data-bs-toggle="dropdown" ><i class="mdi mdi-account"></i>&nbsp; <?= $_SESSION['auth']->nom_client; ?></a>
            <div class="dropdown-content_signin">
              <a href="account"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>&nbsp; Mon Profil</a><br>
              <a href="reservations"><i class="dropdown-item-icon mdi mdi-checkbook text-primary me-2"></i>&nbsp; Mes Réservations</a><br>
              <a href="../Controllers/scripts/logout.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>&nbsp; Déconnection</a>
            </div>
          </li>
          <?php else: ?>
          <li><a class="page-scroll" href="signform">Se connecter</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>