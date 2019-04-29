<?php
/**
 * Maks Fedorov
 * https://maksfedorov.ru
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\RezumeRepository")
  */
class Rezume
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $position;

    /**
     * @var string $file
     * @ORM\Column(type="string")
     */
    private $file;

    /**
     * @var string $file_upload
     * @var UploadedFile
     */
    private $file_upload;


    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;


    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }





    /**
     * Sets file.
     *
     * @ param UploadedFile $file
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setFileUpload(UploadedFile $file_upload = null)
    {
        $this->file_upload = $file_upload;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileUpload()
    {
        return $this->file_upload;
    }


    public function deleteFile($path)
    {
        if($path && $this->file)
        {
            $fs = new Filesystem();
            try
            {
                $fs->remove( $path . '/'. $this->file );
            } catch (IOException $e) {
                echo "error";
            }; 
            return true;  

        }
        return false;
    }

    /**
     * @return mixed
     *
     */
    public function __toString() {
        return $this->position;
    }

  

}

