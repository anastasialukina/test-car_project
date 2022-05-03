<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ApiRentCarRequest;
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

        $user = User::find($validated['user_id']);
        $car = Car::find($validated['car_id']);

        DB::beginTransaction();

        $user->cars()->sync([$car->id]);
        $car->users()->sync([$user->id]);

        DB::commit();

        return new JsonResponse([
            'message' => "Car $car->id successfully attached to the user $user->id",
        ]);
    }
}
