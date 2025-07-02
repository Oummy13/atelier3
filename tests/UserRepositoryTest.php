<?php

declare(strict_types=1);

namespace App\Tests;

use App\User;
use App\UserRepository;
use PDO;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private PDO $pdo;
    private UserRepository $repository;

    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)');
        $this->repository = new UserRepository($this->pdo);
    }

    public function testUserCanBeSavedAndRetrieved(): void
    {
        $user = new User(1, 'Alice', 'alice@example.com');
        $this->repository->save($user);

        $retrieved = $this->repository->findById(1);

        $this->assertNotNull($retrieved);
        $this->assertSame('Alice', $retrieved->getName());
        $this->assertSame('alice@example.com', $retrieved->getEmail());
    }
}
