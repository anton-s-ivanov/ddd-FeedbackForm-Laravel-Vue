<?php

namespace App\Domain\Feedback\Repositories;

use App\Domain\Feedback\Repositories\FeedbackStorageInterface;
use Illuminate\Support\Facades\Storage;
use Monolog\Processor\UidProcessor;

class FileFeedbackRepository implements FeedbackStorageInterface
{
    public function save(array $data): void
    {
        Storage::put('feedback-'.uuid_create().'.json', json_encode($data));
    }
}