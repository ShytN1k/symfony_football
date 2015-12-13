<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class CoachRepository extends EntityRepository
{
    public function getTeamCoachs($teamname)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, ch FROM AppBundle\Entity\Coach ch JOIN ch.team t WHERE t.url = :teamname"
        )->setParameter('teamname', $teamname)->getResult();
    }
}