<?php require './app/includes/head.php' ?>
<style>
    #img-preview {
        display: none;
        width: 300px;
        border: 2px dashed #333;
        margin-bottom: 20px;
    }

    #img-preview img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<?php require './app/includes/nav.php' ?>
<main class="overflow-x-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row-reverse bd-highlight my-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Show Modal</button>
                </div>
                <div class="card">
                    <div class="card-header d-flex w-100 justify-content-between">
                        <h3 class="card-title">Tasks</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" id="searchBox" class="form-control float-right" onkeyup="searchFromTable()" placeholder="Search">

                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="tasksTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">task</th>
                                    <th scope="col">title</th>
                                    <th scope="col">description </th>
                                    <th scope="col">colorCode </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
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
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="img-preview"></div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select image:</label>
                        <input class="form-control" type="file" id="choose-file" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require './app/includes/bottom.php' ?>

<script>
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function() {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function() {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" />';
            });
        }
    }

    function searchFromTable() {
        input = document.getElementById("searchBox");
        filter = input.value.toUpperCase();
        table = document.getElementById("tasksTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    function loadTasks() {

        $.ajax({
            url: window.location.pathname, // Replace with the actual URL of your PHP file
            type: "GET",
            dataType: "json", // Specify the expected data type
            data: {
                query: "ajax"
            },
            success: function(response) {
                console.log(response, 'HEREEEE')
                const tableBody = document.getElementById("tableBody");
                tableBody.innerHTML = ''; // Clear existing table rows
                response.forEach((item,index) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `<td>${index}</td><td>${item.task}</td><td>${item.title}</td><td>${item.description}</td><td>     <div style="background-color:${item.colorCode};height: 40px;width: 40px;"></div></td>`;
                    tableBody.appendChild(row);
                });

            },
            error: function(xhr, status, error) {
                console.log(error)
                // Handle errors here
                console.error(xhr);
            }
        });
    }

    setInterval(loadTasks, 5000); // 5 minutes * 60 seconds * 1000 milliseconds
</script>