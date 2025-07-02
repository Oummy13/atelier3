/**
 * @group performance
 */
public function testSuspendUserIsFast(): void
{
    $user = new \App\User();

    // Mock pour éviter d'attendre un vrai traitement
    $notifierMock = $this->createMock(\App\NotifierInterface::class);
    $notifierMock->method('notify')
                 ->willReturn(null);

    $manager = new \App\UserManager($notifierMock);

    $start = microtime(true);
    $manager->suspendUser($user);
    $end = microtime(true);

    $duration = $end - $start;

    $this->assertLessThan(0.05, $duration, "suspendUser() took too long: {$duration}s");
}
