<?php

/** * ********************************************************************
 *  Autoincluding libraries when invoke them
 * 
 * @author Wilowi - Sandra Campos
 * @copyright Wilowi
 * @since 20/12/2021
 *  
 * ******************************************************************** */

require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

/**
 * Insercción de librerias
 *
 * @param string $class_name
 */
function autoload($class_name) {

    // ----- Clase conexión BD
    if ($class_name == 'dbConnector') {
	include_once dirname(__FILE__) . '/config/dbConnector.php';
    } elseif ($class_name == 'lmMailer') {
	include_once dirname(__FILE__) . '/config/lmMailer.php';
    } elseif ($class_name == 'newSmarty') {
	include_once dirname(__FILE__) . '/config/newSmarty.php';
    } elseif ($class_name == 'FPDF') {
	include_once dirname(__FILE__) . '/lib/fpdf/fpdf.php';
    } elseif ($class_name == 'PDF') {
	include_once dirname(__FILE__) . '/lib/fpdf/pdf.php';
    } elseif ($class_name == 'zoom') {
	include_once dirname(__FILE__) . '/config/zoom.php';
    } elseif ($class_name == 'paypal') {
	include_once dirname(__FILE__) . '/config/paypal.php';
    } elseif ($class_name == 'frontController') {
	include_once dirname(__FILE__) . '/controllers/frontController.php';
    } elseif ($class_name == 'baseModel') {
	include_once dirname(__FILE__) . '/models/baseModel.php';
    } elseif ($class_name == 'universityModel') {
	include_once dirname(__FILE__) . '/models/universityModel.php';
    } elseif ($class_name == 'userModel') {
	include_once dirname(__FILE__) . '/models/userModel.php';
    } elseif ($class_name == 'countryModel') {
	include_once dirname(__FILE__) . '/models/countryModel.php';
    } elseif ($class_name == 'timeZonesModel') {
	include_once dirname(__FILE__) . '/models/timeZonesModel.php';
    } elseif ($class_name == 'courseTypeModel') {
	include_once dirname(__FILE__) . '/models/courseTypeModel.php';
    } elseif ($class_name == 'languageModel') {
	include_once dirname(__FILE__) . '/models/languageModel.php';
    }elseif ($class_name == 'coursesNewModel') {
	include_once dirname(__FILE__) . '/models/coursesNewModel.php';
    } elseif ($class_name == 'coursesSectionsNewModel') {
	include_once dirname(__FILE__) . '/models/coursesSectionsNewModel.php';
    } elseif ($class_name == 'usersLanguagesModel') {
	include_once dirname(__FILE__) . '/models/usersLanguagesModel.php';
    } elseif ($class_name == 'universityTeachersModel') {
	include_once dirname(__FILE__) . '/models/universityTeachersModel.php';
    } elseif ($class_name == 'notificationsLevelModel') {
	include_once dirname(__FILE__) . '/models/notificationsLevelModel.php';
    } elseif ($class_name == 'notificationsTypeModel') {
	include_once dirname(__FILE__) . '/models/notificationsTypeModel.php';
    } elseif ($class_name == 'notificationsModel') {
	include_once dirname(__FILE__) . '/models/notificationsModel.php';
    } elseif ($class_name == 'hobbiesUsersModel') {
	include_once dirname(__FILE__) . '/models/hobbiesUsersModel.php';
    } elseif ($class_name == 'coursesDuedatesModel') {
	include_once dirname(__FILE__) . '/models/coursesDuedatesModel.php';
    } elseif ($class_name == 'coachScheduleNewModel') {
	include_once dirname(__FILE__) . '/models/coachScheduleNewModel.php';
    }elseif ($class_name == 'coachScheduleBlockModel') {
	include_once dirname(__FILE__) . '/models/coachScheduleBlockModel.php';
    }  elseif ($class_name == 'sessionsOccupancyModel') {
	include_once dirname(__FILE__) . '/models/sessionsOccupancyModel.php';
    } elseif ($class_name == 'coachOccupancyModel') {
	include_once dirname(__FILE__) . '/models/coachOccupancyModel.php';
    } elseif ($class_name == 'courseStudentsModel') {
	include_once dirname(__FILE__) . '/models/courseStudentsModel.php';
    } elseif ($class_name == 'logsModel') {
	include_once dirname(__FILE__) . '/models/logsModel.php';
    } elseif ($class_name == 'courseTypeOfferModel') {
	include_once dirname(__FILE__) . '/models/courseTypeOfferModel.php';
    } elseif ($class_name == 'offersCodesModel') {
	include_once dirname(__FILE__) . '/models/offersCodesModel.php';
    } elseif ($class_name == 'offersCoursesModel') {
	include_once dirname(__FILE__) . '/models/offersCoursesModel.php';
    } elseif ($class_name == 'studentsPaymentModel') {
	include_once dirname(__FILE__) . '/models/studentsPaymentModel.php';
    } elseif ($class_name == 'studentsCoursesFreeModel') {
	include_once dirname(__FILE__) . '/models/studentsCoursesFreeModel.php';
    } elseif ($class_name == 'teachersAssistantModel') {
	include_once dirname(__FILE__) . '/models/teachersAssistantModel.php';
    } elseif ($class_name == 'coursesCoordinatorsModel') {
	include_once dirname(__FILE__) . '/models/coursesCoordinatorsModel.php';
    } elseif ($class_name == 'messagesModel') {
	include_once dirname(__FILE__) . '/models/messagesModel.php';
    } elseif ($class_name == 'emailsModel') {
	include_once dirname(__FILE__) . '/models/emailsModel.php';
    }elseif ($class_name == 'emailsSessionsModel') {
	include_once dirname(__FILE__) . '/models/emailsSessionsModel.php';
    }  elseif ($class_name == 'emailsNextModel') {
	include_once dirname(__FILE__) . '/models/emailsNextModel.php';
    } elseif ($class_name == 'emailsNotattendanceModel') {
	include_once dirname(__FILE__) . '/models/emailsNotattendanceModel.php';
    } elseif ($class_name == 'coachIncentiveModel') {
	include_once dirname(__FILE__) . '/models/coachIncentiveModel.php';
    } elseif ($class_name == 'salaryCoachesModel') {
	include_once dirname(__FILE__) . '/models/salaryCoachesModel.php';
    } elseif ($class_name == 'salaryCountryModel') {
	include_once dirname(__FILE__) . '/models/salaryCountryModel.php';
    } elseif ($class_name == 'specialCodesModel') {
	include_once dirname(__FILE__) . '/models/specialCodesModel.php';
    } elseif ($class_name == 'courseDocumentationModel') {
	include_once dirname(__FILE__) . '/models/courseDocumentationModel.php';
    } elseif ($class_name == 'participationModel') {
	include_once dirname(__FILE__) . '/models/participationModel.php';
    } elseif ($class_name == 'preparedClassModel') {
	include_once dirname(__FILE__) . '/models/preparedClassModel.php';
    } elseif ($class_name == 'puntualityModel') {
	include_once dirname(__FILE__) . '/models/puntualityModel.php';
    } elseif ($class_name == 'studentsFeedbacksModel') {
	include_once dirname(__FILE__) . '/models/studentsFeedbacksModel.php';
    } elseif ($class_name == 'zoomMeetingsModel') {
	include_once dirname(__FILE__) . '/models/zoomMeetingsModel.php';
    } elseif ($class_name == 'zoomUsersModel') {
	include_once dirname(__FILE__) . '/models/zoomUsersModel.php';
    } elseif ($class_name == 'studentPreregisterModel') {
	include_once dirname(__FILE__) . '/models/studentPreregisterModel.php';
    } elseif ($class_name == 'teacherOptionsModel') {
	include_once dirname(__FILE__) . '/models/teacherOptionsModel.php';
    } elseif ($class_name == 'coachSubstitutionModel') {
	include_once dirname(__FILE__) . '/models/coachSubstitutionModel.php';
    } elseif ($class_name == 'zoomRecordingsModel') {
	include_once dirname(__FILE__) . '/models/zoomRecordingsModel.php';
    } elseif ($class_name == 'studentsLogsModel') {
	include_once dirname(__FILE__) . '/models/studentsLogsModel.php';
    } elseif ($class_name == 'coachEvaluationManagerModel') {
	include_once dirname(__FILE__) . '/models/coachEvaluationManagerModel.php';
    } elseif ($class_name == 'coachEvaluationModel') {
	include_once dirname(__FILE__) . '/models/coachEvaluationModel.php';
    } elseif ($class_name == 'coachBillingInfoModel') {
	include_once dirname(__FILE__) . '/models/coachBillingInfoModel.php';
    } elseif ($class_name == 'invoiceNumbersModel') {
	include_once dirname(__FILE__) . '/models/invoiceNumbersModel.php';
    } elseif ($class_name == 'lingroRegisterModel') {
	include_once dirname(__FILE__) . '/models/lingroRegisterModel.php';
    } elseif ($class_name == 'configModel') {
	include_once dirname(__FILE__) . '/models/configModel.php';
    } elseif ($class_name == 'coachesCoorModel') {
	include_once dirname(__FILE__) . '/models/coachesCoorModel.php';
    }elseif ($class_name == 'coachesCoorSalaryModel') {
	include_once dirname(__FILE__) . '/models/coachesCoorSalaryModel.php';
    } elseif ($class_name == 'coursesCoachesModel') {
	include_once dirname(__FILE__) . '/models/coursesCoachesModel.php';
    } elseif ($class_name == 'faqsModel') {
	include_once dirname(__FILE__) . '/models/faqsModel.php';
    } elseif ($class_name == 'faqTypeModel') {
	include_once dirname(__FILE__) . '/models/faqTypeModel.php';
    } elseif ($class_name == 'faqDestinationModel') {
	include_once dirname(__FILE__) . '/models/faqDestinationModel.php';
    }elseif ($class_name == 'coachScheduleOccModel') {
	include_once dirname(__FILE__) . '/models/coachScheduleOccModel.php';
    } elseif ($class_name == 'managerOptionsModel') {
	include_once dirname(__FILE__) . '/models/managerOptionsModel.php';
    } elseif ($class_name == 'studentsPaymentsRefundModel') {
	include_once dirname(__FILE__) . '/models/studentsPaymentsRefundModel.php';
    } elseif ($class_name == 'newsModel') {
	include_once dirname(__FILE__) . '/models/newsModel.php';
    } elseif ($class_name == 'feedbacksCoachesModel') {
	include_once dirname(__FILE__) . '/models/feedbacksCoachesModel.php';
    } elseif ($class_name == 'feedbacksSubtypesModel') {
	include_once dirname(__FILE__) . '/models/feedbacksSubtypesModel.php';
    } elseif ($class_name == 'feedbacksObservationsModel') {
	include_once dirname(__FILE__) . '/models/feedbacksObservationsModel.php';
    } elseif ($class_name == 'feedbacksSuggestionsModel') {
	include_once dirname(__FILE__) . '/models/feedbacksSuggestionsModel.php';
    } elseif ($class_name == 'feedbacksTypeModel') {
	include_once dirname(__FILE__) . '/models/feedbacksTypeModel.php';
    } elseif ($class_name == 'coachPaymentModel') {
	include_once dirname(__FILE__) . '/models/coachPaymentModel.php';
    }
    elseif ($class_name == 'experiencesModel') {
	include_once dirname(__FILE__) . '/models/experiencesModel.php';
    }
    elseif ($class_name == 'experiencesUniversitiesModel') {
	include_once dirname(__FILE__) . '/models/experiencesUniversitiesModel.php';
    }
    elseif ($class_name == 'experiencesCommentsModel') {
	include_once dirname(__FILE__) . '/models/experiencesCommentsModel.php';
    }
    elseif ($class_name == 'experiencesUsersModel') {
	include_once dirname(__FILE__) . '/models/experiencesUsersModel.php';
    }
    
    elseif ($class_name == 'experiencesUsersPublicModel') {
	include_once dirname(__FILE__) . '/models/experiencesUsersPublicModel.php';
    }
    elseif ($class_name == 'experiencesDonationsModel') {
	include_once dirname(__FILE__) . '/models/experiencesDonationsModel.php';
    }    
    elseif ($class_name == 'experiencesSectionsModel') {
	include_once dirname(__FILE__) . '/models/experiencesSectionsModel.php';
    }
    elseif ($class_name == 'experiencesCoursesModel') {
	include_once dirname(__FILE__) . '/models/experiencesCoursesModel.php';
    }
    elseif ($class_name == 'guidesTypeModel') {
	include_once dirname(__FILE__) . '/models/guidesTypeModel.php';
    }
    elseif ($class_name == 'guidesChaptersModel') {
	include_once dirname(__FILE__) . '/models/guidesChaptersModel.php';
    }
    elseif ($class_name == 'semestersModel') {
	include_once dirname(__FILE__) . '/models/semestersModel.php';
    }
    elseif ($class_name == 'universityLevelsModel') {
	include_once dirname(__FILE__) . '/models/universityLevelsModel.php';
    }
    elseif ($class_name == 'studentsCoursesModel') {
	include_once dirname(__FILE__) . '/models/studentsCoursesModel.php';
    }
    elseif ($class_name == 'studentsCourseSessionsNewModel') {
	include_once dirname(__FILE__) . '/models/studentsCourseSessionsNewModel.php';
    }
    elseif ($class_name == 'timesModel') {
	include_once dirname(__FILE__) . '/models/timesModel.php';
    }
    elseif ($class_name == 'timesHoursModel') {
	include_once dirname(__FILE__) . '/models/timesHoursModel.php';
    }
    elseif ($class_name == 'coachOccTermModel') {
	include_once dirname(__FILE__) . '/models/coachOccTermModel.php';
    }
    elseif ($class_name == 'coachCoursesModel') {
	include_once dirname(__FILE__) . '/models/coachCoursesModel.php';
    }
    elseif ($class_name == 'specialCodesRequestModel') {
	include_once dirname(__FILE__) . '/models/specialCodesRequestModel.php';
    }
    elseif ($class_name == 'studentsPaymentMakeModel') {
	include_once dirname(__FILE__) . '/models/studentsPaymentMakeModel.php';
    }
    elseif ($class_name == 'studentsPaymentAuxModel') {
        include_once dirname(__FILE__) . '/models/studentsPaymentAuxModel.php';
    }
    
    
}

spl_autoload_register('autoload');
?>
