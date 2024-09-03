<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Web_Public';
$route['sign-in'] = 'Auth/index';
$route['administrator'] = 'Auth/administrator';
$route['proses/login-admin'] = 'Auth/_login_admin';
$route['sign-up'] = 'Auth/SignUp';
$route['logout'] = 'Auth/logout';

$route['Dashboard'] = 'Dashboard/redirectToPage/1';
$route['Dashboard/(:num)'] = 'Dashboard/index/$1';

$route['forgot-password'] = 'Auth/forgot_password';
$route['forgot-password-admin'] = 'Auth/forgot_password_admin';
$route['user/application-jobs'] = 'Applications/index';
$route['user/save-jobs'] = 'Saved_Job/redirectToPage/1';
$route['user/save-jobs/(:any)'] = 'Saved_Job/index/$1';
$route['user/profile'] = 'Profile/index';
$route['user/message'] = 'Message/redirectToPage/1';
$route['user/message/(:any)'] = 'Message/index/$1';
$route['job-board'] = 'Job_Board/redirectToPage/1';
$route['user/job-board'] = 'Job_Board/redirectToUserPage/1';
$route['job-board/(:num)'] = 'Job_Board/list/$1';
$route['user/job-board/(:any)'] = 'Job_Board/index/$1';
$route['jobs'] = 'Detail_listjob/index';
$route['verification'] = 'Auth/verify';
$route['reset-password'] = 'Auth/resetpassword';
$route['reset-password-admin'] = 'Auth/resetpasswordadmin';
$route['account-setting'] = 'Setting/index';
$route['admin/account-setting'] = 'Setting/adminSetting';
$route['admin/company-setting'] = 'Setting/adminCompanySetting';
$route['admin/company-page'] = 'Dashboard/companyPage';
$route['admin/message'] = 'Message/redirectToPageAdmin/1';
$route['admin/message/(:any)'] = 'Message/indexAdmin/$1';
$route['change-email'] = 'Setting/changeEmail';
$route['change-mobile-number'] = 'Setting/changeMobileNumber';
$route['change-password'] = 'Setting/changePassword';
$route['change-sms-subscription'] = 'Setting/changeSMSSubscription';
$route['change-job-email-notification'] = 'Setting/changeJobEmailNotification';
$route['change-recruiter-view-notification'] = 'Setting/changeRecruiterViewNotification';
$route['change-timezone'] = 'Setting/changeTimezone';
$route['deactivate-account'] = 'Setting/deactivateAccount';
$route['admin/change-name'] = 'Setting/changeNameAdmin';
$route['admin/change-email'] = 'Setting/changeEmailAdmin';
$route['admin/change-mobile-number'] = 'Setting/changeMobileNumberAdmin';
$route['admin/change-password'] = 'Setting/changePasswordAdmin';
$route['admin/change-sms-subscription'] = 'Setting/changeSMSSubscriptionAdmin';
$route['admin/change-email-subscription'] = 'Setting/changeEmailSubscriptionAdmin';
$route['admin/change-candidate-application-subscription'] = 'Setting/changeCandidateApplicationSubscriptionAdmin';
$route['admin/deactivate-account'] = 'Setting/deactivateAccountAdmin';
$route['save-jobs'] = 'Detail_listjob/saveJobs';
$route['apply-jobs'] = 'Detail_listjob/applyJobs';
$route['proses-basic'] = 'Profile/prosesBasicInformation';
$route['proses-salary'] = 'Profile/prosesSalaryExpectation';
$route['proses-work-experience'] = 'Profile/prosesWorkExperience';
$route['proses-education'] = 'Profile/prosesEducation';
$route['proses-skill'] = 'Profile/prosesSkill';
$route['proses-summary'] = 'Profile/prosesSummary';
$route['proses-affiliation'] = 'Profile/prosesAffiliation';
$route['proses-seminar'] = 'Profile/prosesSeminar';
$route['proses-award'] = 'Profile/prosesAward';
$route['proses-test-score'] = 'Profile/prosesTestScore';
$route['proses-volunteerism'] = 'Profile/prosesVolunteerism';
$route['proses-reference'] = 'Profile/prosesReference';
$route['proses-cocurricular'] = 'Profile/prosesCoCurricular';
$route['proses-project'] = 'Profile/prosesProject';
$route['proses-language'] = 'Profile/prosesLanguage';
$route['proses-certification'] = 'Profile/prosesCertification';
$route['proses-resume'] = 'Profile/prosesResume';
$route['proses-family'] = 'Profile/prosesFamily';
$route['proses-identity-card'] = 'Profile/prosesIdentityCard';
$route['proses-vehicle'] = 'Profile/prosesVehicle';
$route['proses-personal-document'] = 'Profile/prosesPersonalDocument';
$route['proses-emergency-contact'] = 'Profile/prosesEmergencyContact';
$route['upload-photo-profile'] = 'Profile/uploadPhotoProfile';
$route['delete-salary'] = 'Profile/deleteSalaryExpectation';
$route['delete-work-experience'] = 'Profile/deleteWorkExperience';
$route['delete-education'] = 'Profile/deleteEducation';
$route['delete-skill'] = 'Profile/deleteSkill';
$route['delete-summary'] = 'Profile/deleteSummary';
$route['delete-affiliation'] = 'Profile/deleteAffiliation';
$route['delete-seminar'] = 'Profile/deleteSeminar';
$route['delete-award'] = 'Profile/deleteAward';
$route['delete-test-score'] = 'Profile/deleteTestScore';
$route['delete-volunteerism'] = 'Profile/deleteVolunteerism';
$route['delete-reference'] = 'Profile/deleteReference';
$route['delete-cocurricular'] = 'Profile/deleteCoCurricular';
$route['delete-project'] = 'Profile/deleteProject';
$route['delete-language'] = 'Profile/deleteLanguage';
$route['delete-certification'] = 'Profile/deleteCertification';
$route['delete-resume'] = 'Profile/deleteResume';
$route['delete-family'] = 'Profile/deleteFamily';
$route['delete-identity-card'] = 'Profile/deleteIdentityCard';
$route['delete-vehicle'] = 'Profile/deleteVehicle';
$route['delete-personal-document'] = 'Profile/deletePersonalDocument';
$route['delete-emergency-contact'] = 'Profile/deleteEmergencyContact';
$route['view-basic'] = 'Profile/viewBasicInformation';
$route['view-salary'] = 'Profile/viewSalaryExpectation';
$route['view-work-experience'] = 'Profile/viewWorkExperience';
$route['view-education'] = 'Profile/viewEducation';
$route['view-skill'] = 'Profile/viewSkill';
$route['view-summary'] = 'Profile/viewSummary';
$route['view-affiliation'] = 'Profile/viewAffiliation';
$route['view-seminar'] = 'Profile/viewSeminar';
$route['view-award'] = 'Profile/viewAward';
$route['view-test-score'] = 'Profile/viewTestScore';
$route['view-volunteerism'] = 'Profile/viewVolunteerism';
$route['view-reference'] = 'Profile/viewReference';
$route['view-cocurricular'] = 'Profile/viewCoCurricular';
$route['view-project'] = 'Profile/viewProject';
$route['view-language'] = 'Profile/viewLanguage';
$route['view-certification'] = 'Profile/viewCertification';
$route['view-resume'] = 'Profile/viewResume';
$route['view-family'] = 'Profile/viewFamily';
$route['view-identity-card'] = 'Profile/viewIdentityCard';
$route['view-vehicle'] = 'Profile/viewVehicle';
$route['view-personal-document'] = 'Profile/viewPersonalDocument';
$route['view-emergency-contact'] = 'Profile/viewEmergencyContact';
$route['download-profile'] = 'Profile/downloadProfile';
$route['download-profile-candidate/(:any)'] = 'Profile/downloadProfileCandidate/$1';
$route['update-email'] = 'Profile/updateEmail';
$route['get-education-major'] = 'Profile/getEducationMajor';
$route['get-certification'] = 'Profile/getCertification';
$route['get-location'] = 'Profile/getLocation';
$route['get-job-seeking-status'] = 'Profile/getJobSeekingStatus';
$route['get-country'] = 'Profile/getCountry';
$route['get-province'] = 'Profile/getProvince';
$route['get-city'] = 'Profile/getCity';
$route['get-city-all'] = 'Profile/getCityAll';
$route['get-district'] = 'Profile/getDistrict';
$route['get-subdistrict'] = 'Profile/getSubdistrict';
$route['get-skill'] = 'Profile/getSkill';
$route['get-gender'] = 'Profile/getGender';
$route['get-language'] = 'Profile/getLanguage';
$route['get-document-type'] = 'Profile/getDocumentType';
$route['get-vehicle-branch'] = 'Profile/getVehicleBranch';
$route['get-company-industry'] = 'Setting/getCompanyIndustry';
$route['get-job-function'] = 'Setting/getJobFunction';
$route['get-group-type'] = 'Setting/getGroupType';
$route['get-user-group'] = 'Setting/getUserGroup';
$route['view-menu-user-group'] = 'SystemManager/viewMenuUserGroup';
$route['change-menu-user-group'] = 'SystemManager/changeMenuUserGroup';
$route['view-location-user-group'] = 'SystemManager/viewLocationUserGroup';
$route['view-job-level-user-group'] = 'SystemManager/viewJobLevelUserGroup';
$route['view-organization-user-group'] = 'SystemManager/viewOrganizationUserGroup';
$route['job-status'] = 'Dashboard/viewJobStatus';
$route['job-status-filter'] = 'Dashboard/viewJobStatusFilter';
$route['job-status/candidate/(:any)/(:any)/(:any)'] = 'Dashboard/viewCandidateJobStatus/$1/$2/$3';
$route['view-job-inquiry'] = 'Dashboard/viewJobInquiry';
$route['view-job-applications'] = 'Dashboard/viewJobApplications';
$route['view-job-shortlist'] = 'Dashboard/viewJobShortlist';
$route['view-job-callout'] = 'Dashboard/viewJobCallout';
$route['view-job-callout-evaluation'] = 'Dashboard/viewJobCalloutEvaluation';
$route['view-job-offering'] = 'Dashboard/viewJobOffering';
$route['view-job-hiring'] = 'Dashboard/viewJobHiring';
$route['invite-to-apply'] = 'Dashboard/inviteToApply';
$route['proses-shortlist'] = 'Dashboard/prosesShortlist';
$route['proses-callout'] = 'Dashboard/prosesCallout';
$route['proses-reject-application'] = 'Dashboard/prosesRejectApplication';
$route['proses-reject-shortlist'] = 'Dashboard/prosesRejectShortlist';
$route['post-job'] = 'Dashboard/postJob';
$route['proses-post-job-information'] = 'Dashboard/prosesPostJobInformation';
$route['admin/change-company-visible'] = 'Setting/changeCompanyVisibleAdmin';
$route['admin/change-company-name'] = 'Setting/changeCompanyNameAdmin';
$route['admin/change-company-description'] = 'Setting/changeCompanyDescriptionAdmin';
$route['admin/change-company-industry'] = 'Setting/changeCompanyIndustryAdmin';
$route['admin/change-company-url'] = 'Setting/changeCompanyURLAdmin';
$route['admin/change-company-address'] = 'Setting/changeCompanyAddressAdmin';
$route['admin/change-company-link-public-jobs'] = 'Setting/changeCompanyLinkPublicJobsAdmin';
$route['admin/change-company-link-private-jobs'] = 'Setting/changeCompanyLinkPrivateJobsAdmin';
$route['admin/change-company-automated-email'] = 'Setting/changeAutomatedEmailAdmin';
$route['upload-logo'] = 'Setting/uploadLogo';
$route['upload-banner'] = 'Setting/uploadBanner';
$route['send-message'] = 'Message/sendMessage';
$route['send-message-admin'] = 'Message/sendMessageAdmin';
$route['get-province-search'] = 'Setting/getProvinceSearch';
$route['get-city-search'] = 'Setting/getCitySearch';
$route['get-job-level-search'] = 'Setting/getJobLevelSearch';
$route['get-employment-type-search'] = 'Setting/getEmploymentTypeSearch';
$route['get-job-function-search'] = 'Setting/getJobFunctionSearch';
$route['get-education-search'] = 'Setting/getEducationSearch';
$route['get-employee-request-no'] = 'Setting/getEmployeeRequestNo';
$route['view-user-group'] = 'SystemManager/viewUserGroup';
$route['proses-user-group'] = 'SystemManager/prosesUserGroup';
$route['delete-user-group'] = 'SystemManager/deleteUserGroup';
$route['view-trustee-location'] = 'SystemManager/viewTrusteeLocation';
$route['proses-trustee-location'] = 'SystemManager/prosesTrusteeLocation';
$route['delete-trustee-location'] = 'SystemManager/deleteTrusteeLocation';
$route['view-trustee-job-level'] = 'SystemManager/viewTrusteeJobLevel';
$route['proses-trustee-job-level'] = 'SystemManager/prosesTrusteeJobLevel';
$route['delete-trustee-job-level'] = 'SystemManager/deleteTrusteeJobLevel';
$route['view-trustee-organization'] = 'SystemManager/viewTrusteeOrganization';
$route['proses-trustee-organization'] = 'SystemManager/prosesTrusteeOrganization';
$route['delete-trustee-organization'] = 'SystemManager/deleteTrusteeOrganization';
$route['get-od-location'] = 'SystemManager/getODLocation';
$route['get-od-job-level'] = 'SystemManager/getODJobLevel';
$route['get-od-organization'] = 'SystemManager/getODOrganization';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
