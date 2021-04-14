<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\DTO\SumMessage;
use App\Entity\Sum;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SumMessageHandler implements MessageHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(SumMessage $sumMessage)
    {
        $sum = new Sum();
        $sum->setSum($sumMessage->value1 + $sumMessage->value2);

        $this->entityManager->persist($sum);
        $this->entityManager->flush();
    }
}
