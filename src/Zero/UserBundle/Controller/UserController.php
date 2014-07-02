<?php


namespace Zero\UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Zero\UserBundle\Entity\User;

class UserController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Get a user by its identifier
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Get user",
     *      statusCodes={
     *          200="Returned when successful",
     *          404="Returned when not found"
     *      }
     * )
     * @param int $userId The identifier
     *
     * @return View
     */
    public function getAction($userId)
    {
        $view = View::create();

        $om   = $this->getDoctrine()->getManager();
        $user = $om->find('Zero\UserBundle\Entity\User', $userId);

        if (!$user) {
            throw new ResourceNotFoundException('unknown user');
        }

        $view->setData(array('entity' => $user));

        return $view;
    }
}
