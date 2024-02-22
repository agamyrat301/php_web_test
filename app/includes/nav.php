<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">List Item1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List Item2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List Item2</a>
                </li>

            </ul>

            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= User::getDisplayName() ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="/auth/logout" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>
            </ul>

        </div>
    </div>
</nav>