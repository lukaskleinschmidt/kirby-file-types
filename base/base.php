<?php

class BaseField extends _BaseField {

  public function _file() {
    if(!is_null($this->_file)) return $this->_file;

    if(isset(panel()->route->arguments[1]) && $filename = f::filename(panel()->route->arguments[1])) {
      return $this->_file = $this->page()->file($filename);
    }

    return null;
  }

  public function _fileType() {
    if($file = $this->_file()) return $file->type();
    return null;
  }

  public function _fileTypeMatches() {
    if(!$types = $this->fileType) return true;

    if(!is_array($types)) {
      $types = array($types);
    }

    return in_array($this->_fileType(), $types);
  }

  public function required() {
    if(!$this->_fileTypeMatches()) return false;
    return $this->required;
  }

  public function __toString() {
    try {
      if(!$this->_fileTypeMatches()) return (string) null;
      return (string)$this->template();
    } catch(Exception $e) {
      return (string)$e->getMessage();
    }
  }

}
