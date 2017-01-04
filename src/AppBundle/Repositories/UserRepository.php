<?php

namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUser($username)
    {
        $queryString = 'SELECT user FROM AppBundle:User user';

        $queryString .= ' WHERE LOWER(user.username) = LOWER(:username)';

        $query = $this->getEntityManager()->createQuery($queryString);
        $query->setParameter('username', $username);

        $users = $query->getResult();

        if (0 === count($users)) {
            return null;
        }

        return $users[0];
    }
}
