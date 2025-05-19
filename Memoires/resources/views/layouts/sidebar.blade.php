<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="#">
            <div class="logo-img">
                {{-- <img src="{{asset('assets/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite"> --}}
            </div>
            <span class="text">JoFa</span>
        </a>
        <button type="button" class="nav-toggle">
            <i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i>
        </button>
        <button id="sidebarClose" class="nav-close">
            <i class="ik ik-x"></i>
        </button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            @switch(auth()->user()->role->libRole)
            
            {{-- ============================ ADMINISTRATEUR ============================ --}}
            @case("Administrateur")
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Administrateur</div>

                    <div class="nav-item active">
                        <a href="#">
                            <i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span>
                        </a>
                    </div> 

                    <div class="nav-item">
                        <a href="{{route('list_user')}}">
                            <i class="ik ik-users"></i><span>Gestion des utilisateurs</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{route('list_prestataire')}}">
                            <i class="fa-solid fa-building me-2"></i><span>Prestataires</span>
                        </a>
                    </div>

                    <div class="nav-item has-sub">
                        <a href="#">
                            <i class="ik ik-settings"></i><span>Paramètres du système</span>
                        </a>
                        <div class="submenu-content">
                            <a href="#" class="menu-item"><i class="fa-solid fa-puzzle-piece me-2"></i>Programmes</a>
                            <a href="#" class="menu-item"><i class="fa-solid fa-building me-2"></i>Structures</a>
                            <a href="#" class="menu-item"><i class="fa-solid fa-folder-tree me-2"></i>Catégories</a>
                            <a href="#" class="menu-item"><i class="fa-solid fa-list-ol me-2"></i>Étapes</a>
                            <a href="{{route('list_activite')}}" class="menu-item"><i class="fa-solid fa-clipboard-list me-2"></i>Activités</a>
                        </div>
                    </div>

                    <div class="nav-item active">
                        <a href="#">
                            <i class="ik ik-bell"></i><span>Notifications</span>
                        </a>
                    </div> 
                </nav>
            @break

            {{-- ============================ RESPONSABLE ============================ --}}
            @case("Responsable")
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Responsable</div>

                    <div class="nav-item active">
                        <a href="#">
                            <i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span>
                        </a>
                    </div> 

                    <div class="nav-item">
                        <a href="{{route('add_projet')}}">
                            <i class="ik ik-folder-plus"></i><span>Création de projet</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="{{route('list_projet')}}">
                            <i class="ik ik-list"></i><span>Liste des projets créés</span>
                        </a>
                    </div> 

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-layers"></i><span>Mes projets</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-bell"></i><span>Notifications</span>
                        </a>
                    </div> 
                </nav>
            @break

            {{-- ============================ DIRECTEUR ============================ --}}
            @case("Directeur")
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">DSI</div>

                    <div class="nav-item active">
                        <a href="#">
                            <i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span>
                        </a>
                    </div> 

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-user-check"></i><span>Affectation des chefs de projets</span>
                        </a>
                    </div>

                    <div class="nav-item has-sub">
                        <a href="#">
                            <i class="ik ik-clipboard"></i><span>Suivi général des projets</span>
                        </a>
                        <div class="submenu-content">
                            <a href="#" class="menu-item"><i class="fa-solid fa-spinner me-2"></i>Projets en cours</a>
                            <a href="{{route('list_projet_n_affect')}}" class="menu-item"><i class="fa-solid fa-check-circle me-2"></i> Projets non affectés</a>
                            <a href="#" class="menu-item"><i class="fa-solid fa-question-circle me-2"></i>Projets terminés</a>
                            <a href="#" class="menu-item"><i class="fa-solid fa-ban me-2"></i>Projets abandonnés</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-bell"></i><span>Notifications</span>
                        </a>
                    </div> 
                </nav>
            @break

            {{-- ============================ CHEF DE PROJET ============================ --}}
            @case("ChefProjet")
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Chef de projets</div>

                    <div class="nav-item active">
                        <a href="#">
                            <i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span>
                        </a>
                    </div> 

                    <div class="nav-item">
                        <a href="{{ route('projets_parchef', ['id' => auth()->user()->id]) }}">
                            <i class="ik ik-folder"></i><span>Mes projets</span>
                        </a>                        
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-calendar"></i><span>Planification des activités</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-check-square"></i><span>Suivi d'exécution</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-file-text"></i><span>Rapports d'avancement</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-paperclip"></i><span>Commentaires et pièces jointes</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <i class="ik ik-bell"></i><span>Notifications</span>
                        </a>
                    </div> 
                </nav>      
            @break

            @default
                <p>Rôle non défini</p>
            @endswitch
        </div>
    </div>
</div>
