<?php

namespace App\Http\Controllers;

use App\Actions\Email\GetAllEmailAction;
use App\Http\Requests\Email\CreateEmailRequest;
use App\Http\Requests\Email\SendEmailRequest;
use App\UseCases\Email\CreateEmailUseCase;
use App\UseCases\Email\SendEmailUseCase;
use DomainException;
use Exception;
use Illuminate\Http\JsonResponse;
use PDOException;

class EmailController extends Controller
{
    public function getAll(): JsonResponse
    {
        try {
            return response()->json([
                'sucess' => true,
                'data' => (new GetAllEmailAction())->handle()
                ],
                200);
        } catch(DomainException $domainException) {
            return response()->json(['message' => $domainException], 400);
        } catch (Exception $exception) {
            return response()->json(['sucess' => false, 'message' => $exception], 500);
        }
    }

    public function store(CreateEmailRequest $request): JsonResponse
    {
        try {

            return response()->json([
                'sucess' => true,
                'data' => (new CreateEmailUseCase())->handle($request->all())
                ],
                201);
        } catch(DomainException $domainException) {
            return response()->json(['message' => $domainException], 400);
        } catch (PDOException $PDOException) {
            return response()->json(['sucess' => false, 'message' => $PDOException->getMessage()], 400);
        }catch (Exception $exception) {
            return response()->json(['sucess' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    public function sendEmail(SendEmailRequest $request): JsonResponse
    {
        try {
            return response()->json([
                'sucess' => true,
                'data' => (new SendEmailUseCase())->handle($request->id)
            ],
                202);
        } catch (PDOException $PDOException) {
            return response()->json(['sucess' => false, 'message' => $PDOException->getMessage()], 400);
        }catch (Exception $exception) {
            return response()->json(['sucess' => false, 'message' => $exception->getMessage()], 500);
        }
    }
}
