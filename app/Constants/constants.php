<?php

//global db connection
// define('GLOBAL_DB', 'usrmgmt');
// define('ENV_LOCAL', 'local');
// define('ENV_PRODUCTION', 'production');


define('NIGHTSHIFT_START_TIME', '18:00:00');
   /******************************************** */
   // status
   /******************************************** */
   define('ACTIVE', 1);
   define('INACTIVE', 0);

   define('PAID', 1);
   define('UNPAID', 0);


   define('NO_ACTION', 0);
   define('APPROVED', 1);
   define('REJECTED', 2);
   define('REVISED', 3);
   define('REVOKED', 4);

   define('SUBMITTED', 1);
   define('NOT_APPROVED', 0);

   define('WORKING_MINUTES', 600);
   define('WORKING_MINUTES_OT', 600);
   define('REGULAR_OT_RATIO', 1.25);
   define('WEEKEND_OT_RATIO', 1.5);
   define('PUBLICHOLIDAY_OT_RATIO', 2);

   /*********************** */
   //permissions
   /*********************** */
   define('PERM_SELF_ATTENDANCE', 'SELFATTENDANCE');
   define('PERM_DB_SUMMARY', 'DBSUMMARY');
   define('PERM_DB_USAGE_EXPIRY', 'DBUSGEXP');
   define('PERM_DB_TRAINING_EXPIRY', 'DBTRNEXP');
   define('PERM_DB_CLIENT', 'DBCLIENT');
   define('PERM_DB_EXPENSE', 'DBEXPENSE');
   define('PERM_DB_PAYMENT', 'DBPAYMENT');

   define('PERM_EMPLOYEES', 'EMPLOYEES');
   define('PERM_CUSTOMERS', 'CUSTOMERS');
   define('PERM_ATTENDANCE', 'ATTENDANCE');
   define('PERM_PAYMENTS', 'PAYMENTS');
   define('PERM_EXPENSES', 'EXPENSES');

   define('PERM_ITEM', 'ITEM');
   define('PERM_SALES', 'SALES');

   define('PERM_TRAINING_PLANS', 'TRNPLN');
   define('PERM_USAGE_PLANS', 'USGPLN');

   define('PERM_USERS', 'USERS');
   define('PERM_USERGROUPS', 'USERGROUPS');
   define('PERM_CALENDAR', 'CALENDAR');
   
   define('PERM_PAYROLL', 'PAYROLL');
   define('PERM_FINE_REWARD', 'FINEREW');
   define('PERM_NCR', 'NCR');
   define('PERM_WARNING', 'WARNING');
   define('PERM_ADVDED', 'ADVDED');
   define('PERM_LEAVES', 'LEAVES');
   define('PERM_COMP_OFF', 'COMPOFF');
   define('PERM_SUPPLIER', 'SUPPLIER');
   define('PERM_PURCHASE', 'PURCHASE');
   define('PERM_LOCATION', 'LOCATION');
   define('PERM_BRANDS', 'BRANDS');
   define('PERM_PROJECTS', 'PROJECTS');
   define('PERM_WORKORDERS', 'WORKORDERS');
   define('PERM_DAILY_ACT', 'DAILYACT');
   define('PERM_DEL_SLIP', 'DELSLIP');
   define('PERM_BOQ', 'BOQ');
   define('PERM_ASSETS', 'ASSETS');
   define('PERM_BILLS', 'BILLS');
   define('PERM_REPORTS', 'REPORTS');
   define('PERM_COST_SHEET', 'COSTSHEET');
   define('PERM_ADMIN', 'ADMIN');
   define('PERM_FINANCE', 'FINANCE');
   define('PERM_QOT_INV', 'QOTINV');
   define('PERM_MAT_LOCK', 'MAT_LOCK');

   define('PERM_EMP_BASIC', 'EMP_BASIC');
   define('PERM_EMP_WORK', 'EMP_WORK');
   define('PERM_EMP_EDUCATION', 'EMP_EDUCATION');
   define('PERM_EMP_ASSET', 'EMP_ASSET');
   define('PERM_EMP_TRAINING', 'EMP_TRAINING');
   define('PERM_EMP_LEAVE_TRAVEL', 'EMP_LEAVE_TRAVEL');
   define('PERM_EMP_SALARY', 'EMP_SALARY');
   define('PERM_EMP_DOCUMENT', 'EMP_DOCUMENT');
   define('PERM_EMP_RELATED_DOCUMENT', 'EMP_RELATED_DOCUMENT');
   define('PERM_EMP_PASSPORT', 'EMP_PASSPORT');
   define('PERM_EMP_COSTSHEET', 'EMP_COSTSHEET');
   define('PERM_EMP_FINE_REWARD', 'EMP_FINE_REWARD');
   define('PERM_EMP_WARNING', 'EMP_WARNING');
   define('PERM_EMP_NCR', 'EMP_NCR');

   define('PERM_LPO', 'LPO');
   define('PERM_ACT_SCHEDULE', 'ACTSCHED');
   define('PERM_CHECKLIST', 'CHECKLIST');
   define('PERM_COMPLETION_CERTIFICATE', 'COMPCERT');


   //special permissions
   // define('SP_DA_Edit_Time_if_Submited', 1);
   // define('SP_DA_Delete_Time_if_Submited', 2);
   // define('SP_DA_Add_activity_if_Submited', 3);
  

   
   /******************************************** */
   // general status
   /******************************************** */
   define('GEN_NOTCREATED', 'NCR');
   define('GEN_CREATED', 'CR');
   define('GEN_NOTSUBMITTED', 'NSUB');
   define('GEN_SUBMITTED', 'SUB');
   define('GEN_APPROVED', 'APR');
   define('GEN_REJECTED', 'REJ');
   define('GEN_CLOSED', 'CLS');

     /******************************************** */
   // invoice status
   /******************************************** */
   define('INV_STATUS_NODATA', 'NOVAL');
   define('INV_STATUS_NONE', 'NONE');
   define('INV_STATUS_FULL', 'FULL');
   define('INV_STATUS_PARTIAL', 'PART');
   define('INV_STATUS_OVER', 'OVER');
