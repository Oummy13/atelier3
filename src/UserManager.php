namespace App;

class UserManager
{
    private NotifierInterface $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function suspendUser(User $user): void
    {
        $user->suspend();
        $this->notifier->notify($user, "Your account has been suspended.");
    }
}
