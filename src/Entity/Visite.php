<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=VisiteRepository::class)
 * @Vich\Uploadable
 */
class Visite
{
    /**
     * @Vich\UploadableField(mapping="visites", fileNameProperty="imageName")
     * @Assert\Image(mimeTypes="image\jpeg")
     * @var File|null
     */
    private $imageFile;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $imageName;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avis;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmax;

    /**
     * @ORM\ManyToMany(targetEntity=Environnement::class)
     */
    private $environnements;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function __construct()
    {
        $this->environnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDatecreation(): ?DateTimeInterface
    {
        return $this->datecreation;
    }
    
    public function getDatecreationString() : string
    {
        return $this->datecreation->format('d/m/Y');
    }

    public function setDatecreation(?DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getTempmin(): ?int
    {
        return $this->tempmin;
    }

    public function setTempmin(?int $tempmin): self
    {
        $this->tempmin = $tempmin;

        return $this;
    }

    public function getTempmax(): ?int
    {
        return $this->tempmax;
    }

    public function setTempmax(?int $tempmax): self
    {
        $this->tempmax = $tempmax;

        return $this;
    }

    /**
     * @return Collection|Environnement[]
     */
    public function getEnvironnements(): Collection
    {
        return $this->environnements;
    }

    public function addEnvironnement(Environnement $environnement): self
    {
        if (!$this->environnements->contains($environnement)) {
            $this->environnements[] = $environnement;
        }

        return $this;
    }

    public function removeEnvironnement(Environnement $environnement): self
    {
        $this->environnements->removeElement($environnement);

        return $this;
    }
    
    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    public function getImageName(): ?string {
        return $this->imageName;
    }

    /**
     * 
     * @param File $imageFile
     * @return self
     */
    public function setImageFile(File $imageFile) : self 
    {
        $this->imageFile = $imageFile;
        if($this->imageFile instanceof UploadedFile)
        {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function setImageName($imageName) : self
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }


}
