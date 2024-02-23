<?php

$file = basename(__FILE__);

$path=realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR;
$lib_path=realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src').DIRECTORY_SEPARATOR;

require_once $lib_path.'Installer.php';

use \JBSNewMedia\GitInstall\Installer;

if (isset($_GET['tag'])) {
	$tag=$_GET['tag'];
} else {
	$tag='';
}

$Installer=new Installer();
$Installer->setRealPath($path);
$Installer->setLocalVersionFile('gitinstall.json');
$Installer->setLocalRunningFile('gitinstall.run');
$Installer->setName('jbsnewmedia/gitinstall');
$Installer->setGit('github');
##$Installer->setReleaseUrl('https://api.github.com/repos/jbs-newmedia/GITInstall/releases');
##$Installer->setRelease('stable');
$Installer->setReleaseUrl('https://api.github.com/repos/jbs-newmedia/GITInstall/commits');
$Installer->setRelease('commit');
$Installer->setRemotePath('src');
$Installer->setLocalPath('../src');
$Installer->setInstallVersion($tag);

if ($tag==='') {
	$Installer->setAction('info');
} else {
	$Installer->setAction('execute');
	header('Location: '.$file);
}
$info=$Installer->runEngine();
echo '<div style="margin:auto auto; margin-top:100px; border: 1px solid #aaa; border-radius:15px; padding:20px; width:600px;">';
if ((isset($info['error']))&&($info['error']!==true)) {
	echo '<h1 style="font-family: system-ui; font-size: 22px;">'.$info['info']['name'].'</h1>';
	echo '<h2 style="font-family: system-ui; font-size: 16px;">Locale version: '.$info['info']['version_local'].'</h2>';
	echo '<h2 style="font-family: system-ui; font-size: 16px;">Select version to install</h2>';
	echo '<ul>';
	foreach ($info['info']['version_remote_list'] as $key => $value) {
		echo '<li><a href="'.$file.'?tag='.$key.'" style="font-family: system-ui; font-size: 16px; color:#333;">'.$key.'</a></li>';
	}
	echo '</ul>';
} else {
	echo '<h1 style="font-family: system-ui; font-size: 24px;">Unable to connect to git remote repository</h1>';
	if ($Installer->getErrorString()!=='') {
		echo '<span style="font-family: system-ui; font-size: 16px; color:red;">'.$Installer->getErrorString().'</span>';
	}
}
echo '</div>';
?>