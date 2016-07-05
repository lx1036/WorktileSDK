<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 17:32
 */

namespace Worktile\Project;

use Worktile\Core\AbstractAPI;

class Project extends AbstractAPI
{
    /**
     * Get all the projects for the specified user
     */
    const USER_PROJECTS = 'https://api.worktile.com/v1/projects';

    /**
     * Get the info for the specified project
     */
    const PROJECT_INFO = 'https://api.worktile.com/v1/projects/%s';

    /**
     * Get all the members for the specified project
     */
    const PROJECT_MEMBERS = 'https://api.worktile.com/v1/projects/%s/members';

    /**
     * Add members to the specified project
     */
    const ADD_MEMBER_PROJECT = 'https://api.worktile.com/v1/projects/%s/members';

    /**
     * Remove member from the specified project
     */
    const REMOVE_MEMBER_PROJECT = 'https://api.worktile.com/v1/projects/%s/members/%s';

    /**
     * Get all the projects for the specified user
     * @return array
     */
    public function all()
    {
        return $this->queryHttpResponse(static::USER_PROJECTS, 'GET');
    }

    /**
     * Get the info for the specified project
     * @param $projectId
     * @return array
     */
    public function getProjectInfo($projectId)
    {
        return $this->queryHttpResponse(sprintf(static::PROJECT_INFO, $projectId), 'GET');
    }

    /**
     * Get all the members for the specified project
     * @param $projectId
     * @return array
     */
    public function getProjectMembers($projectId)
    {
        return $this->queryHttpResponse(sprintf(static::PROJECT_MEMBERS, $projectId), 'GET');
    }

    /**
     * Add members to the specified project
     * @param $projectId
     * @return array
     */
    public function addProjectMember($projectId)
    {
        return $this->queryHttpResponse(sprintf(static::ADD_MEMBER_PROJECT, $projectId), 'POST');
    }

    /**
     * Remove member from the specified project
     * @param $projectId
     * @param $memberId
     * @return array
     */
    public function removeProjectMember($projectId, $memberId)
    {
        return $this->queryHttpResponse(sprintf(static::REMOVE_MEMBER_PROJECT, $projectId, $memberId), 'POST');
    }

}
