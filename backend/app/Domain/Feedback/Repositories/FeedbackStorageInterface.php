<?php

namespace App\Domain\Feedback\Repositories;

interface FeedbackStorageInterface
{
    public function save(array $data): void;
}