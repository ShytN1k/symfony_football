<?php
namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class TeamRepository extends EntityRepository
{
    public function getTeamDeps($teamname)
    {
        return $this->createQueryBuilder('t')
            ->select('t, c, ch, p, g')
            ->leftjoin('t.country', 'c')
            ->join('t.coaches', 'ch')
            ->join('t.players', 'p')
            ->join('t.games', 'g')
            ->where('t.url = :teamname')
            ->setParameter('teamname', $teamname)
            ->getQuery()
            ->getResult();
    }
}