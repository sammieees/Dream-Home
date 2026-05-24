<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$user = App\Models\User::where('role', 'staff')->first();
$request = Illuminate\Http\Request::create('/properties', 'GET');
$request->setUserResolver(function () use ($user) {
    return $user;
});
$middleware = new App\Http\Middleware\RoleMiddleware();
try {
    $middleware->handle($request, function ($req) {
        echo "PASSED\n";
    }, 'admin,staff');
} catch (Throwable $e) {
    echo get_class($e) . ': ' . $e->getMessage() . "\n";
}
