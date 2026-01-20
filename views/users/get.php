<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
    <h1 class="pb-3 border-bottom">Users</h1>

    <section class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Workplace</th>
                    <th>Note</th>
                    <?php if ($isAdmin): ?>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th><?= $i++ ?></th>
                        <td><?= htmlspecialchars($user['first_name']) ?></td>
                        <td><?= htmlspecialchars($user['second_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['phone']) ?></td>
                        <td><?= htmlspecialchars($user['workplace']) ?></td>
                        <td><?= htmlspecialchars($user['note']) ?></td>
                        <?php if ($isAdmin): ?>
                            <td>
                                <button class="btn btn-primary button--edit" 
                                        data-action="<?= BASE_URL ?>/users/edit/<?= urlencode($user['email']) ?>">
                                <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger button--delete" 
                                        data-action="<?= BASE_URL ?>/users/delete/<?= urlencode($user['email']) ?>">
                                <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <?php if ($isAdmin): ?>
        <div>
            <a href="<?= BASE_URL ?>/users/add" class="btn btn-primary">Add user</a>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION["action"] != ""): ?>
        <div id="notification" class="alert alert-success" role="alert">
            User succssfully <?= $_SESSION["action"] === "add" ? "added" : "edited" ?>.
        </div>
        <?php $_SESSION["action"] = ""; ?>
    <?php endif; ?>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <form class="modal-footer" id="confirmDelete"
                    method="post"
                    action="#">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
</main>