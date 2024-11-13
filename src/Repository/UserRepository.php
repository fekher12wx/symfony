<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Find a user by email
     *
     * @param string $email
     * @return User|null
     */
    public function findOneByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    /**
     * Find users by their role
     *
     * @param string $role
     * @return User[]
     */
    public function findByRole(string $role): array
    {
        return $this->findBy(['role' => $role]);
    }

    /**
     * Find a user by their phone number
     *
     * @param string $phone
     * @return User|null
     */
    public function findOneByPhone(string $phone): ?User
    {
        return $this->findOneBy(['phone' => $phone]);
    }

    /**
     * Custom query to find users by name
     *
     * @param string $name
     * @return User[]
     */
    public function findUsersByName(string $name): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Pagination: Find users with pagination
     *
     * @param int $page
     * @param int $limit
     * @return User[]
     */
    public function findPaginatedUsers(int $page, int $limit): array
    {
        return $this->createQueryBuilder('u')
            ->setFirstResult(($page - 1) * $limit) // Calculate offset
            ->setMaxResults($limit) // Set the limit
            ->getQuery()
            ->getResult();
    }
}
