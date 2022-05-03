<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;

class ApiRentCarController extends Controller
{
    public function rentCar(ApiRentCarRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::with($validated['user_id'])->get();
        $car = Car::with($validated['car_id'])->get();

        DB::beginTransaction();

        $user->cars()->sync([$car->id]);
        $car->users()->sync([$user->id]);

        DB::commit();

        return new JsonResponse([
            'message' => "Car $car->id successfully attached to the user $user->id",
        ]);
    }
}
