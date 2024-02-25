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
            $error = new \stdClass;
            $error->storageType = ["Unsupported storage type: {$type}"];
            throw new HttpResponseException(response()->json(['errors' => $error]));
        }

        return App::make($feedbackStorageTypes[$type]);
    }
}
