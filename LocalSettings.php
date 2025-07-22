<?php
$wgSitename     = 'WebChemistry Wiki';
$wgScriptPath   = '';
$wgArticlePath  = "/$1";
$wgServer       = getenv('SERVER').':'.getenv('PORT');

$wgDBserver     = 'mw-db';
$wgDBtype       = getenv('MEDIAWIKI_DB_TYPE');
$wgDBname       = getenv('MEDIAWIKI_DB_NAME');
$wgDBuser       = getenv('MEDIAWIKI_DB_USER');
$wgDBpassword   = getenv('MEDIAWIKI_DB_PASSWORD');

$wgUploadPath   = '/images';
$wgEnableUploads = true;

wfLoadSkin('Vector');
wfLoadExtension('SyntaxHighlight_GeSHi');
