<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
    <h1 class="pb-3 border-bottom">
        <?php if($router['method'] === 'edit') {echo "Edit user";}
                if($router['method'] === 'add') {echo "Add user";}
        ?>
    </h1>
    <section class="mt-5">
        <form class="row g-3" method="post" action=<?=$router['method']?>>
            <div class="col-md-6">
                <label class="form-label">First name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Second name</label>
                <input type="text" class="form-control" name="second_name" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email (login)</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone">
            </div>
            <div class="col-md-4">
                <label class="form-label">Workplace</label>
                <input type="text" class="form-control" name="workplace">
            </div>
            <div class="col-md-8">
                <label class="form-label">Note</label>
                <input type="text" class="form-control" name="note">
            </div>
            <div class="col-md-4">
                <label class="form-label">Admin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin" value="1">
                    <label class="form-check-label">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin" value="0" checked>
                    <label class="form-check-label">
                        No
                    </label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </section>
</main>