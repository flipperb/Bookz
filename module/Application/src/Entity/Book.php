<?php

namespace Application\Entity;
use \Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 * @ORM\Table(name="Books")
 * @ORM\Entity
 **/
class Book
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 * var string
	 */
	protected $title;

	/**
	 * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
	 * @var Author
	 */
	protected $author;

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getAuthor()
	{
		return $this->author;
	}
}
