<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

#[AsController]
class GetRandomQuestionController extends AbstractController
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $randomQuestions = array();
        $numberOfQuestions = $request->get('number');
        $allQuestions = $this->questionRepository->findAll();

        if(!is_numeric($numberOfQuestions) || $numberOfQuestions <= 0){
            return new JsonResponse("ERROR. REQUESTED A PARAMETER WITH VALUE BETWEEN 1 AND " . count($allQuestions) . ".", 400);
        }
        if(count($allQuestions) < $numberOfQuestions){
            return new JsonResponse("ERROR. MAXIMUM NUMBER OF UNIQUE QUESTIONS IS: " . count($allQuestions) . ".", 400);
        }

        for ($i = 0; $i < $numberOfQuestions; $i++){
            $selectedQuestion = $allQuestions[array_rand($allQuestions)];
            if(!in_array($selectedQuestion, $randomQuestions)) {
                array_push($randomQuestions, $selectedQuestion);
            } else {
                $i--;
            }
        }

        $randomQuestions = $this->get('serializer')->serialize($randomQuestions, 'json');

        return new JsonResponse($randomQuestions, 200, [],true);
    }

}
