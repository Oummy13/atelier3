<?php
declare(strict_types=1);

namespace App;

use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(User $user): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (id, name, email) VALUES (?, ?, ?)');
        $stmt->execute([$user->getId(), $user->getName(), $user->getEmail()]);
    }

    public function findById(int $id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data === false) return null;

        return new User($data['id'], $data['name'], $data['email']);
    }
}
