<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

use App\Models\Car;
use App\Models\User;

class RentCarTest extends TestCase
{
    public function test_rent_and_release_car()
    {
        $method = 'post';
        $uri = route('api.rentCar', [], false);

        $car = Car::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $structure = [
            'id',
            'name',
            'email',
            'car_id',
            'car_brand',
            'car_model',
        ];

        $response = $this->json($method, $uri, ['car_id' => $car->id, 'user_id' => $user->id]);
        $response
            ->assertOk()
            ->assertJsonStructure($structure)
            ->assertJsonPath('car_id', $car->id)
            ->assertJsonPath('id', $user->id);

        /**
         * Release a car
         */
        $uri = route('api.releaseCar', [], false);
        $response = $this->json($method, $uri, ['car_id' => $car->id]);
        $response
            ->assertOk();

        /**
         * Detach a car from specific user
         */
        $uri = route('api.releaseCar', [], false);
        $response = $this->json($method, $uri, ['user_id' => $user->id]);
        $response
            ->assertOk();
    }


    /*
     * * If we try to rent car that not exists
     */
    public function test_rent_non_exiting_car()
    {
        $method = 'post';
        $uri = route('api.rentCar', [], false);

        $user = User::inRandomOrder()->first();

        $response = $this->json($method, $uri, ['car_id' => 9999999, 'user_id' => $user->id]);
        $response
            ->assertStatus(422);
    }

    /*
     * If we try to release car that not exists
     */
    public function test_release_non_exiting_car()
    {
        $method = 'post';
        $uri = route('api.releaseCar', [], false);

        $response = $this->json($method, $uri, ['car_id' => 9999999]);
        $response
            ->assertStatus(422);
    }

    /*
     * If we try to detach user that not exists
     */
    public function test_detach_non_exiting_user()
    {
        $method = 'post';
        $uri = route('api.releaseCar', [], false);

        $response = $this->json($method, $uri, ['user_id' => 9999999]);
        $response
            ->assertStatus(422);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();

        Artisan::call('config:clear');
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:rollback');
        parent::tearDown();
    }
}
