<?php
////////////////////////////////////  Authentication Urls   //////////////////////////////////////
// Route::get('/', 'Client\ClientController@ballot')->name('client.ballot');
Route::get('/', function() {
    return redirect('admin/');
});

Route::prefix('/onlineforum')->group(function() {
    Route::get('/', 'ForumClient\HomeController@index')->name('onlineforum');
});

// ================ Admin Panel URLS =====================

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
Route::post('/createStandingOrder', 'StandingOrder\StandingOrderController@createStandingOrder')->name('request');
Route::post('/deleteStandingOrder', 'StandingOrder\StandingOrderController@deleteStandingOrder')->name('request');
Route::post('/multiDeleteStandingOrder', 'StandingOrder\StandingOrderController@multiDeleteStandingOrder')->name('request');

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

////////////////////////////////////  Video Streaming Urls   //////////////////////////////////////
Route::get('/videoStreaming', 'VideoStreaming\VideoStreamingController@index')->name('request');
Route::post('/createVideoStreaming', 'VideoStreaming\VideoStreamingController@createVideoStreaming')->name('request');
Route::post('/updateVideoStreaming', 'VideoStreaming\VideoStreamingController@updateVideoStreaming')->name('request');
Route::post('/deleteVideoStreaming', 'VideoStreaming\VideoStreamingController@deleteVideoStreaming')->name('request');
Route::post('/multiDeleteVideoStreaming', 'VideoStreaming\VideoStreamingController@multiDeleteVideoStreaming')->name('request');

////////////////////////////////////  Settings Urls   //////////////////////////////////////
Route::get('/settings', 'SettingsController@index')->name('request');
Route::post('/updateSetting', 'SettingsController@updateSetting')->name('request');

////////////////////////////////////  Online Forum Urls   /////////////////////////////////////////
Route::prefix('/forum')->group(function() {

    // ------------------- Category Urls --------------------------
    Route::get('/category', 'OnlineForum\CategoryController@index')->name('request');
    Route::post('/createCategory', 'OnlineForum\CategoryController@createCategory')->name('request');
    Route::post('/createSubcategory', 'OnlineForum\CategoryController@createSubcategory')->name('request');
    Route::post('/updateCategory', 'OnlineForum\CategoryController@updateCategory')->name('request');
    Route::post('/deleteCategory', 'OnlineForum\CategoryController@deleteCategory')->name('request');
    Route::post('/multiDeleteCategory', 'OnlineForum\CategoryController@multiDeleteCategory')->name('request');

    // ------------------- Type Urls --------------------------
    Route::get('/type', 'OnlineForum\TypeController@index')->name('request');
    Route::post('/createType', 'OnlineForum\TypeController@createType')->name('request');
    Route::post('/createSubType', 'OnlineForum\TypeController@createSubType')->name('request');
    Route::post('/updateType', 'OnlineForum\TypeController@updateType')->name('request');
    Route::post('/deleteType', 'OnlineForum\TypeController@deleteType')->name('request');
    Route::post('/multiDeleteType', 'OnlineForum\TypeController@multiDeleteType')->name('request');

    // ------------------- Members Urls --------------------------
    Route::get('/members', 'OnlineForum\MembersController@index')->name('request');
    Route::get('/getSubscription', 'OnlineForum\MembersController@getSubscription')->name('request');
    Route::post('/createMembers', 'OnlineForum\MembersController@createMembers')->name('request');
    Route::post('/createSubMembers', 'OnlineForum\MembersController@createSubMembers')->name('request');
    Route::post('/updateMembers', 'OnlineForum\MembersController@updateMembers')->name('request');
    Route::post('/deleteMembers', 'OnlineForum\MembersController@deleteMembers')->name('request');
    Route::post('/multiDeleteMembers', 'OnlineForum\MembersController@multiDeleteMembers')->name('request');
    
    // ------------------- Subscription Urls --------------------------
    Route::get('/subscription', 'OnlineForum\SubscriptionController@index')->name('request');
    Route::post('/createSubscription', 'OnlineForum\SubscriptionController@createSubscription')->name('request');
    Route::post('/createSubSubscription', 'OnlineForum\SubscriptionController@createSubSubscription')->name('request');
    Route::post('/updateSubscription', 'OnlineForum\SubscriptionController@updateSubscription')->name('request');
    Route::post('/deleteSubscription', 'OnlineForum\SubscriptionController@deleteSubscription')->name('request');
    Route::post('/multiDeleteSubscription', 'OnlineForum\SubscriptionController@multiDeleteSubscription')->name('request');

    // ------------------- Thread Urls --------------------------
    Route::get('/thread', 'OnlineForum\ThreadController@index')->name('request');
    Route::post('/getSubcategory', 'OnlineForum\ThreadController@getSubcategory')->name('request');
    Route::post('/createThread', 'OnlineForum\ThreadController@createThread')->name('request');
    Route::post('/createSubThread', 'OnlineForum\ThreadController@createSubThread')->name('request');
    Route::post('/updateThread', 'OnlineForum\ThreadController@updateThread')->name('request');
    Route::post('/deleteThread', 'OnlineForum\ThreadController@deleteThread')->name('request');
    Route::post('/multiDeleteThread', 'OnlineForum\ThreadController@multiDeleteThread')->name('request');
});

