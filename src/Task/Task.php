<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 18:53
 */

namespace Worktile\Task;


use Worktile\Core\AbstractAPI;

class Task extends AbstractAPI
{
    /**
     * Get all the tasks
     */
    const PROJECT_TASKS = 'https://api.worktile.com/v1/tasks';

    /**
     * Get the expired tasks
     */
    const EXPIRED_TASKS = 'https://api.worktile.com/v1/tasks/today';

    /**
     * Create a new task
     */
    const CREATE_TASK = 'https://api.worktile.com/v1/task';

    /**
     * Get/Update/Delete the specified task
     */
    const TASK_UPDATE_DELETE_INFO = 'https://api.worktile.com/v1/tasks/%s';

    /**
     * Move the task
     */
    const MOVE_TASK = 'https://api.worktile.com/v1/tasks/%s/move';

    /**
     * Set the task expire time
     */
    const SET_EXPIRE_TASK = 'https://api.worktile.com/v1/tasks/%s/expire';

    /**
     * Dispatch the task to the specified user
     */
    const DISPATCH_TASK = 'https://api.worktile.com/v1/tasks/%s/member';

    /**
     * Revoke dispatch the task to the specified user
     */
    const REVOKE_DISPATCH_TASK = 'https://api.worktile.com/v1/tasks/%s/members/%s';

    /**
     * Subscribe the task
     */
    const WATCH_TASK = 'https://api.worktile.com/v1/tasks/%s/watcher';

    /**
     * UnSubscribe the task
     */
    const UNWATCH_TASK = 'https://api.worktile.com/v1/tasks/%s/watchers/%s';

    /**
     * Add the label to the task
     */
    const ADD_LABEL_TASK = 'https://api.worktile.com/v1/tasks/%s/labels';

    /**
     * Delete the label from the task
     */
    const DELETE_LABEL_TASK = 'https://api.worktile.com/v1/tasks/%s/labels';

    /**
     * Complete the specified task
     */
    const COMPLETE_TASK = 'https://api.worktile.com/v1/tasks/%s/complete';

    /**
     * UnComplete the specified task
     */
    const REVOKE_COMPLETE_TASK = 'https://api.worktile.com/v1/tasks/%s/uncomplete';

    /**
     * Add the to-do to the task
     */
    const ADD_TODO_TASK = 'https://api.worktile.com/v1/tasks/%s/todo';

    /**
     * Update the to-do from the task
     */
    const UPDATE_TODO_TASK = 'https://api.worktile.com/v1/tasks/%s/todos/%s';

    /**
     * Complete the to-do from the task
     */
    const COMPLETE_TODO_TASK = 'https://api.worktile.com/v1/tasks/%s/todos/%s/checked';

    /**
     * Revoke complete the to-do from the task
     */
    const REVOKE_COMPLETE_TODO_TASK = 'https://api.worktile.com/v1/tasks/%s/todos/%s/unchecked';

    /**
     * Delete the to-do from the task
     */
    const DELETE_TODO_TASK = 'https://api.worktile.com/v1/tasks/%s/todos/%s';

    /**
     * Revoke the archived task
     */
    const REVOKE_ARCHIVE_TASK = 'https://api.worktile.com/v1/tasks/archived?pid=%s&page=1&size=20';

    /**
     * ARCHIVE the task in the project
     */
    const ARCHIVE_PROJECT_TASK = 'https://api.worktile.com/v1/tasks/archive';

    /**
     * ARCHIVE the task
     */
    const ARCHIVE_TASK = 'https://api.worktile.com/v1/tasks/%s/archive';

    /**
     * UNARCHIVE the task
     */
    const UNARCHIVE_TASK = 'https://api.worktile.com/v1/tasks/%s/unarchive';

    /**
     * GET all comments from the task
     */
    const TASK_COMMENTS = 'https://api.worktile.com/v1/tasks/%s/comments?pid=%s';

    /**
     * Add the comment to the specified task
     */
    const ADD_COMMENT = 'https://api.worktile.com/v1/tasks/%s/comment';

    /**
     * Delete the comment from the specified task
     */
    const DELETE_COMMENT = 'https://api.worktile.com/v1/tasks/%s/comments/%s';

    /**
     * Get all the items
     * @return mixed
     */
    public function all()
    {

    }
}
