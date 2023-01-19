<?php

return [

	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],

	'contest-management' => [
		'title' => 'Contest Management',
		'created_at' => 'Time',
		'fields' => [
			'create-contest'=> 'Create Contest',
			'all-contest'=> 'All Contest',
		],
	],

	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
		],
	],

	'users' => [
		'title' => 'Users',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'username' => 'Username',
			'remember-token' => 'Remember token',
		],
	],

	'teams' => [
		'title' => 'Teams',
		'created_at' => 'Time',
		'fields' => [
			'clubs' => 'Clubs',
			'leagues' => 'Leagues',
			'name' => 'Name',
			'image' => 'Image',
			'sports' => 'Sports',
			'action' => 'Action',
		],
	],

	'players' => [
		'title' => 'Players',
		'created_at' => 'Time',
		'fields' => [
			'team' => 'Team',
			'name' => 'Name',
			'description' => 'Description',
			'mobile' => 'Mobile No.',
			'email' => 'Email',
			'birth-date' => 'Date of Birth',
			'image' => 'Image',
		],
	],
	
	'games' => [
		'title' => 'Matches',
		'created_at' => 'Time',
		'fields' => [
			'team_a' => 'Team A',
			'team_b' => 'Team B',
			'match_date' => 'Match Date',
			'league' => 'League',
			'vanue' => 'Vanue',
			'progress_status' => 'Progress Status',
		],
	],
	'clubs' => [
		'title' => 'Clubs',
		'created_at' => 'Time',
		'fields' => [
			'state' => 'State',
			'sport' => 'Sport',
			'name' => 'Name',
			'club_status' => 'Club Status',
			'image' => 'Image',
			'action' => 'Action',
		],
	],
	'leagues' => [
		'title' => 'Leagues',
		'created_at' => 'Time',
		'fields' => [
			'state' => 'State',
			'sport' => 'Sport',
			'name' => 'Name',
			'image' => 'Image',
			'action' => 'Action',
		],
	],
	'information' => [
		'title' => 'Information',
		'fields' => [
			'title' => 'Title',
			'description' => 'Description',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keyword' => 'Meta Keyword',
			'action' => 'Action',
		],
	],

	'contest' => [
		'title' => 'Contest',
		'fields' => [
			'title' => 'Title',
			'description' => 'Description',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keyword' => 'Meta Keyword',
			'action' => 'Action',
		],
	],

	'qa_create' => 'Create',
	'qa_save' => 'Save',
	'qa_edit' => 'Edit',
	'qa_view' => 'View',
	'qa_update' => 'Update',
	'qa_list' => 'List',
	'qa_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Add new',
	'qa_are_you_sure' => 'Are you sure?',
	'qa_back_to_list' => 'Back to list',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Delete',
	'quickadmin_title' => 'Prize Pool',
];