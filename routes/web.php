<?php
////////////////////////////////////  Authentication Urls   //////////////////////////////////////
Route::get('/', 'Client\ClientController@ballot')->name('client.ballot');
Route::get('client/', 'Client\ClientController@index')->name('client.index');
Route::post('client/sendpincode', 'Client\ClientController@sendpincode')->name('client.sendpincode');

Route::group(['middleware' => 'client', 'prefix'=>'client', 'namespace'=>'Client'], function () {
    Route::get('/viewcand', 'ClientController@viewcand')->name('client.viewcand');
    Route::get('/lang', 'ClientController@lang')->name('client.lang');
    Route::get('/race', 'ClientController@race')->name('client.race');
    Route::get('/prop', 'ClientController@prop')->name('client.prop');
    Route::post('/propcount', 'ClientController@propcount')->name('client.propcount');
    Route::get('/mass', 'ClientController@mass')->name('client.mass');
    Route::post('/masscount', 'ClientController@masscount')->name('client.masscount');
    Route::get('/review', 'ClientController@review')->name('client.review');
    Route::post('/racecount', 'ClientController@racecount')->name('client.racecount');
    Route::post('/racedecount', 'ClientController@racedecount')->name('client.racedecount');
    Route::post('/cast', 'ClientController@cast')->name('client.cast');
});
Route::get('admin/', 'AuthController@login')->name('request');

Route::get('/forgotPassword', 'AuthController@forgotPassword')->name('request');
Route::get('/logout', 'AuthController@logout')->name('request');
Route::post('/login', 'AuthController@loginApi')->name('request');

////////////////////////////////////  Home Urls   //////////////////////////////////////
Route::get('/home', 'Home\HomeController@index')->name('request');
Route::post('/updateHomeList', 'Home\HomeController@updateHomeList')->name('request');

Route::get('/aboutUs', 'Home\AboutUsController@index')->name('request');
Route::post('/createAboutUs', 'Home\AboutUsController@createAboutUs')->name('request');
Route::post('/updateAboutUs', 'Home\AboutUsController@updateAboutUs')->name('request');
Route::post('/deleteAboutUs', 'Home\AboutUsController@deleteAboutUs')->name('request');
Route::post('/multiDeleteAboutUs', 'Home\AboutUsController@multiDeleteAboutUs')->name('request');

////////////////////////////////////  Parliament Urls   //////////////////////////////////////
Route::get('/parliament', 'Parliament\ParliamentController@index')->name('request');
Route::post('/updateParliamentList', 'Parliament\ParliamentController@updateParliamentList')->name('request');

Route::get('/parliamentMembers', 'Parliament\ParliamentMembersController@index')->name('request');
Route::post('/createParliamentMember', 'Parliament\ParliamentMembersController@createParliamentMember')->name('request');
Route::post('/updateParliamentMember', 'Parliament\ParliamentMembersController@updateParliamentMember')->name('request');
Route::post('/deleteParliamentMember', 'Parliament\ParliamentMembersController@deleteParliamentMember')->name('request');
Route::post('/multiDeleteParliamentMembers', 'Parliament\ParliamentMembersController@multiDeleteParliamentMembers')->name('request');

Route::get('/parliamentChiefMPs', 'Parliament\ParliamentChiefMPsController@index')->name('request');
Route::post('/createParliamentChiefMPs', 'Parliament\ParliamentChiefMPsController@createParliamentChiefMPs')->name('request');
Route::post('/updateParliamentChiefMPs', 'Parliament\ParliamentChiefMPsController@updateParliamentChiefMPs')->name('request');
Route::post('/deleteParliamentChiefMPs', 'Parliament\ParliamentChiefMPsController@deleteParliamentChiefMPs')->name('request');
Route::post('/multiDeleteParliamentChiefMPs', 'Parliament\ParliamentChiefMPsController@multiDeleteParliamentChiefMPs')->name('request');

