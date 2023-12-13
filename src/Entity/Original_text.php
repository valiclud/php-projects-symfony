namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="original_text")
 */
class Original_text
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
* @ORM\Column(type="blob")
*/
private $text_img;

/**
* @var string
*
* @ORM\Column(type="integer")
*/
private $century;

/**
* @var \DateTime
*
* @ORM\Column(type="date")
*/
private $insert_date;

/**
* @var string
*
* @ORM\Column(type="integer")
*/
private $hits;

/**
* @var Place
*
* @ORM\ManyToOne(targetEntity="Place", inversedBy="original_texts")
* @ORM\JoinColumn(name="place_id", referencedColumnName="id", nullable=false)
*/
private $place;

/**
* @var Old_language
*
* @ORM\ManyToOne(targetEntity="Old_language", inversedBy="original_texts")
* @ORM\JoinColumn(name="old_language_id", referencedColumnName="id", nullable=false)
*/
private $old_language;

/**
* @var Translated_text[]|ArrayCollection
*
* @ORM\OneToMany(targetEntity="Translated_text", mappedBy="original_text")
*/
private $translated_texts;

public function __construct()
    {
        $this->$translated_texts = new ArrayCollection();
    }

}
