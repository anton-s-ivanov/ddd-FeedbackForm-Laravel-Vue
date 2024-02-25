<?php

namespace App\Domain\Feedback\Repositories;

use App\Domain\Feedback\Entities\Feedback;
use App\Domain\Feedback\Repositories\FeedbackStorageInterface;

class LocalDatabaseFeedbackRepository implements FeedbackStorageInterface
{
    public function save(array $feedback): void
    {
        // 
    }
}