<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class PlayerRepository extends EntityRepository
{
    public function getTeamPlayers($teamId)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, p FROM AppBundle\Entity\Player p JOIN p.team t WHERE t.id = :teamId"
        )->setParameter('teamId', $teamId)->getResult();
    }
}