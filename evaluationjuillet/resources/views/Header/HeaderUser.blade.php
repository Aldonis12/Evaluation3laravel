<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
                <strong>User - Gestion</strong>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item dropdown">
                <a href="#formListe" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-list fe-16"></i>
                    <span class="ml-3 item-text">Liste</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="formListe">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/PatientActe"><span class="ml-1 item-text">Patient</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/PrixDepense"><span class="ml-1 item-text">Depense</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/AllFacture"><span class="ml-1 item-text">Facture</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-plus-circle fe-16"></i>
                    <span class="ml-3 item-text">Ajouter</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/PageAjoutPrixDepense"><span class="ml-1 item-text">Depense</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/importFile"><span class="ml-1 item-text">Importer CSV</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/logout">
                <i class="fe fe-log-out fe-16"></i>
                <span class="ml-3 item-text">Se deconnecter</span>
              </a>
            </li>
          </ul>
    </nav>
</aside>
