<?php

return array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance',
		'label'     => 'title',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			'fe_group' => 'fe_group',
		),
		'dividers2tabs'=> 1,
		'iconfile'          => t3lib_extMgm::extRelPath('caretaker').'res/icons/instance.png',
	),
	'feInterface' => array (
		'fe_admin_fieldList' => '',
	),
	'interface' => array (
		'showRecordFieldList' => 'hidden,instancegroup,testgroups,tests,request_mode,encryption_mode,encryption_key,project_namename,project_manager,domain,additional_domains,contacts,server_type,server_provider,server_customer_id,server_other,cms_url,cms_admin,cms_pwd,cms_install_pwd,accesses,other,request_url,contacts'
	),
	'columns' => array (
		'hidden' => Array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config'  => Array (
				'type'    => 'check',
				'default' => '0'
			),
		),
		'starttime' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'default' => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'checkbox' => '0',
				'default' => '0',
				'range' => Array (
					'upper' => mktime(0,0,0,12,31,2020),
					'lower' => mktime(0,0,0,date('m')-1,date('d'),date('Y'))
				)
			)
		),
		'fe_group' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					Array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					Array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'exclusiveKeys' => '-1,-2',
				'foreign_table' => 'fe_groups',
				'foreign_table_where' => 'ORDER BY fe_groups.title',
				'maxitems' => 20,
				'size' => 7
			)
		),
		'title' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.title',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '50',
				'rows' => '5',
			),
			'defaultExtras' => 'richtext'
		),
		'url' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.url',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			)
		),
		'host' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.host',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			)
		),
		'groups' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.groups',
			'config' => Array (
				'type'          => 'select',
				'form_type'     => 'user',
				'userFunc'      => 'tx_ttaddress_treeview->displayGroupTree',
				'treeView'      => 1,
				'foreign_table' => 'tx_caretaker_testgroup',
				'size'          => 5,
				'autoSizeMax'   => 25,
				'minitems'      => 0,
				'maxitems'      => 50,
				'MM'            => 'tx_caretaker_instance_testgroup_mm',
			)
		),
		'tests' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tests',
			'config' => Array (
				'type'          => 'select',
				'foreign_table' => 'tx_caretaker_test',
				'size'          => 5,
				'autoSizeMax'   => 25,
				'minitems'      => 0,
				'maxitems'      => 10000,
				'MM'            => 'tx_caretaker_instance_test_mm',
				'MM_opposite_field' => 'instances',
				'size'          => 5,
				'autoSizeMax'   => 10,
				'minitems'      => 0,
				'maxitems'      => 10000,
				'wizards' => Array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => Array(
						'type' => 'popup',
						'title' => 'Edit Test',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new Test',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_caretaker_test',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'public_key' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.public_key',
			'displayCond' => 'EXT:caretaker_instance:LOADED:true',
			'config' => Array (
				'type' => 'input',
				'eval' => 'trim',
				'max' => '1024'
			)
		),
		'instancegroup'=> Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.instancegroup',
			'config' => Array (
				'type'          => 'select',
				'foreign_table' => 'tx_caretaker_instancegroup',
				'size'          => 1,
				'minitems'      => 0,
				'maxitems'      => 1,
				'items' => Array (
					Array('', '0'),
				),

			)
		),
		'notifications' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.notifications',
			'config' => Array (
				'type'          => 'group',
				'internal_type' => 'db',
				'allowed'       => 'tt_address',
				'size'          => 5,
				'autoSizeMax'   => 25,
				'minitems'      => 0,
				'maxitems'      => 50,
			),
		),
		'testconfigurations' => array(
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_test.test_conf',
			'config' => Array (
				'type'          => 'flex',
				'ds' => array (
					'default' => 'FILE:EXT:caretaker/res/flexform/ds.tx_caretaker_instance_testconfiguration.xml'
				)
			),
		),
		'contacts' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.contacts',
			'config' => array (
				'type' => 'inline',
				'foreign_table' => 'tx_caretaker_node_address_mm',
				'foreign_field' => 'uid_node',
				'foreign_table_field' => 'node_table',
				// 'foreign_selector' => 'uid_address',
				'appearance' => array (
					'collapseAll' => true,
					'expandSingle' => true
				)
			)
		),
		'notification_strategies' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_general.notification_strategies',
			'config' => array (
				'type' => 'inline',
				'foreign_table' => 'tx_caretaker_node_strategy_mm',
				'foreign_field' => 'uid_node',
				'foreign_table_field' => 'node_table',
				'foreign_selector' => 'uid_strategy',
				'appearance' => array (
					'collapseAll' => true,
					'expandSingle' => true
				)
			)
		)
	),
	'types' => array (
		'0' => array('showitem' => 'title;;;;2-2-2, instancegroup, url;;;;3-3-3, host, public_key,' .
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.description, description, ' .
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.relations, groups, tests, ' .
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.contacts, contacts, '.
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.notifications, notification_strategies, ' .
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.testconfigurations, testconfigurations, '.
		'--div--;LLL:EXT:caretaker/locallang_db.xml:tx_caretaker_instance.tab.access, hidden, starttime, endtime, fe_group'
		)
	),
	'palettes' => array ()
);