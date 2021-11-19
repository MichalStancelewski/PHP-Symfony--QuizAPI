<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetRandomQuestionController extends AbstractController
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;

    }

    public function __invoke(): array
    {
        $allQuestions = $this->questionRepository->findAll();
        $oneRandomQuestion = [$allQuestions[array_rand($allQuestions,1)] ];
        return $oneRandomQuestion;
    }

}
