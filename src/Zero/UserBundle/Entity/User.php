<?php


namespace Zero\UserBundle\Entity;

class User
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var User\Comment[]
     */
    protected $comments;

    /**
     * Set id
     *
     * @param int $id
     *
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Comments
     *
     * @return User\Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set comments
     *
     * @param User\Comment[] $comments
     *
     * @return User
     */
    public function setComments(array $comments)
    {
        $this->comments = array();
        foreach ($comments as $comment) {
            $this->addComment($comment);
        }

        return $this;
    }

    /**
     * Add comment
     *
     * @param User\Comment $comment
     *
     * @return $this
     */
    public function addComment(User\Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setUser($this);

        return $this;
    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}