<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 16:57
 */

namespace Worktile\Team;

use Worktile\Core\AbstractAPI;

class Team extends AbstractAPI
{
    /**
     * Get all the teams in the specified user
     */
    const USER_TEAMS    = 'https://api.worktile.com/v1/teams';

    /**
     * Get the specified team's information
     */
    const TEAM_INFO     = 'https://api.worktile.com/v1/teams/%s';

    /**
     * Get all the members in the specified team
     */
    const TEAM_MEMBERS  = 'https://api.worktile.com/v1/teams/%s/members';

    /**
     * Get all the projects in the specified team
     */
    const TEAM_PROJECTS = 'https://api.worktile.com/v1/teams/%s/projects';


    /**
     * Get all the teams for the specified user
     * @return array
     */
    public function all()
    {
        return $this->queryHttpResponse(static::USER_TEAMS, 'GET');
    }

    /**
     * Get the team information for the specified team
     * @param $teamId
     * @return array
     */
    public function getTeamInfo($teamId)
    {
        return $this->queryHttpResponse(sprintf(static::TEAM_INFO, $teamId), 'GET');
    }

    /**
     * Get all the members for the specified team
     * @param $teamId
     * @return array
     */
    public function getTeamMembers($teamId)
    {
        return $this->queryHttpResponse(sprintf(static::TEAM_MEMBERS, $teamId), 'GET');
    }

    /**
     * Get all the projects for the specified team
     * @param $teamId
     * @return array
     */
    public function getTeamProjects($teamId)
    {
        return $this->queryHttpResponse(sprintf(static::TEAM_PROJECTS, $teamId), 'GET');
    }

}
