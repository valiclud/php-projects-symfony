namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="place")
*/
class Place
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
private $county;

/**
* @var string
*
* @ORM\Column(type="string", length=255)
*/
private $country;

/**
* @var Original_text[]|ArrayCollection
*
* @ORM\OneToMany(targetEntity="Original_text", mappedBy="place")
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
* Get the value of county
*
* @return string
*/
public function getCounty() : ?string
{
return $this->county;
}

/**
* Set the value of county
*
* @param string $county
*
* @return self
*/
public function setCounty(string $county) : self
{
$this->county = $county;

return $this;
}

/**
* Get the value of country
*
* @return string
*/
public function getCountry() : ?string
{
return $this->country;
}

/**
* Set the value of country
*
* @param string $country
*
* @return self
*/
public function setCountry(string $country) : self
{
$this->country = $country;

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