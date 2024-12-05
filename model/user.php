<?php

class User{
    private string $login;
    private string $mdp;
    private int $score;

    public function __construct(int $login, string $mdp, int $score) {
        $this->login = $login;
        $this->mdp = $mdp;
        $this->score = $score;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function getMdp(): string {
        return $this->mdp;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function setLogin(string $login): void {
        $this->login = $login;
    }

    public function setMdp(string $mdp): void {
        $this->mdp = $mdp;
    }

    public function setScore(int $score): void {
        $this->score = $score;
    }
}