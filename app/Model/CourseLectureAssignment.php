<?php
App::uses('AppModel', 'Model');
/**
 * CourseQuizQuestion Model
 *
 * @property CourseQuiz $CourseQuiz
 */
class CourseLectureAssignment extends AppModel {


    var $validate = array(
		'id'=>array(
			'notempty'=>array(
				'rule'=>'notempty',
				'message'=>'This cannot be empty'
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CourseLecture' => array(
			'className' => 'CourseLecture',
			'foreignKey' => 'course_lecture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
