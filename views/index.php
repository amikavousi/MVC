
<?php foreach ($users as $user) : ?>
<h1> Hello <?= $user->name ?> </h1>
<h3> Email: <?= $user->email ?> </h3>
<?php endforeach; ?>
