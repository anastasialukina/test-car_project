<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ApiReleaseCarRequest;
use App\Http\Requests\Api\ApiRentCarRequest;
use App\Http\Resources\RentCarResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;

class ApiRentCarController extends Controller
{
    public function rentCar(ApiRentCarRequest $request): RentCarResource
    {
        $validated = $request->validated();

        $user = User::find($validated['user_id']);
        $car = Car::find($validated['car_id']);

        DB::beginTransaction();

        $user->cars()->sync([$car->id]);
        $car->users()->sync([$user->id]);

        DB::commit();

        return new RentCarResource($user);
    }

    public function releaseCar(ApiReleaseCarRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (!empty($validated['user_id'])) {
            $user = User::find($validated['user_id']);
            $user->cars()->sync([]);

            return new JsonResponse([
                'message' => "User $user->id successfully detached from the car",
            ]);
        } else {
            $car = Car::find($validated['car_id']);
            $car->users()->sync([]);

            return new JsonResponse([
                'message' => "Car $car->id successfully detached from the user",
            ]);
        }
    }

    public function rents()
    {
        return RentCarResource::collection(User::has('cars')->get());
    }
}
