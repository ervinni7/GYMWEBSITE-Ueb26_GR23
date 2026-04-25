<?php
// ============================================================
// KLASA User — OOP (konstruktor, get/set, enkapsulim)
// ============================================================
class User {
    private string $name;
    private string $email;
    private string $role;
    private string $membership;

    // Kredenciale hardcoded — pa databazë (kërkesë Faza I)
    private static array $users = [
        'admin'  => ['password' => 'admin123',  'role' => 'admin',  'name' => 'Admin Gym',   'membership' => 'All Club Access - Lifetime'],
        'member' => ['password' => 'member123', 'role' => 'member', 'name' => 'Anëtar Demo', 'membership' => '1 Vit Anëtarësim - 2 Persona'],
    ];

    // Konstruktori
    public function __construct(string $name, string $email, string $role, string $membership) {
        $this->name       = $name;
        $this->email      = $email;
        $this->role       = $role;
        $this->membership = $membership;
    }

    // GETTERS
    public function getName(): string       { return $this->name; }
    public function getEmail(): string      { return $this->email; }
    public function getRole(): string       { return $this->role; }
    public function getMembership(): string { return $this->membership; }

    // SETTERS
    public function setName(string $n): void       { $this->name = $n; }
    public function setEmail(string $e): void      { $this->email = $e; }
    public function setMembership(string $m): void { $this->membership = $m; }

    // Metoda: a është admin?
    public function isAdmin(): bool { return $this->role === 'admin'; }

    // Metoda statike: autentifikim
    public static function authenticate(string $username, string $password): ?User {
        if (isset(self::$users[$username]) && self::$users[$username]['password'] === $password) {
            $d = self::$users[$username];
            return new User($d['name'], $username . '@egym.com', $d['role'], $d['membership']);
        }
        return null;
    }

    // Kthen të dhënat si array për session
    public function toSessionArray(): array {
        return [
            'user_name'       => $this->name,
            'user_email'      => $this->email,
            'user_role'       => $this->role,
            'user_membership' => $this->membership,
        ];
    }
}
