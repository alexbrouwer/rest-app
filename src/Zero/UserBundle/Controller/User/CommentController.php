<?php


namespace Zero\UserBundle\Controller\User;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class CommentController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Vote for comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Vote user comment",
     *      statusCodes={
     *          204="Returned when successful",
     *          404="Returned when not found"
     *      }
     * )
     * @param int $userId The user identifier
     * @param int $commentId The comment identifier
     */
    public function postVoteAction($userId, $commentId)
    {
    } // "post_user_comment_vote" [POST] /users/{slug}/comments/{id}/vote

    /**
     * Get comments made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Get user comments",
     *      statusCodes={
     *          200="Returned when successful"
     *      }
     * )
     * @param int $userId The user identifier
     *
     * @return View
     */
    public function cgetAction($userId)
    {
        $om   = $this->getDoctrine()->getManager();
        $user = $om->find('Zero\UserBundle\Entity\User', $userId);

        if (!$user) {
            throw new ResourceNotFoundException('unknown user');
        }

        return $this->view(array('resources' => $user->getComments()));
    }

    /**
     * Get specific comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Get user comment",
     *      statusCodes={
     *          200="Returned when successful",
     *          404="Returned when not found"
     *      }
     * )
     * @param int $userId The user identifier
     * @param int $commentId The comment identifier
     *
     * @return View
     */
    public function getAction($userId, $commentId)
    {
        $om   = $this->getDoctrine()->getManager();
        $user = $om->find('Zero\UserBundle\Entity\User', $userId);

        if (!$user) {
            throw new ResourceNotFoundException('unknown user');
        }

        $comment = $om->find('Zero\UserBundle\Entity\User\Comment', $commentId);

        if (!$comment) {
            throw new ResourceNotFoundException('unknown comment');
        }

        return $this->view(array('resource' => $comment));
    }

    /**
     * Delete a specific comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Delete user comment",
     *      statusCodes={
     *          204="Returned when successful",
     *          404="Returned when not found"
     *      }
     * )
     * @param int $userId The user identifier
     * @param int $commentId The comment identifier
     */
    public function deleteAction($userId, $commentId)
    {
    }

    /**
     * Create a comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Create user comment",
     *      statusCodes={
     *          204="Returned when successful",
     *      }
     * )
     * @param int $userId The user identifier
     */
    public function newAction($userId)
    {
    } // "new_user_comments"   [GET] /users/{slug}/comments/new

    /**
     * Edit a comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Create user comment",
     *      statusCodes={
     *          204="Returned when successful",
     *      }
     * )
     * @param int $userId The user identifier
     * @param int $commentId The comment identifier
     */
    public function editAction($userId, $commentId)
    {
    } // "edit_user_comment"   [GET] /users/{slug}/comments/{id}/edit

    /**
     * Remove a comment made by user
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Remove user comment",
     *      statusCodes={
     *          204="Returned when successful",
     *      }
     * )
     * @param int $userId The user identifier
     * @param int $commentId The comment identifier
     */
    public function removeAction($userId, $commentId)
    {
    } // "remove_user_comment" [GET] /users/{slug}/comments/{id}/remove
}