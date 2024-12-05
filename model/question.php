<?php
class Question {
    private int $id;
    private string $lib;

    public function __construct(int $id, string $lib) {
        $this->id = $id;
        $this->lib = $lib;
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
}
?>
