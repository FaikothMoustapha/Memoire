<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
               {{-- <img src="{{asset('assets/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">  --}}
            </div>
            <span class="text">JoFa</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    
    <div class="sidebar-content">
        <div class="nav-container">
            {{-- Début dashboard de l'administrateur --}}
            @switch(auth()->user()->role_id)
            @case(1)
                <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">administrateur</div>
                <div class="nav-item active">
                    <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                </div> 
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Gestion des utilisateurs</span> </a>
                    <div class="submenu-content">
                        <a href="pages/charts-chartist.html" class="menu-item active">Listes des utilisateurs</a>
                        
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Parametres du systèmes</span> </a>
                    <div class="submenu-content">
                        <a href="pages/charts-chartist.html" class="menu-item active">Programmes</a>
                        <a href="pages/charts-chartist.html" class="menu-item active">Structures</a>
                        <a href="pages/charts-chartist.html" class="menu-item active">catégories</a>
                        <a href="pages/charts-chartist.html" class="menu-item active">Activités</a>
                        <a href="pages/charts-chartist.html" class="menu-item active">Etapes</a>
                    </div>
                    
                </div>
                <div class="nav-item active">
                    <a href="index.html"><i class="ik ik-bell"></i><span>Notifications</span></a>
                </div> 
                </nav>
            @break
        {{-- Fin dashboard de l'administrateur --}}

        {{-- Début dashboard du responsable --}}
        
            @case(2)
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Responsable </div>
                    <div class="nav-item active">
                        <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                    </div> 
                    <div class="nav-item active">
                        <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Création de projet</span></a>
                    </div>
                    <div class="nav-item active">
                        <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Liste des projets créer </span></a>
                    </div> 
                    <div class="nav-item active">
                        <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Mes projets</span></a>
                    </div>
                    <div class="nav-item active">
                        <a href="index.html"><i class="ik ik-bell"></i><span>Notifications</span></a>
                    </div> 
                </nav>
            @break
            {{-- Fin dashboard du responsable --}}

            {{-- Début dashboard du directeur --}}
            
                @case(3)
                    <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-lavel">DSI</div>
                        <div class="nav-item active">
                            <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                        </div> 
                        <div class="nav-item has-sub">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Affectation des chefs de projets </span> </a>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Suivi général des projets</span> </a>
                            <div class="submenu-content">
                                <a href="pages/charts-chartist.html" class="menu-item active">projets en cours</a>
                                <a href="pages/charts-chartist.html" class="menu-item active">projets non affectés</a>
                                <a href="pages/charts-chartist.html" class="menu-item active">Projets terminés</a>
                                <a href="pages/charts-chartist.html" class="menu-item active">Projets abandonnés</a>
                            </div>
                        </div>
                        <div class="nav-item active">
                            <a href="index.html"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div> 
                    </nav>
                @break
            {{-- Fin dashboard du directeur --}}
            
            
            {{-- Début dashboard du chef de projet --}}
            
            @case(4)
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Chef de projets</div>
                <div class="nav-item active">
                    <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                </div> 
                <div class="nav-item active">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Mes projets</span> </a>
                </div>
                <div class="nav-item active">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Planification des activités</span> </a>
                </div>
                <div class="nav-item active">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Suivi d'exécution</span> </a>
                </div>
                <div class="nav-item active">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Rapports d'avancements</span> </a>
                </div>
                <div class="nav-item active">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Commentaires et pièces jointes</span> </a>
                </div>
                <div class="nav-item active">
                    <a href="index.html"><i class="ik ik-bell"></i><span>Notifications</span></a>
                </div> 
        </nav>      
         @break
      {{-- Fin dashboard du chef de projet --}}

         @default
                
        @endswitch
         
        </div>
    </div>
</div>