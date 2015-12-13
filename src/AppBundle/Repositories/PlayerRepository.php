<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class PlayerRepository extends EntityRepository
{
    public function getTeamPlayers($teamname)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, p FROM AppBundle\Entity\Player p JOIN p.team t WHERE t.url = :teamname"
        )->setParameter('teamname', $teamname)->getResult();
    }
}