Route::get('/speakerofParliament', 'Parliament\ParliamentSpeakerController@index')->name('request');
Route::post('/createParliamentSpeaker', 'Parliament\ParliamentSpeakerController@createParliamentSpeaker')->name('request');
Route::post('/updateParliamentSpeaker', 'Parliament\ParliamentSpeakerController@updateParliamentSpeaker')->name('request');
Route::post('/deleteParliamentSpeaker', 'Parliament\ParliamentSpeakerController@deleteParliamentSpeaker')->name('request');
Route::post('/multiDeleteParliamentSpeaker', 'Parliament\ParliamentSpeakerController@multiDeleteParliamentSpeaker')->name('request');

Route::get('/clerkofParliament', 'Parliament\ParliamentClerkController@index')->name('request');
Route::post('/createParliamentClerk', 'Parliament\ParliamentClerkController@createParliamentClerk')->name('request');
Route::post('/updateParliamentClerk', 'Parliament\ParliamentClerkController@updateParliamentClerk')->name('request');
Route::post('/deleteParliamentClerk', 'Parliament\ParliamentClerkController@deleteParliamentClerk')->name('request');
Route::post('/multiDeleteParliamentClerk', 'Parliament\ParliamentClerkController@multiDeleteParliamentClerk')->name('request');

Route::get('/parliamentCalendar', 'Parliament\ParliamentCalendarController@index')->name('request');
Route::post('/createParliamentCalendar', 'Parliament\ParliamentCalendarController@createParliamentCalendar')->name('request');
Route::post('/updateParliamentCalendar', 'Parliament\ParliamentCalendarController@updateParliamentCalendar')->name('request');
Route::post('/deleteParliamentCalendar', 'Parliament\ParliamentCalendarController@deleteParliamentCalendar')->name('request');
Route::post('/multiDeleteParliamentCalendar', 'Parliament\ParliamentCalendarController@multiDeleteParliamentCalendar')->name('request');

Route::get('/parliamentDirectory', 'Parliament\ParliamentDirectoryController@index')->name('request');
Route::post('/createParliamentDirectory', 'Parliament\ParliamentDirectoryController@createParliamentDirectory')->name('request');
Route::post('/updateParliamentDirectory', 'Parliament\ParliamentDirectoryController@updateParliamentDirectory')->name('request');
Route::post('/deleteParliamentDirectory', 'Parliament\ParliamentDirectoryController@deleteParliamentDirectory')->name('request');
Route::post('/multiDeleteParliamentDirectory', 'Parliament\ParliamentDirectoryController@multiDeleteParliamentDirectory')->name('request');

////////////////////////////////////  Downloads Urls   //////////////////////////////////////
Route::get('/downloads', 'Downloads\DownloadsController@index')->name('request');
Route::post('/updateDownloadsList', 'Downloads\DownloadsController@updateDownloadsList')->name('request');

Route::get('/gazettedActs', 'Downloads\DownloadsController@gazettedActs')->name('request');
Route::post('/createGazettedActs', 'Downloads\DownloadsController@createGazettedActs')->name('request');
Route::post('/updateGazettedActs', 'Downloads\DownloadsController@updateGazettedActs')->name('request');
Route::post('/deleteGazettedActs', 'Downloads\DownloadsController@deleteGazettedActs')->name('request');
Route::post('/multiDeleteGazettedActs', 'Downloads\DownloadsController@multiDeleteGazettedActs')->name('request');

Route::get('/govtAgreements', 'Downloads\DownloadGovtAgreementsController@index')->name('request');
Route::post('/createGovtAgreements', 'Downloads\DownloadGovtAgreementsController@createGovtAgreements')->name('request');
Route::post('/updateGovtAgreements', 'Downloads\DownloadGovtAgreementsController@updateGovtAgreements')->name('request');
Route::post('/deleteGovtAgreements', 'Downloads\DownloadGovtAgreementsController@deleteGovtAgreements')->name('request');
Route::post('/multiDeleteGovtAgreements', 'Downloads\DownloadGovtAgreementsController@multiDeleteGovtAgreements')->name('request');

Route::get('/officialReports', 'Downloads\DownloadOfficialReportsController@index')->name('request');
Route::post('/createOfficialReports', 'Downloads\DownloadOfficialReportsController@createOfficialReports')->name('request');
Route::post('/updateOfficialReports', 'Downloads\DownloadOfficialReportsController@updateOfficialReports')->name('request');
Route::post('/deleteOfficialReports', 'Downloads\DownloadOfficialReportsController@deleteOfficialReports')->name('request');
Route::post('/multiDeleteOfficialReports', 'Downloads\DownloadOfficialReportsController@multiDeleteOfficialReports')->name('request');

