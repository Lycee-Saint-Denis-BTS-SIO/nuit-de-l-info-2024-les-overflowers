<?php

class Reponse {

    private int $id;
    private string $lib;
    private Question $lesQuestions;

    public function __construct(int $id, string $lib, array $lesQuestions = []) {
        $this->id = $id;
        $this->lib = $lib;
        $this->lesQuestions = $lesQuestions;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getLib(): string {
        return $this->lib;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setLib(string $lib): void {
        $this->lib = $lib;
    }

    public function ajouterQuestion(Question $question): void {
        $this->lesQuestions[] = $question;
    }

    public function supprimerReponse(Question $question): void {
        $this->lesQuestions = array_filter($this->lesQuestions, function($q) use ($lesQuestions) {
            return $q !== $question;
        });
    }
}
?>