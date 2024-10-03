<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="?page=Acceuil">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Accueil
                            </a>
                            <a class="nav-link" href="?page=listeOffre" <?=!(empty($_SESSION)) && ($_SESSION['user']['nomProfil']=="RH") ? "hidden" : "" ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                               Liste des offres
                            </a>
                            
                            <a class="nav-link" href="?page=listeCandidat" <?=!(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tableau de Bord
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                             aria-expanded="false" aria-controls="collapseLayouts"  <?=!(empty($_SESSION)) && 
                             ($_SESSION['user']['nomProfil']=="RH") ||  !(empty($_SESSION)) && 
                             ($_SESSION['user']['nomProfil']=="admin") ? "" : "hidden" ?> >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Parametrage
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?page=gestionOffre" <?=!(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?>>
                                        Gestion des offres</a>
                                    <a class="nav-link" href="?page=gestionProfil"  <?=!(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="admin" ? "" : "hidden" ?>>
                                        Gestion des profil</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="?page=gestionEmployes"  <?=!(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?> >
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Gestion des employes
                            </a>
                            <a class="nav-link" href="?page=mesCandidature"
                            <?=!(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="Candidat" ? "" : "hidden" ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Mes candidatures
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">