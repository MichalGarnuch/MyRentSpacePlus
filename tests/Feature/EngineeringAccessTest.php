<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class EngineeringAccessTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['app.key'=>'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=']); // Test-only key.
        $this->withoutVite();
    }

    public function test_guest_and_non_admin_cannot_reach_rental_data(): void
    {
        $this->get('/apartments')->assertRedirect('/login');
        $tenant = new User(['name'=>'Tenant', 'role'=>'tenant']); $tenant->id=10;
        $this->actingAs($tenant)->get('/apartments')->assertForbidden();
        $this->actingAs($tenant)->post('/apartments', [])->assertForbidden();
    }
    public function test_admin_gate_and_existing_resource_routes_are_registered(): void
    {
        $admin = new User(['name'=>'Admin', 'role'=>'admin']); $admin->id=11;
        $this->assertTrue(Gate::forUser($admin)->allows('manage-rentals'));
        foreach (['apartments','rental_agreements','media_usages','maintenance_requests','users'] as $resource) {
            $this->assertTrue(Route::has($resource.'.index'));
            $middleware = Route::getRoutes()->getByName($resource.'.store')->gatherMiddleware();
            $this->assertContains('auth', $middleware);
            $this->assertContains('can:manage-rentals', $middleware);
        }
        $this->assertFalse(Route::has('commission_logs.show'));
        $this->assertTrue(Route::has('log_entries.index'));
        $this->assertFalse(Route::has('log_entries.destroy'));
    }
}
