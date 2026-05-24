<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$users = App\Models\User::all();
foreach ($users as $user) {
    echo sprintf("%d|%s|%s|%d|%s\n", $user->id, bin2hex($user->role), trim($user->role), strlen($user->role), $user->role);
}
