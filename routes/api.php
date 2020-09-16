<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('home', 'API\APIController@home');
Route::get('parliament', 'API\APIController@parliament');
Route::get('downloads', 'API\APIController@downloads');
Route::get('votes', 'API\APIController@votes');
Route::post('vote', 'API\APIController@vote');
Route::post('voteResult', 'API\APIController@voteResult');
Route::get('standingOrder', 'API\APIController@standingOrder');
Route::get('constitution', 'API\APIController@constitution');
Route::get('stateOpening', 'API\APIController@stateOpening');
Route::post('searchStateOpening', 'API\APIController@searchStateOpening');
Route::get('budget', 'API\APIController@budget');
Route::post('searchBudget', 'API\APIController@searchBudget');
Route::get('gazettedActs', 'API\APIController@gazettedActs');
Route::post('searchGazettedActs', 'API\APIController@searchGazettedActs');
Route::get('govtAgreement', 'API\APIController@govtAgreement');
Route::post('searchGovtAgreement', 'API\APIController@searchGovtAgreement');
Route::get('officailReport', 'API\APIController@officailReport');
Route::post('searchOfficailReport', 'API\APIController@searchOfficailReport');
Route::get('committeesReports', 'API\APIController@committeesReports');
Route::post('searchCommitteesReports', 'API\APIController@searchCommitteesReports');
Route::get('researchMaterials', 'API\APIController@researchMaterials');
Route::post('searchResearchMaterials', 'API\APIController@searchResearchMaterials');
Route::get('aboutUs', 'API\APIController@aboutUs');
Route::get('parliamentMembers', 'API\APIController@parliamentMembers');
Route::post('searchParliamentMembers', 'API\APIController@searchParliamentMembers');
Route::post('parliamentMember', 'API\APIController@parliamentMember');
Route::get('parliamentChiefMembers', 'API\APIController@parliamentChiefMembers');
Route::post('searchParliamentChiefMembers', 'API\APIController@searchParliamentChiefMembers');
Route::post('parliamentChiefMember', 'API\APIController@parliamentChiefMember');
Route::get('parliamentSpeaker', 'API\APIController@parliamentSpeaker');
Route::get('parliamentDirectory', 'API\APIController@parliamentDirectory');
Route::get('parliamentClerk', 'API\APIController@parliamentClerk');
Route::get('parliamentCalendar', 'API\APIController@parliamentCalendar');
Route::get('videoStreaming', 'API\APIController@videoStreaming');
Route::get('getImage', 'API\APIController@getImage');

// ======================= Online Forum =======================
Route::get('onlineforum/getthread', 'API\APIController@getThread');
Route::post('onlineforum/register', 'API\APIController@register');
Route::post('onlineforum/login', 'API\APIController@login');
Route::post('onlineforum/logout', 'API\APIController@logout');
Route::get('onlineforum/getDataforAddThread', 'API\APIController@getDataforAddThread');
Route::post('onlineforum/addThread', 'API\APIController@addThread');
Route::post('onlineforum/editThread', 'API\APIController@editThread');
Route::post('onlineforum/deleteThread', 'API\APIController@deleteThread');
Route::post('onlineforum/complain', 'API\APIController@complain');
