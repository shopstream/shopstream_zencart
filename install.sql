SET @t4=0;
SELECT (@t4:=configuration_group_id) as t4 
FROM configuration_group
WHERE configuration_group_title= 'Shop Stream Configuration';
DELETE FROM configuration WHERE configuration_group_id = @t4 AND configuration_group_id != 0;
DELETE FROM configuration_group WHERE configuration_group_id = @t4 AND configuration_group_id != 0;

INSERT INTO configuration_group VALUES (NULL, 'Shop Stream Configuration', 'Set Shop Stream Options', '1', '1');
UPDATE configuration_group SET sort_order = last_insert_id() WHERE configuration_group_id = last_insert_id();

SET @t4=0;
SELECT (@t4:=configuration_group_id) as t4 
FROM configuration_group
WHERE configuration_group_title= 'Shop Stream Configuration';

INSERT INTO configuration VALUES (NULL, 'Api Key', 'SHOP_STREAM_KEY', 'track-XXXXXXXXXXXX', 'This number is the unique id of your shop provided in Tracking code script by http://app.shopstream.co for that perticular shop. For Exmple in following:<br><br><b>&lt;script type="text/javascript" src="https://collector.shopstream.co/track-codedynamic.js"&gt;&lt;/script&gt;</b><br><br>here "track-codedynamic" is your api key.<br><br><b>Enter your Api Key (starting with the "track-") in the space provided below or leave empty to disable the plugin.</b><br>', @t4, 1, NOW(), NOW(), NULL, NULL);

# --------------------------------------------------------
DELETE FROM admin_pages WHERE page_key='configShopStream';
INSERT INTO admin_pages (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES ('configShopStream','BOX_CONFIGURATION_SHOP_STREAM','FILENAME_CONFIGURATION',CONCAT('gID=',@t4), 'configuration', 'Y', @t4);