<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class GameRepository extends EntityRepository
{
    public function getTeamGames($teamname)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, g FROM AppBundle\Entity\Game g JOIN g.team t WHERE t.url = :teamname"
        )->setParameter("teamname", $teamname)->getResult();
    }
}