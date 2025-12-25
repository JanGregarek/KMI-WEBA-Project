<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="./dashboard" class="nav-link <?= $URL === 'dashboard' ? 'active' : 'link-dark' ?>" aria-current="page">
                    <span class="icon">
                        <i class="bi bi-easel"></i>
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="<?= $URL === 'items' ? 'active' : '' ?>">
                <a href="./items" class="nav-link <?= $URL === 'items' ? 'active' : 'link-dark' ?>">
                    <span class="icon">
                        <i class="bi bi-card-list"></i>
                    </span>
                    Items
                </a>
            </li>
            <li class="<?= $URL === 'others' ? 'active' : '' ?>">
                <a href="./others" class="nav-link <?= $URL === 'others' ? 'active' : 'link-dark' ?>">
                    <span class="icon">
                        <i class="bi bi-box"></i>
                    </span>
                    Others
                </a>
            </li>
            <li class="<?= $URL === 'users' ? 'active' : '' ?>">
                <a href="./users" class="nav-link <?= $URL === 'users' ? 'active' : 'link-dark' ?>">
                    <span class="icon">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>