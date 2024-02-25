<?php

namespace App\Http\Controllers;

use App\Domain\Feedback\Services\FeedbackService;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request, FeedbackService $feedbackService)
    {
        $feedbackService->submitFeedback($request->validated());
        return response()->json(['message' => 'ok']);
    }
}
