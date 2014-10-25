Cakephp-Polls-Plugin
====================

Cakephp Polls Plugin , Multi Poll 
Activation instructions
 just add the plugin folder to app/plugin 
 and load the plugin  in app/Config/bootstrap.php
CakePlugin::load('Polls');
create the schema 
$  Console/cake schema create
from the plugin schema file

you can add polls and polls options throught the admin link 
yourapp/admin/polls

now You can use multi Poll plugin
by calling the poll element anywhere 

<?php echo $this->element('Polls.vote',array('model' => 'how2')); ?>
where the model is the name of poll
this plugin developed by Zuha and ahmad maher

For more details http://amdmaher.wordpress.com


