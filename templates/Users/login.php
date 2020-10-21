<header>
    <p class="lead" style="font-weight:400;text-align:center;">
        Log in
    </p>
</header>
<main class="main" style="display:flex;justify-content:center">
    <div class="card" style=" width: 50%; border: .5px solid #000; padding: 1em; box-shadow: -1px 6px 5px 0px rgba(0,0,0,0.75)">
        <div class="card-body">
            <?= $this->Flash->render('auth'); ?>
            <?= $this->Form->create(); ?>
            <div class="form-group">
                <label for="email">Enter your E-Mail</label>
                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Enter your E-Mail', 'label' => false, 'required' => true, 'name' => 'email']) ?>
            </div>
            <div class="form-group">
                <label for="email">Enter your Password</label>
                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Enter your Password', 'label' => false, 'required' => true, 'type' => 'password', 'name' => 'password']) ?>
            </div>
            <?= $this->Form->submit('Log in', ['class' => 'btn btn-secondary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</main>