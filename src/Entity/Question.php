<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="question:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="question:item"}}},
 *     order={"id"="DESC"},
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
    private $question_text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answer_correct;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answer_bad_1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answer_bad_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['question:list', 'question:item'])]
    private $answer_bad_3;

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
        return $this->question_text;
    }

    public function setQuestionText(string $question_text): self
    {
        $this->question_text = $question_text;

        return $this;
    }

    public function getAnswerCorrect(): ?string
    {
        return $this->answer_correct;
    }

    public function setAnswerCorrect(string $answer_correct): self
    {
        $this->answer_correct = $answer_correct;

        return $this;
    }

    public function getAnswerBad1(): ?string
    {
        return $this->answer_bad_1;
    }

    public function setAnswerBad1(string $answer_bad_1): self
    {
        $this->answer_bad_1 = $answer_bad_1;

        return $this;
    }

    public function getAnswerBad2(): ?string
    {
        return $this->answer_bad_2;
    }

    public function setAnswerBad2(string $answer_bad_2): self
    {
        $this->answer_bad_2 = $answer_bad_2;

        return $this;
    }

    public function getAnswerBad3(): ?string
    {
        return $this->answer_bad_3;
    }

    public function setAnswerBad3(string $answer_bad_3): self
    {
        $this->answer_bad_3 = $answer_bad_3;

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
