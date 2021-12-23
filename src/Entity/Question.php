<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\GetRandomQuestionController;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "get_all"={
 *              "method" = "GET",
 *              "path" = "/all",
 *              "normalization_context"={
 *                  "groups"="question:list"
 *              }
 *          },
 *          "get_random"={
 *              "method" = "GET",
 *              "path" = "/random/{number}",
 *              "read" = false,
 *              "controller" = GetRandomQuestionController::class,
 *              "normalization_context"={
 *                  "groups"="question:list"
 *              }
 *          }
 *     },
 *     itemOperations={
 *          "get_by_id"={
 *              "method" = "GET",
 *              "path" = "/single/{id}",
 *              "normalization_context"={
 *                  "groups"="question:item"
 *              }
 *          }
 *     },
 *     order={
 *          "id"="DESC"
 *     },
 *     paginationEnabled=false
 *     )
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['question:list', 'question:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['question:list', 'question:item'])]
    private $questionText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answerCorrect;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answerBad1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answerBad2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answerBad3;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['question:list', 'question:item'])]
    private $difficulty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getQuestionText(): ?string
    {
        return $this->questionText;
    }

    public function setQuestionText(string $questionText): self
    {
        $this->questionText = $questionText;

        return $this;
    }

    public function getAnswerCorrect(): ?string
    {
        return $this->answerCorrect;
    }

    public function setAnswerCorrect(string $answerCorrect): self
    {
        $this->answerCorrect = $answerCorrect;

        return $this;
    }

    public function getAnswerBad1(): ?string
    {
        return $this->answerBad1;
    }

    public function setAnswerBad1(string $answerBad1): self
    {
        $this->answerBad1 = $answerBad1;

        return $this;
    }

    public function getAnswerBad2(): ?string
    {
        return $this->answerBad2;
    }

    public function setAnswerBad2(string $answerBad2): self
    {
        $this->answerBad2 = $answerBad2;

        return $this;
    }

    public function getAnswerBad3(): ?string
    {
        return $this->answerBad3;
    }

    public function setAnswerBad3(string $answerBad3): self
    {
        $this->answerBad3 = $answerBad3;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}
