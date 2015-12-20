<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class CoachRepository extends EntityRepository
{
    public function getTeamCoachs($teamId)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, ch FROM AppBundle\Entity\Coach ch JOIN ch.team t WHERE t.id = :teamId"
        )->setParameter('teamId', $teamId)->getResult();
    }
}