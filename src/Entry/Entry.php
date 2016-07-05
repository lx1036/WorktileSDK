<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 18:06
 */

namespace Worktile\Entry;


use Worktile\Core\AbstractAPI;

class Entry extends AbstractAPI
{
    /**
     *  Get all entries for the specified project
     */
    const PROJECT_ENTRIES = 'https://api.worktile.com/v1/entries';

    /**
     * Create the entry
     */
    const CREATE_ENTRY = 'https://api.worktile.com/v1/entry';

    /**
     * Rename the entry
     */
    const RENAME_ENTRY = 'https://api.worktile.com/v1/entries/%s';

    /**
     * Delete the entry
     */
    const DELETE_ENTRY = 'https://api.worktile.com/v1/entries/%s';

    /**
     * Subscribe the entry
     */
    const WATCH_ENTRY = 'https://api.worktile.com/v1/entries/%s/watcher';

    /**
     * UnSubscribe the entry
     */
    const UNWATCH_ENTRY = 'https://api.worktile.com/v1/entries/%s/watcher';

    /**
     * Get all the entries
     * @return array
     */
    public function all()
    {
        return $this->queryHttpResponse(static::PROJECT_ENTRIES, 'GET');
    }

    /**
     * Create the entry by the name
     * @param $name
     * @return array
     */
    public function createEntry($name)
    {
        $parameter = ['name' => $name];
        return $this->queryHttpResponse(static::CREATE_ENTRY, 'POST', $parameter);
    }

    /**
     * Rename the entry
     * @param $entryId
     * @param $projectId
     * @param $newName
     * @return array
     */
    public function renameEntry($entryId, $projectId, $newName)
    {
        $parameter = ['name' => $newName, 'pid' => $projectId];
        return $this->queryHttpResponse(sprintf(static::RENAME_ENTRY, $entryId), 'PUT', $parameter);
    }

    /**
     * Delete the entry
     * @param $entryId
     * @param $projectId
     * @return array
     */
    public function deleteEntry($entryId, $projectId)
    {
        $parameter = ['pid' => $projectId];
        return $this->queryHttpResponse(sprintf(static::DELETE_ENTRY, $entryId), 'DELETE', $parameter);
    }

    /**
     * Subscribe the entry
     * @param $entryId
     * @param $projectId
     * @return array
     */
    public function subscribeEntry($entryId, $projectId)
    {
        $parameter = ['pid' => $projectId];
        return $this->queryHttpResponse(sprintf(static::WATCH_ENTRY, $entryId), 'POST', $parameter);
    }

    /**
     * UnSubscribe the entry
     * @param $entryId
     * @param $projectId
     * @return array
     */
    public function unSubscribeEntry($entryId, $projectId)
    {
        $parameter = ['pid' => $projectId];
        return $this->queryHttpResponse(sprintf(static::UNWATCH_ENTRY, $entryId), 'DELETE', $parameter);
    }

}
