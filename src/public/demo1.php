<?php

class Person
{
    public function __construct(
        public ?string $address = null,
        public ?string $email = null,
        public ?string $name = null,
        public ?int $age = null
    )
    {
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class Student extends Person
{
    public ?string $school = null;

    public function setName(string $name): void
    {
        parent::setName($this->school . $name);
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): void
    {
        $this->school = $school;
    }
}
