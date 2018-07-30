<?php

namespace Application\Entity;
use Bookz\V1\Rest\Book\BookCollection;
use \Doctrine\ORM\Mapping as ORM;

/**
 * Class Author
 * @ORM\Table(name="Authors")
 * @ORM\Entity
 **/
class Author
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
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\OneToMany(targetEntity="Book", mappedBy="author")
	 * @var Book[]
	 */
	protected $books;

	public function __construct()
	{
		$this->books;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getBooks()
	{
		return $this->books;
	}
}

