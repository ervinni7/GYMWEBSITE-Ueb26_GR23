<?php
// ============================================================
// KLASA GymClass — klasa bazë
// ============================================================
class GymClass {
    private string $name;
    private string $trainer;
    private string $schedule;
    private int    $maxMembers;

    public function __construct(string $name, string $trainer, string $schedule, int $maxMembers = 20) {
        $this->name       = $name;
        $this->trainer    = $trainer;
        $this->schedule   = $schedule;
        $this->maxMembers = $maxMembers;
    }

    // GETTERS
    public function getName(): string     { return $this->name; }
    public function getTrainer(): string  { return $this->trainer; }
    public function getSchedule(): string { return $this->schedule; }
    public function getMaxMembers(): int  { return $this->maxMembers; }

    // SETTERS
    public function setTrainer(string $t): void  { $this->trainer = $t; }
    public function setSchedule(string $s): void { $this->schedule = $s; }

    public function getInfo(): string {
        return "{$this->name} | Trajneri: {$this->trainer} | Orari: {$this->schedule} | Max: {$this->maxMembers}";
    }

    // Të dhëna dummy për dashboard
    public static function getAll(): array {
        return [
            new GymClass('Yoga',     'Sara Krasniqi', 'E Hënë & E Mërkurë 08:00', 15),
            new GymClass('CrossFit', 'Agron Berisha',  'E Martë & E Enjte 17:00',  20),
            new GymClass('Zumba',    'Mirela Gashi',   'E Premte 18:00',            25),
            new PremiumClass('Boxing', 'Faton Hoxha', 'E Shtunë 10:00', 10, 'Doreza dhe çantë incluzive'),
        ];
    }
}

// ============================================================
// KLASA PremiumClass — trashëgon GymClass (trashëgimi)
// ============================================================
class PremiumClass extends GymClass {
    private string $extras;

    public function __construct(string $name, string $trainer, string $schedule, int $max, string $extras) {
        parent::__construct($name, $trainer, $schedule, $max);
        $this->extras = $extras;
    }

    public function getExtras(): string { return $this->extras; }

    // Override getInfo()
    public function getInfo(): string {
        return parent::getInfo() . " | ⭐ Premium: {$this->extras}";
    }
}
