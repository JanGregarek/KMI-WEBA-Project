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
                    <th>Edit</th>
                    <th>Delete</th>
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
                        <td>
                            <a href="users/edit/<?= urlencode($user['email']) ?>" 
                               class="btn btn-primary <?= !$isAdmin ? 'disabled-link' : '' ?>">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="users/delete/<?= urlencode($user['email']) ?>" 
                               class="btn btn-danger <?= !$isAdmin ? 'disabled-link' : '' ?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($isAdmin): ?>
            <a href="users/add" class="btn btn-primary">Add user</a>
        <?php endif; ?>
    </section>
</main>