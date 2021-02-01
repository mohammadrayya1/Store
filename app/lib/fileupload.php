<?php
namespace PHPMVC\lib;



class Fileupload
{
    private $_name;
    private $_type;
    private $_size;
    private $_error;
    private $_tmppath;
    private $fileExtension;

    private $allowedExtensions = [
        'jpg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls'
    ];

public function __construct(array $file)
{
    $this->_name=$this->name($file['name']);
    $this->_type=$file['type'];
    $this->_size=$file['size'];
    $this->_error=$file['error'];
    $this->_tmppath=$file['tmp_name'];

}
   public function name($_name)
    {
        preg_match_all('/([a-z]{1,4})$/i', $_name, $m);
        $this->fileExtension = $m[0][0];
        $_name = strtolower(base64_encode($this->_name . APP_SALT));
        return $_name;
    }

    private function isAllowedType()
    {
        return in_array($this->fileExtension, $this->allowedExtensions);
    }

    private function isSizeNotAcceptable()
    {
        preg_match_all('/(\d+)([MG])$/i', MAX_FILE_SIZE_ALLOWED, $matches);
        $maxFileSizeToUpload = $matches[1][0];
        $sizeUnit = $matches[2][0];
        $currentFileSize = ($sizeUnit == 'M') ? ($this->_size / 1024 / 1024) : ($this->_size / 1024 / 1024 / 1024);
        $currentFileSize = ceil($currentFileSize);
        return(int) $currentFileSize > (int) $maxFileSizeToUpload;
    }

    private function isImage()
    {
        return preg_match('/image/i', $this->_type);
    }

    public function getFileName()
    {
        return $this->_name . '.' . $this->fileExtension;
    }

    public function upload()
    {
        if($this->_error != 0) {
            throw new \Exception('Sorry file didn\'t upload successfully');
        } elseif(!$this->isAllowedType()) {

            throw new \Exception('Sorry files of type ' . $this->fileExtension .  ' are not allowed');
        } elseif ($this->isSizeNotAcceptable()) {
            throw new \Exception('Sorry the file size exceeds the maximum allowed size');
        } else {
            $storageFolder = $this->isImage() ? IMAGES_UPLOAD_STORAGE : DOCUMENTS_UPLOAD_STORAGE;

                move_uploaded_file($this->_tmppath, $storageFolder . ds . $this->getFileName());

            }


        return $this;
    }

}