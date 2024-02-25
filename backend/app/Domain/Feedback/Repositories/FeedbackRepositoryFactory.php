<?php

namespace App\Domain\Feedback\Repositories;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\App;

class FeedbackRepositoryFactory 
{
    public function make(string $type)
    {
        $feedbackStorageTypes = config('app.feedbackStorageTypes');
        
        if(!$feedbackStorageTypes[$type]) {
            throw new HttpResponseException(response()->json(['errors' => ["Unsupported storage type: {$type}"]]));
        }

        return App::make($feedbackStorageTypes[$type]);
    }
}
