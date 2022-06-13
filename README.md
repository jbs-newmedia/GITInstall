# GITInstall
Install releases from GitHub/GitLab with php. comes with uninstaller.

```
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
//$Installer->setIgnoredFiles(['file.ext', 'dir/file.ext']);
//$Installer->setIgnoredDirectories(['dir/', 'dir/subdir/']);
/* info | execute | remove */
$Installer->setAction('execute');

print_r($Installer->runEngine());
```