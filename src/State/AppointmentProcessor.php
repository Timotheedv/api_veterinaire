<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Appointment;
use Symfony\Bundle\SecurityBundle\Security;

class AppointmentProcessor implements ProcessorInterface
{
    private ProcessorInterface $persistProcessor;
    private Security $security;

    public function __construct(
        ProcessorInterface $persistProcessor,
        Security $security
    ) {
        $this->persistProcessor = $persistProcessor;
        $this->security = $security;
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Appointment
    {
        // Set the creation date
        if ($data instanceof Appointment && null === $data->getCreatedAt()) {
            $data->setCreatedAt(new \DateTime());
        }

        // Set the current user as assistant if not specified
        if ($data instanceof Appointment && null === $data->getAssistant()) {
            $data->setAssistant($this->security->getUser());
        }

        // Set initial status
        if ($data instanceof Appointment && null === $data->getStatus()) {
            $data->setStatus(Appointment::STATUS_SCHEDULED);
        }

        // Default payment status
        if ($data instanceof Appointment && null === $data->isIsPaid()) {
            $data->setIsPaid(false);
        }

        return $this->persistProcessor->process($data, $operation, $uriVariables, $context);
    }
}