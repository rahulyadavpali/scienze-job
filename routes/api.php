<?php


Route::post('/signup', 'API\AuthController@Register');
Route::post('/login', 'API\AuthController@login');


Route::group(['middleware'=>['auth:api']],function(){
	Route::post('logout', 'API\AuthController@logout');

	Route::get('home','API\PagesController@home');

	Route::get('states','API\MasterController@states');
	Route::get('sports','API\MasterController@sports');


	Route::post('add-club','API\MasterController@addClub');
	Route::get('clubs','API\MasterController@clubs');
	Route::get('club-detail/{id}','API\MasterController@clubdetail');

	Route::post('add-team','API\MasterController@addTeam');
	Route::get('get-clubs','API\MasterController@getClubs');
	Route::get('teams','API\MasterController@teams');
	Route::get('get-players','API\MasterController@getPlayers');

	Route::post('add-player','API\MasterController@addPlayer');
	Route::get('get-teams','API\MasterController@getTeams');
	Route::get('players','API\MasterController@players');

	Route::post('add-match','API\MasterController@addMatch');
	Route::get('get-leagues','API\MasterController@getLeagues');
	Route::get('get-pending-matches','API\MasterController@getPendingMatches');
	Route::post('get-teams-by-leagues','API\MasterController@getTeamsByLeagues');
	Route::post('get-players-by-match','API\MasterController@getPlayersByMatch');
	Route::post('add-players-in-team-for-match','API\MasterController@addPlayersInTeamForMatch');

	Route::get('leagues','API\MasterController@leagues');
	Route::post('add-league','API\MasterController@addLeague');
	Route::post('get-leagues-by-sports','API\MasterController@getLeaguesBySports');
	Route::post('assign-leagues','API\MasterController@assignLeagues');
	Route::post('get-selected-assign-leagues','API\MasterController@getSelectedAssignLeagues');
	Route::post('get-selected-team-player-history','API\MasterController@getSelectedTeamPlayerHistory');
	Route::post('assign-captain-and-wicket-keeper','API\MasterController@assignCaptainAndWicketKeeper');
	Route::post('get-match-board','API\MasterController@getMatchBoard');
	Route::post('manage-match','API\MasterController@manageMatch');
	Route::post('manage-balls','API\MasterController@manageBalls');
	Route::get('get-match-data/{id}','API\MasterController@matchData');
	Route::post('select-bowler-for-match','API\MasterController@selectBowlersForMatch');
	Route::get('get-bowlers/{id}','API\MasterController@getBowlers');
	Route::get('get-current-bowler/{id}','API\MasterController@getCurrentBowler');


	Route::get('get-teams-by-sports','API\MasterController@getTeamsBySports');
	Route::get('get-team-league-history','API\MasterController@getTeamLeagueHistory');
	Route::get('dashboard','API\MasterController@dashboard');
	Route::get('search-leagues','API\MasterController@searchLeagues');

});
