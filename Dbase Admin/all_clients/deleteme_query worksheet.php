SELECT CONCAT('<a href=\"show_vitalinfo.php?client_id=',client_id,'\">','View','</a>') AS 'View',
CONCAT('<a href=\"show_modclient_getmethod.php?client_id=',client_id,'\">','Edit','</a>') AS 'Edit',
FROM_UNIXTIME(all_clients.sales_contact_next,'%M %D %Y %h:%i:%s') AS contact_next, 
desc_sales_categories.description AS sales_category,
all_clients.f_name, 
all_clients.l_name, 
all_clients.prim_tel, 
all_clients.sec_tel, 
all_clients.mob_tel, 
desc_primary_goal.description AS primary_goal, 
FROM_UNIXTIME(all_clients.created,'%M %D %Y') AS created, 
FROM_UNIXTIME(all_clients.modified,'%M %D %Y') AS modified, 
auth_users.f_name AS rec_man_f_name, 
auth_users.l_name AS rec_man_l_name 

FROM all_clients, desc_sales_stage, auth_users, desc_primary_goal, desc_sales_categories

WHERE desc_sales_stage.id=all_clients.sales_stage 
AND all_clients.record_manager=auth_users.id 
AND desc_primary_goal.id=all_clients.primary_goal
AND desc_sales_categories.id=all_clients.sales_category
AND desc_sales_categories.description LIKE '%Lead%'

ORDER BY all_clients.sales_stage 



