<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
    <h1 class="pb-3 border-bottom">
        <?= $formTitle ?>
    </h1>
    <section class="mt-5">
        <form 
            class="row g-3 needs-validation"
            id="<?= $formId ?>"
            method="post" 
            action=<?= $formAction ?>
            novalidate>
            <div class="col-md-6">
                <label class="form-label">First name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="first_name"
                    value="<?= $user['first_name']?>"
                    required
                >
                <div class="valid-feedback">
                    First name is valid.
                </div>
                <div class="invalid-feedback">
                    First name is not valid. Can´t be empty.
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Second name</label>
                <input
                    type="text"
                    class="form-control"
                    name="second_name"
                    value="<?= $user['second_name']?>"
                    required
                >
                <div class="valid-feedback">
                    Second name is valid.
                </div>
                <div class="invalid-feedback">
                    Second name is not valid. Can´t be empty.
                </div>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email (login)</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="<?= $user['email']?>"
                    required
                >
                <div class="valid-feedback">
                    Email is valid.
                </div>
                <div class="invalid-feedback">
                    Email is not valid.
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Phone</label>
                <input
                    type="tel"
                    class="form-control"
                    name="phone"
                    value="<?= $user['phone']?>"
                    pattern="^\+?[0-9\s]{9,15}$"
                >
                <div class="valid-feedback">
                    Phone number is valid.
                </div>
                <div class="invalid-feedback">
                    Phone number is not valid. Must be 9 to 15 digits.
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Workplace</label>
                <input
                    type="text"
                    class="form-control"
                    name="workplace"
                    value="<?= $user['workplace']?>"
                >
            </div>
            <div class="col-md-8">
                <label class="form-label">Note</label>
                <input 
                    type="text"
                    class="form-control"
                    name="note"
                    value="<?= $user['note']?>"
                >
            </div>
            <div class="col-md-4">
                <label class="form-label">Admin</label>
                <div class="form-check">
                    <input 
                        class="form-check-input"
                        type="radio"
                        name="admin"
                        value="1"
                        <?php
                            if ($user['admin'] == 1)
                            {
                                echo("checked");
                            }
                        ?>
                    >
                    <label class="form-check-label">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input 
                        class="form-check-input"
                        type="radio"
                        name="admin"
                        value="0"
                        <?php
                            if ($user['admin'] == 0)
                            {
                                echo("checked");
                            }
                            else echo("checked");
                        ?>
                    >
                    <label class="form-check-label">
                        No
                    </label>
                </div>
            </div>
            <div class="col-12 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= BASE_URL ?>/users" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </section>

</main>