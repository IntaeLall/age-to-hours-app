<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSubmission;
use App\Http\Resources\UserSubmissionResource;
use App\Http\Requests\UserSubmissionFormRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class UserSubmissionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        $userSubmissions = UserSubmission::paginate(10);
        return UserSubmissionResource::collection($userSubmissions);
    }

    /**
     * Store a new user submission.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserSubmissionFormRequest $request): JsonResponse
    {
        UserSubmission::create(
            [
                'name' => $request->name,
                'birthday' => $request->birthday
            ]
        );
        return response()->json(UserSubmission::latest('created_at')->first(), 200);

    }
}
