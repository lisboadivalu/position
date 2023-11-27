<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\UseCases\User\CreateUserUseCase;
use Exception;
use Illuminate\Http\JsonResponse;
use PDOException;

class UserController extends Controller
{
    public function store(StoreUserRequest $request): JsonResponse
    {
        try {
            return response()->json([
                'sucess' => true,
                'data' => (new CreateUserUseCase())->handle($request->all())
            ],
                201);
        } catch (PDOException $PDOException) {
            return response()->json(['sucess' => false, 'message' => $PDOException->getMessage()], 400);
        } catch (Exception $exception) {
            return response()->json(['sucess' => false, 'message' => $exception->getMessage()], 400);
        }
    }
}
