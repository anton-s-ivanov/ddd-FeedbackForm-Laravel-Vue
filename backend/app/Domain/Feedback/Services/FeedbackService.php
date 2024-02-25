<?php

namespace App\Domain\Feedback\Services;

use App\Domain\Feedback\Entities\Feedback;
use App\Domain\Feedback\Repositories\FeedbackRepositoryFactory;

class FeedbackService 
{
    protected $repositoryFactory;

    public function __construct(FeedbackRepositoryFactory $repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }
    
    public function submitFeedback(array $data): void
    {
        $feedbackStorageTypes = config('app.feedbackStorageTypes');
        
        foreach($feedbackStorageTypes as $type=>$repository) {
            $repository = $this->repositoryFactory->make($type);
            $repository->save($data);
        }
    }
}
