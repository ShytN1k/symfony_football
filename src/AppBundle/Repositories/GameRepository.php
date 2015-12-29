<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class GameRepository extends EntityRepository
{
    public function getTeamGames($teamId)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT t, g FROM AppBundle\Entity\Game g JOIN g.team t WHERE t.id = :teamId"
        )->setParameter("teamId", $teamId)->getResult();
    }
}