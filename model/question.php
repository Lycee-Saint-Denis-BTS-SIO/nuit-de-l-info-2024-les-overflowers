<?php
class Question {
    private int $id;
    private string $lib;
    private array $lesReponses; 

    public function __construct(int $id, string $lib, array $lesReponses = []) {
        $this->id = $id;
        $this->lib = $lib;
        $this->lesReponses = $lesReponses;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getLib(): string {
        return $this->lib;
    }

    public function getLesReponses(): array {
        return $this->lesReponses;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setLib(string $lib): void {
        $this->lib = $lib;
    }

    public function ajouterReponse(Reponse $reponse): void {
        $this->lesReponses[] = $reponse;
    }

    public function supprimerReponse(Reponse $reponse): void {
        $this->lesReponses = array_filter($this->lesReponses, function($r) use ($reponse) {
            return $r !== $reponse;
        });
    }
}
?>
