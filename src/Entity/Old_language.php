namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="old_language")
*/
class Old_language
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
private $language;

/**
* @var string
*
* @ORM\Column(type="string", length=255)
*/
private $period;

/**
* @var Original_text[]|ArrayCollection
*
* @ORM\OneToMany(targetEntity="Original_text", mappedBy="old_language")
*/
private $original_texts;

public function __construct()
{
$this->$original_texts = new ArrayCollection();
}

/**
* Get the value of id
*
* @return int
*/
public function getId() : ?int
{
return $this->id;
}

/**
* Get the value of language
*
* @return string
*/
public function getLanguage() : ?string
{
return $this->language;
}

/**
* Set the value of language
*
* @param string $language
*
* @return self
*/
public function setLanguage(string $language) : self
{
$this->language = $language;

return $this;
}

/**
* Get the value of period
*
* @return string
*/
public function getPeriod() : ?string
{
return $this->period;
}

/**
* Set the value of period
*
* @param string $period
*
* @return self
*/
public function setPeriod(string $period) : self
{
$this->period = $period;

return $this;
}

/**
* Get the value of original_texts
*
* @return Original_text[]|ArrayCollection
*/
public function getOriginal_texts()
{
return $this->original_texts;
}

/**
* Set the value of original_texts
*
* @param Original_text[]|ArrayCollection $original_texts
*
* @return self
*/
public function setOriginal_texts($original_texts) : self
{
$this->original_texts = $original_texts;

return $this;
}

/**
* @param Original_text $text
*
* @return self
*/
public function addOriginal_text(Original_text $text) : self
{
if (!$this->original_texts->contains($text)) {
$this->original_texts->add($text);
}

return $this;
}

/**
* @param Original_text $text
*
* @return self
*/
public function removeOriginal_text(Original_text $text) : self
{
$this->original_texts->removeElement($text);

return $this;
}
}