************************************************************
************************************************************
************************************************************

Author: Harjap Singh https://www.odesk.com/users/~~e2e4ec336d05bb2b
Contribution Name: Shop Stream Configuration
Version Date: v 1.1 15/12/2012
License: under the GPL - See attached License for info.

************************************************************

Designed for: Zen Cart v1.5.0.

************************************************************

Description: This new module enables you to integrate the Shop Stream service Code to your zen cart based shop easily.

**************************************************************
**************************************************************

Installation Instructions
##############################################################################

1. Go to Admin->Tools->Install SQL Patches and install install.sql by copy and pasting the contents of the file into the form there and click send button.

2. Upload includes/functions/extra_functions/shop_stream.php file to the /includes/functions/extra_functions/ folder of your ZenCart installation.

3. Upload admin/includes/extra_datafiles/shop_stream_database_names.php file to includes/extra_datafiles/ folder under admin folder of your ZenCart installation . Note that if you renamed your admin folder for security reasons, it will not be named "admin" now.

4. At the bottom of /includes/templates/[your_template]/common/tpl_footer.php where [your_template] is your current template directory name, Copy and paste the following lines of code (found below):

<?php ak_shop_stream_code();?>


------------------------------------------------------
How to use this module
------------------------------------------------------

Once you have completed a successful install, login to your Zen Cart admin and go to configuration->SHOP STREAM Configuration and set your Shop Stream's Api Key or leave empty if you want to disable this module.


----------------------------
Troubleshooting
----------------------------

In /includes/templates/[your_template]/common/tpl_footer.php [your_template] is your template directory name,If you don't know what the directory name is you are using, then you can find it out by following these steps:

1) Login to your Zen Cart admin
2) Go to "Tools > Template Selection" from the menu
3) From the screen that shows, look under the column that is titled "Template Directory". The name you find under that column is the
   name of the directory that your zen cart site design is running in. This EXACT name is the one that you will use to replace
   each instance of "your_template".

And if you do not see common/tpl_footer.php file in your current template directory then your zen cart must be using defaul one which will be found at /includes/templates/template_default/common/tpl_footer.php under you zen cart installation.