Route::get('/committeesReports', 'Downloads\DownloadCommitteesReportsController@index')->name('request');
Route::post('/createCommitteesReports', 'Downloads\DownloadCommitteesReportsController@createCommitteesReports')->name('request');
Route::post('/updateCommitteesReports', 'Downloads\DownloadCommitteesReportsController@updateCommitteesReports')->name('request');
Route::post('/deleteCommitteesReports', 'Downloads\DownloadCommitteesReportsController@deleteCommitteesReports')->name('request');
Route::post('/multiDeleteCommitteesReports', 'Downloads\DownloadCommitteesReportsController@multiDeleteCommitteesReports')->name('request');

Route::get('/researchMaterials', 'Downloads\DownloadResearchMaterialsController@index')->name('request');
Route::post('/createResearchMaterials', 'Downloads\DownloadResearchMaterialsController@createResearchMaterials')->name('request');
Route::post('/updateResearchMaterials', 'Downloads\DownloadResearchMaterialsController@updateResearchMaterials')->name('request');
Route::post('/deleteResearchMaterials', 'Downloads\DownloadResearchMaterialsController@deleteResearchMaterials')->name('request');
Route::post('/multiDeleteResearchMaterials', 'Downloads\DownloadResearchMaterialsController@multiDeleteResearchMaterials')->name('request');

////////////////////////////////////  Standing Orders Urls   //////////////////////////////////////
Route::get('/standingOrder', 'StandingOrder\StandingOrderController@index')->name('request');
Route::post('/updateStandingOrder', 'StandingOrder\StandingOrderController@updateStandingOrder')->name('request');

////////////////////////////////////  Constitution Urls   //////////////////////////////////////
Route::get('/constitution', 'Constitution\ConstitutionController@index')->name('request');
Route::post('/createConstitution', 'Constitution\ConstitutionController@createConstitution')->name('request');
Route::post('/updateConstitution', 'Constitution\ConstitutionController@updateConstitution')->name('request');
Route::post('/deleteConstitution', 'Constitution\ConstitutionController@deleteConstitution')->name('request');
Route::post('/multiDeleteConstitution', 'Constitution\ConstitutionController@multiDeleteConstitution')->name('request');

////////////////////////////////////  Votes Urls   //////////////////////////////////////
Route::get('/votes', 'Votes\VotesController@index')->name('request');
Route::post('/createVotes', 'Votes\VotesController@createVotes')->name('request');
Route::post('/updateVotes', 'Votes\VotesController@updateVotes')->name('request');
Route::post('/deleteVotes', 'Votes\VotesController@deleteVotes')->name('request');
Route::post('/multiDeleteVotes', 'Votes\VotesController@multiDeleteVotes')->name('request');

////////////////////////////////////  Budget Information Urls   //////////////////////////////////////
Route::get('/budgetInformation', 'Downloads\BudgetInformationController@index')->name('request');
Route::post('/createBudgetInformation', 'Downloads\BudgetInformationController@createBudgetInformation')->name('request');
Route::post('/updateBudgetInformation', 'Downloads\BudgetInformationController@updateBudgetInformation')->name('request');
Route::post('/deleteBudgetInformation', 'Downloads\BudgetInformationController@deleteBudgetInformation')->name('request');
Route::post('/multiDeleteBudgetInformation', 'Downloads\BudgetInformationController@multiDeleteBudgetInformation')->name('request');

////////////////////////////////////  State Opening Urls   //////////////////////////////////////
Route::get('/stateOpening', 'Downloads\StateOpeningController@index')->name('request');
Route::post('/createStateOpening', 'Downloads\StateOpeningController@createStateOpening')->name('request');
Route::post('/updateStateOpening', 'Downloads\StateOpeningController@updateStateOpening')->name('request');
Route::post('/deleteStateOpening', 'Downloads\StateOpeningController@deleteStateOpening')->name('request');
Route::post('/multiDeleteStateOpening', 'Downloads\StateOpeningController@multiDeleteStateOpening')->name('request');


