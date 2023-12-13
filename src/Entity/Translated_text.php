namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="translated_text")
*/
class Translated_text
{
/**
* @var int
*
* @ORM\Column(type="integer")
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/
private $id;

/**
* @var string
*
* @ORM\Column(type="string", length=255)
*/
private $author;

/**
* @var string
*
* @ORM\Column(type="string", length=255)
*/
private $title;

/**
* @var string
*
* @ORM\Column(type="string", length=65535)
*/
private $text;

/**
* @var string
*
* @ORM\Column(type="string", length=255)
*/
private $language;

/**
* @var \DateTime
*
* @ORM\Column(type="date")
*/
private $insert_date;

/**
* @var int
*
* @ORM\Column(type="integer")
*/
private $revision;

/**
* @var Original_text
*
* @ORM\ManyToOne(targetEntity="Original_text", inversedBy="translated_texts")
* @ORM\JoinColumn(name="original_text_id", referencedColumnName="id", nullable=false)
*/
private $original_text;

}
