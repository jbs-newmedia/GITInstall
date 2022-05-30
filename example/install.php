<?php

$path=realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR;
$lib_path=realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src').DIRECTORY_SEPARATOR;

require_once $lib_path.'Installer.php';

use \JBSNewMedia\GitInstall\Installer;

$Installer=new Installer();
$Installer->setRealPath($path);
$Installer->setLocalVersionFile('gitinstall.json');
$Installer->setLocalRunningFile('gitinstall.run');
$Installer->setName('jbsnewmedia/gitinstall');
$Installer->setGit('github');
$Installer->setUrl('https://api.github.com/repos/jbs-newmedia/GITInstall/releases');
$Installer->setRelease('stable');
$Installer->setRemotePath('src');
$Installer->setLocalPath('../src');
/* info | execute | remove */
$Installer->setAction('execute');

print_r($Installer->runEngine());

?>