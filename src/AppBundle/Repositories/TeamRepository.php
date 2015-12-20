<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class TeamRepository extends EntityRepository
{
    public function getTeamDeps($teamId)
    {
        return $this->createQueryBuilder('t')
            ->select('t, c, ch, p, g')
            ->leftjoin('t.country', 'c')
            ->join('t.coaches', 'ch')
            ->join('t.players', 'p')
            ->join('t.games', 'g')
            ->where('t.id = :teamId')
            ->setParameter('teamId', $teamId)
            ->getQuery()
            ->getResult();
    }
}