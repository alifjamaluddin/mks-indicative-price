<?php
class QuickGit {
  public $version;
  
  function __construct() {
    exec('git describe --always',$version_mini_hash);
    exec('git rev-list HEAD | wc -l',$version_number);
    exec('git log -1',$line);
    $this->version['short'] = "mksindicativeprice - v1.".trim($version_number[0])." (".$version_mini_hash[0].")";
  }

  public function output($type) {
    return $this->version[$type];
  }
}
$git = new QuickGit;
?>