<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetRandomQuestionController extends AbstractController
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;

    }

    public function __invoke(Request $request): array
    {
        $requestData = json_decode($request->getContent(), true);
        $numberOfQuestions = $requestData["number"];
        $randomQuestions = array();

        $allQuestions = $this->questionRepository->findAll();

        if(count($allQuestions) < $numberOfQuestions){
            return ["ERROR. MAXIMUM NUMBER OF UNIQUE QUESTIONS IS: " . count($allQuestions)];
        }

        for ($i = 0; $i < $numberOfQuestions; $i++){
            $selectedQuestion = $allQuestions[array_rand($allQuestions)];
            if(!in_array($selectedQuestion, $randomQuestions)) {
                array_push($randomQuestions, $selectedQuestion);
            } else {
                $i--;
            }
        }
        return $randomQuestions;
    }

}
