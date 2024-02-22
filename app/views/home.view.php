<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Php task</a>
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
<main class="overflow-x-hidden">
    <div class="container-fluid p-3  m-3">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Simple Tables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Simple Tables</li>
                </ol>
            </div>
        </div>

    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">task</th>
                <th scope="col">title</th>
                <th scope="col">description </th>
                <th scope="col">colorCode </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $key => $val) { ?>
                <tr>
                    <th scope="row"><?= $key ?></th>
                    <td><?= $val['task'] ?></td>
                    <td><?= $val['title'] ?></td>
                    <td><?= $val['description'] ?></td>
                    <td>
                        <div style="background-color:<?= $val['colorCode'] ?>;height: 40px;width: 40px;"></div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<script>
</script>